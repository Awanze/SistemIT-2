<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
Use Alert;
use PDF;
use App\dnewsofts;
use App\newsoft;
use App\status;
use App\progress;
use App\its;
use App\pro;
class NewsoftController extends Controller
{
    //
    public function index()
	 {
    $this->authorize('pengelola/newsoft');
     $newsofts = DB::table('newsofts as a')
         ->select('a.*', 'b.nama_its','c.nama_pro')
         ->join('its as b', 'b.id_its', 'a.nsoft_itsupport')
         ->join('pro as c', 'c.id_pro', 'a.nsoft_programmer')
         ->get();
		 return view('pengelola/newsoft', compact('newsofts'));
     }

     public function index2()
	 {
        // $this->authorize('detail_data/hardware');
		$newsofts2 = DB::table('dnewsofts as a')
        ->select('a.*', 'b.nama_status', 'c.nama_progress')
         ->join('status as b', 'b.id_status', 'a.i_nsstatus')
         ->join('progress as c', 'c.id_progress', 'a.i_nsprog')
        ->get(); 
        $tidakurgent = dnewsofts::where('i_nsstatus','!=','4')->count();
        $urgent = dnewsofts::where('i_nsstatus','4')->count();
        $belumselesai = dnewsofts::where('i_nsprog','!=','6')->count();
        $selesai = dnewsofts::where('i_nsprog','6')->count();
		 return view('detail_data/detail_newsofts', compact('newsofts2','tidakurgent','urgent','belumselesai','selesai'));
     }

     public function index3()
	 {
        // $this->authorize('detail_data/hardware');
		$newsofts3 = DB::table('dnewsofts as a')
        ->select('a.*', 'b.nama_status', 'c.nama_progress')
         ->join('status as b', 'b.id_status', 'a.i_nsstatus')
         ->join('progress as c', 'c.id_progress', 'a.i_nsprog')
         ->where('a.i_nsstatus', '4')
        ->get();
		 return view('detail_data/urgent_newsofts', compact('newsofts3'));
     }
     public function create(Request $request)
     {
         $status = status::all();
         $progress = progress::all();
         $its = its::all();
         $pro = pro::all();
         return view('pengelola/create_newsoft', compact('progress','status','its','pro'));
     }

     public function store(Request $request)
     {
        //   dd($request->all());
         $this->validate($request,[
             'r_nsoft' => 'required',
             'd_nsoft' => 'required',
             'n_soft' => 'required',
             'j_soft' => 'required',
             'i_nsstatus' => 'required',
             'nsoft_programmer' => 'required',
             'nsoft_itsupport' => 'required',
             'tgl_ssoft' => 'required'
         ]);

          $newsofts = new newsoft;
          $newsofts->r_nsoft = $request->r_nsoft;
          $newsofts->n_soft = $request->n_soft;
          $newsofts->j_soft = $request->j_soft;
          $newsofts->nsoft_programmer = $request->nsoft_programmer;
          $newsofts->nsoft_itsupport = $request->nsoft_itsupport;
          $newsofts->tgl_ssoft = $request->tgl_ssoft;
          $newsofts->save();

          if (isset($request->d_nsoft)){
            foreach($request->d_nsoft as $key => $value){
                $detail = new dnewsofts;
                $detail->id_nsoft = $newsofts->id_nsoft;
                $detail->d_nsoft = $request->d_nsoft[$key];
                $detail->n_fitur = $request->n_fitur[$key];
                $detail->i_nsstatus = $request->i_nsstatus[$key];
                $detail->i_nsprog = $request->i_nsprog[$key];
                $detail->save();
            }
        }

        return redirect()->route('newsoft.index')->with(['success' => 'Data berhasil disimpan!']);
      }

      public function view($id_nsoft)
      {
      // mengambil data berdasarkan id_newsofts yang dipilih
      $newsofts = DB::table('newsofts')->where('id_nsoft',$id_nsoft)->first();
      $dnewsofts = dnewsofts::where('id_nsoft', $id_nsoft)->get();
      $status = status::all();
      $progress = progress::all();
      $its = its::all();
      $pro = pro::all();
      // passing data yang did_newsoftsapat ke view edit.blade.php
      return view('pengelola/view_newsoft', compact('newsofts','progress','status','its','pro','dnewsofts'));
      }

