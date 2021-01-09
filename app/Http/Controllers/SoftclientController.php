<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use DB;
Use Alert;
use PDF;
use App\dsoftclients;
use App\softclient;
use App\status;
use App\progress;
use App\its;
use App\pro;
use App\client;
class SoftclientController extends Controller
{
    //
    public function index()
	 {
        $this->authorize('pengelola/softclient');
        $softclients = DB::table('softclients as a')
         ->select('a.*', 'b.nama_client', 'c.nama_its','nama_pro')
         ->join('client as b', 'b.id_client', 'a.c_client')
         ->join('its as c', 'c.id_its', 'a.sc_itsupport')
         ->join('pro as d', 'd.id_pro', 'a.sc_programmer')
         ->get();
        //  dd($selesai);
		 return view('pengelola/softclient', compact('softclients'));
     }
     public function index2()
	 {
        // $this->authorize('detail_data/hardware');
		$softclients2 = DB::table('dsoftclients as a')
        ->select('a.*', 'b.nama_status', 'c.nama_progress')
         ->join('status as b', 'b.id_status', 'a.i_cstatus')
         ->join('progress as c', 'c.id_progress', 'a.i_cprog')
         ->where('a.i_cprog', '6')
         ->get();
         $tidakurgent = dsoftclients::where('i_cstatus','!=','4')->count();
         $urgent = dsoftclients::where('i_cstatus','4')->count();
         $belumselesai = dsoftclients::where('i_cprog','!=','6')->count();
         $selesai = dsoftclients::where('i_cprog','6')->count();
		 return view('detail_data/detail_softclients', compact('softclients2','tidakurgent','urgent','belumselesai','selesai'));
     }
     public function index3()
	 {
        // $this->authorize('detail_data/hardware');
		$softclients3 = DB::table('dsoftclients as a')
        ->select('a.*', 'b.nama_status', 'c.nama_progress')
         ->join('status as b', 'b.id_status', 'a.i_cstatus')
         ->join('progress as c', 'c.id_progress', 'a.i_cprog')
         ->where('a.i_cstatus', '4')
        ->get();
		 return view('detail_data/urgent_softclients', compact('softclients3'));
     }
     public function create(Request $request)
     {
         $status = status::all();
         $progress = progress::all();
         $its = its::all();
         $client = client::all();
         $pro = pro::all();
         return view('pengelola/create_softclient', compact('progress','status','its','pro','client'));
     } 

     public function store(Request $request)
     {
        //   dd($request->all());
         $this->validate($request,[
             'd_sclient' => 'required',
             'c_fitur' => 'required',
             'c_client' => 'required',
             'i_cstatus' => 'required',
             'sc_programmer' => 'required',
             'sc_itsupport' => 'required',
             'tgl_ssoftclient' => 'required',
             'i_cprog' => 'required'
         ]);
  
          $softclients = new softclient;
          $softclients->r_sclient = $request->r_sclient;
          $softclients->c_client = $request->c_client;
          $softclients->n_sclient = $request->n_sclient;
          $softclients->sc_programmer = $request->sc_programmer;
          $softclients->sc_itsupport = $request->sc_itsupport;
          $softclients->tgl_ssoftclient = $request->tgl_ssoftclient;
         
           $softclients->save();

        if (isset($request->d_sclient)){
            foreach($request->d_sclient as $key => $value){
                $detail = new dsoftclients;
                $detail->id_sclient = $softclients->id_sclient;
                $detail->d_sclient = $request->d_sclient[$key];
                $detail->c_fitur = $request->c_fitur[$key];
                $detail->i_cstatus = $request->i_cstatus[$key];
                $detail->i_cprog = $request->i_cprog[$key];
                $detail->save();
            }
        }
         return redirect('/softclient')->with(['success' => 'Data berhasil disimpan!']);
      }

      public function view($id_sclient)
      {
      // mengambil data berdasarkan id_softclient yang dipilih
      $softclients = DB::table('softclients')->where('id_sclient',$id_sclient)->first();
      $dsoftclients = dsoftclients::where('id_sclient', $id_sclient)->get();
      $status = status::all();
      $progress = progress::all();
      $its = its::all();
      $client = client::all();
      $pro = pro::all();
      // passing data yang did_softclientapat ke view edit.blade.php
      return view('pengelola/view_softclient', compact('progress','status','its','pro','client','softclients','dsoftclients'));
      }
    