      public function print($id_nsoft)
      {
      // mengambil data berdasarkan id_newsofts yang dipilih
      $newsofts = DB::table('newsofts as a')
      ->select('a.*', 'b.nama_its','c.nama_pro')
      ->join('its as b', 'b.id_its', 'a.nsoft_itsupport')
      ->join('pro as c', 'c.id_pro', 'a.nsoft_programmer')
      ->where('a.id_nsoft',$id_nsoft)
      ->get();
      $newsofts2 = DB::table('dnewsofts as a')
      ->select('a.*', 'b.nama_status', 'c.nama_progress')
       ->join('status as b', 'b.id_status', 'a.i_nsstatus')
       ->join('progress as c', 'c.id_progress', 'a.i_nsprog')
       ->where('a.id_nsoft',$id_nsoft)
      ->get();
      // passing data yang did_newsoftsapat ke view edit.blade.php
      $pdf = PDF::loadView('report/print_newsoft', compact('newsofts','newsofts2'))->setPaper('a4', 'landscape');
    return $pdf->stream();
      }
      public function print2()
      {
         // $this->authorize('detail_data/hardware');
         $newsofts2 = DB::table('dnewsofts as a')
         ->select('a.*', 'b.nama_status', 'c.nama_progress')
          ->join('status as b', 'b.id_status', 'a.i_nsstatus')
          ->join('progress as c', 'c.id_progress', 'a.i_nsprog')
          ->where('a.i_nsprog', '6')
         ->get();
         $pdf = PDF::loadView('report/printselesai_newsoft', compact('newsofts2'))->setPaper('a4', 'landscape');
         return $pdf->stream();      
        }
 
      public function print3()
      {
         // $this->authorize('detail_data/hardware');
         $newsofts3 = DB::table('dnewsofts as a')
         ->select('a.*', 'b.nama_status', 'c.nama_progress')
          ->join('status as b', 'b.id_status', 'a.i_nsstatus')
          ->join('progress as c', 'c.id_progress', 'a.i_nsprog')
          ->where('a.i_nsstatus', '4')
         ->get();
         $pdf = PDF::loadView('report/printurgent_newsoft', compact('newsofts3'))->setPaper('a4', 'landscape');
         return $pdf->stream();      
        }

      public function edit($id_nsoft)
      {
      // mengambil data berdasarkan id_newsofts yang dipilih
      $newsofts = DB::table('newsofts')->where('id_nsoft',$id_nsoft)->first();
      $dnewsofts = dnewsofts::where('id_nsoft', $id_nsoft)->get();
      $status = status::all();
      $progress = progress::all();
      $its = its::all();
      $pro = pro::all();
      // passing data yang did_newsoftsapat ke view edit.blade.php
      return view('pengelola/edit_newsoft', compact('newsofts','progress','status','its','pro','dnewsofts'));
      }

      public function update(Request $request)
 {
     // untuk validasi form
     $this -> validate($request, [
        'r_nsoft' => 'required',
        'd_nsoft' => 'required',
        'n_soft' => 'required',
        'j_soft' => 'required',
        'i_nsstatus' => 'required',
        'nsoft_programmer' => 'required',
        'nsoft_itsupport' => 'required',
        'tgl_ssoft' => 'required',
        'i_nsprog' => 'required'
     ]);
     // update data

 // passing data yang didapat ke view edit.blade.php
 dnewsofts::where('id_nsoft', $request->id_nsoft)->delete();
    //  'id_nsoft' => $request->id_nsoft,
    if (isset($request->d_nsoft)){
      foreach($request->d_nsoft as $key => $value){
          $detail = new dnewsofts;
          $detail->id_nsoft = $request->id_nsoft;
          $detail->d_nsoft = $request->d_nsoft[$key];
          $detail->n_fitur = $request->n_fitur[$key];
          $detail->i_nsstatus = $request->i_nsstatus[$key];
          $detail->i_nsprog = $request->i_nsprog[$key];
          $detail->save();
      }
  }
     // alihkan halaman edit ke halaman
     return redirect()->route('newsoft.index')->with(['success' => 'Data berhasil disimpan!']);
 }

 public function destroy($id_nsoft)
 {
      $newsofts = newsoft::where('id_nsoft',$id_nsoft)->delete();
      dnewsofts::where('id_nsoft',$id_nsoft)->delete();

      return redirect()->route('newsoft.index')->with(['success' => 'Data berhasil dihapus']);
 }
}