      public function print($id_sclient)
      {
      // mengambil data berdasarkan id_softclient yang dipilih
      $softclients = DB::table('softclients as a')
      ->select('a.*', 'b.nama_client', 'c.nama_its','nama_pro')
      ->join('client as b', 'b.id_client', 'a.c_client')
      ->join('its as c', 'c.id_its', 'a.sc_itsupport')
      ->join('pro as d', 'd.id_pro', 'a.sc_programmer')
      ->where('a.id_sclient',$id_sclient)
      ->get();      
      $softclients2 = DB::table('dsoftclients as a')
        ->select('a.*', 'b.nama_status', 'c.nama_progress')
         ->join('status as b', 'b.id_status', 'a.i_cstatus')
         ->join('progress as c', 'c.id_progress', 'a.i_cprog')
         ->where('a.id_sclient', $id_sclient)
        ->get();
      $pdf = PDF::loadView('report/print_softclient', compact('softclients','softclients2'))->setPaper('a4', 'landscape');
    return $pdf->stream();
      }
      public function print2()
      {
         // $this->authorize('detail_data/hardware');
         $softclients2 = DB::table('dsoftclients as a')
         ->select('a.*', 'b.nama_status', 'c.nama_progress')
          ->join('status as b', 'b.id_status', 'a.i_cstatus')
          ->join('progress as c', 'c.id_progress', 'a.i_cprog')
          ->where('a.i_cprog', '6')
         ->get();
         $pdf = PDF::loadView('report/printselesai_softclient', compact('softclients2'))->setPaper('a4', 'landscape');
         return $pdf->stream();      }
      public function print3()
      {
         // $this->authorize('detail_data/hardware');
         $softclients3 = DB::table('dsoftclients as a')
         ->select('a.*', 'b.nama_status', 'c.nama_progress')
          ->join('status as b', 'b.id_status', 'a.i_cstatus')
          ->join('progress as c', 'c.id_progress', 'a.i_cprog')
          ->where('a.i_cstatus', '4')
         ->get();
         $pdf = PDF::loadView('report/printurgent_softclient', compact('softclients3'))->setPaper('a4', 'landscape');
         return $pdf->stream();      }
      public function edit($id_sclient)
      {
      // mengambil data berdasarkan id_softclient yang dipilih
      $softclients = DB::table('softclients')->where('id_sclient',$id_sclient)->first();
      $dsoftclients = dsoftclients::where('id_sclient', $id_sclient)->get();
      $status = status::all();
      $progress = progress::all();
      $its = its::all();
      $client = client::all();
      $pro = pro::all();
      // passing data yang did_softclientapat ke view edit.blade.php
      return view('pengelola/edit_softclient', compact('progress','status','its','pro','client','softclients','dsoftclients'));
      }
 
      public function update(Request $request) 
 {
     // untuk validasi form
     $this -> validate($request, [
        'r_sclient' => 'required',
        'd_sclient' => 'required',
        'c_client' => 'required',
        'n_sclient' => 'required',
        'i_cstatus' => 'required',
        'sc_programmer' => 'required',
        'sc_itsupport' => 'required',
        'tgl_ssoftclient' => 'required',
        'i_cprog' => 'required'
     ]);
     // update data
     
     $softclients = softclient::find ($request->id_sclient);
     $softclients->r_sclient = $request->r_sclient;
     $softclients->c_client = $request->c_client;
     $softclients->n_sclient = $request->n_sclient;
     $softclients->sc_programmer = $request->sc_programmer;
     $softclients->sc_itsupport = $request->sc_itsupport;
     $softclients->tgl_ssoftclient = $request->tgl_ssoftclient;
     $softclients->save();

 // passing data yang didapat ke view edit.blade.php
 dsoftclients::where('id_sclient', $request->id_sclient)->delete();
    if (isset($request->d_sclient)){
        foreach($request->d_sclient as $key => $value){
            $detail = new dsoftclients;
            $detail->id_sclient = $request->id_sclient;
            $detail->d_sclient = $request->d_sclient[$key];
            $detail->c_fitur = $request->c_fitur[$key];
            $detail->i_cstatus = $request->i_cstatus[$key];
            $detail->i_cprog = $request->i_cprog[$key];
            $detail->save();
        }
    }
     // alihkan halaman edit ke halaman 
     return redirect()->route('softclient.index')->with(['success' => 'Data berhasil disimpan!']);
 }

 
 public function destroy($id_sclient)
 {
      $softclients = softclient::where('id_sclient',$id_sclient)->delete();
      dsoftclients::where('id_sclient',$id_sclient)->delete();

      return redirect()->route('softclient.index')->with(['success' => 'Data berhasil dihapus!']);
 }
}
