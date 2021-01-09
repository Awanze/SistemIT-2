<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
Use Alert;
use PDF;
use App\dnetworks;
use App\network;
use App\status;
use App\progress;
use App\its;
use App\client;
class NetworkController extends Controller
{
    //
    public function index()
	 {
    $this->authorize('pengelola/network');
     $networks = DB::table('networks as a')
         ->select('a.*', 'b.nama_client', 'c.nama_its')
         ->join('client as b', 'b.id_client', 'a.i_company')
         ->join('its as c', 'c.id_its', 'a.n_its')
         ->get();
     $its = its::all();
		 return view('pengelola/network', compact('networks','its'));
     }

     public function index2()
	 {
        // $this->authorize('detail_data/hardware');
		$networks2 = DB::table('dnetworks as a')
        ->select('a.*', 'b.nama_status', 'c.nama_progress')
         ->join('status as b', 'b.id_status', 'a.i_nstatus')
         ->join('progress as c', 'c.id_progress', 'a.i_nprog')
        ->get();
        $tidakurgent = dnetworks::where('i_nstatus','!=','4')->count();
        $urgent = dnetworks::where('i_nstatus','4')->count();
        $belumselesai = dnetworks::where('i_nprog','!=','6')->count();
        $selesai = dnetworks::where('i_nprog','6')->count();
		 return view('detail_data/detail_network', compact('networks2','tidakurgent','urgent','belumselesai','selesai'));
     }

     public function index3()
	 {
        // $this->authorize('detail_data/hardware');
		$networks3 = DB::table('dnetworks as a')
        ->select('a.*', 'b.nama_status', 'c.nama_progress')
         ->join('status as b', 'b.id_status', 'a.i_nstatus')
         ->join('progress as c', 'c.id_progress', 'a.i_nprog')
         ->where('a.i_nstatus', '4')
        ->get();
		 return view('detail_data/urgent_network', compact('networks3'));
     }

     public function create(Request $request)
    {
        $status = status::all();
        $progress = progress::all();
        $its = its::all();
        $client = client::all();
        return view('pengelola/create_network', compact('progress','status','its','client'));
    } 

     public function store(Request $request)
     {
          // dd($request->all());
         $this->validate($request,[
             'r_net' => 'required',
             'd_net' => 'required',
             'i_company' => 'required',
             'i_Leader' => 'required',
             'n_its' => 'required',
             'i_nstatus' => 'required',
             'i_nprog' => 'required',
            //  'j_pemasangan' => 'required|numeric',
            
             'tgl_mpemasangan' => 'required',
             'tgl_apemasangan' => 'required'
         ]);
  
          $networks = new network;
          $networks->r_net = $request->r_net;
          $networks->i_company = $request->i_company;
          $networks->i_Leader = $request->i_Leader;
          $networks->n_its = $request->n_its;
          $networks->tgl_mpemasangan = $request->tgl_mpemasangan;
          $networks->tgl_apemasangan = $request->tgl_apemasangan;
          $networks->save();
  
          if (isset($request->d_net)){
            foreach($request->d_net as $key => $value){
                $detail = new dnetworks;
                $detail->id_net = $networks->id_net;
                $detail->d_net = $request->d_net[$key];
                $detail->j_pemasangan = $request->j_pemasangan[$key];
                $detail->l_pemasangan = $request->l_pemasangan[$key];
                $detail->i_nstatus = $request->i_nstatus[$key];
                $detail->i_nprog = $request->i_nprog[$key];
                $detail->save();
            }
        }

        return redirect()->route('network.index')->with(['success' => 'Data berhasil disimpan!']);
      }

      public function view($id_net)
      {
      // mengambil data berdasarkan id_network yang dipilih
      $networks = DB::table('networks')->where('id_net',$id_net)->first();
      $dnetworks = dnetworks::where('id_net', $id_net)->get();
      $status = status::all();
      $progress = progress::all();
      $its = its::all();
      $client = client::all();
      // passing data yang did_networkapat ke view edit.blade.php
      return view('pengelola/view_network', compact('networks','progress','status','its','client','dnetworks'));
      }

      public function print($id_net)
      {
      // mengambil data berdasarkan id_network yang dipilih
      $networks = DB::table('networks as a')
      ->select('a.*', 'b.nama_client', 'c.nama_its')
      ->join('client as b', 'b.id_client', 'a.i_company')
      ->join('its as c', 'c.id_its', 'a.n_its')
      ->where('a.id_net',$id_net)
      ->get();      
      $networks2 = DB::table('dnetworks as a')
        ->select('a.*', 'b.nama_status', 'c.nama_progress')
         ->join('status as b', 'b.id_status', 'a.i_nstatus')
         ->join('progress as c', 'c.id_progress', 'a.i_nprog')
         ->where('a.i_nprog', '6')
        ->get();
      // passing data yang did_networkapat ke view edit.blade.php
      $pdf = PDF::loadView('report/print_network', compact('networks','networks2'))->setPaper('a4', 'landscape');
    return $pdf->stream();
      }
      public function print2()
      {
           // $this->authorize('detail_data/hardware');
       $networks2 = DB::table('dnetworks as a')
           ->select('a.*', 'b.nama_status', 'c.nama_progress')
            ->join('status as b', 'b.id_status', 'a.i_nstatus')
            ->join('progress as c', 'c.id_progress', 'a.i_nprog')
            ->where('a.i_nprog', '6')
           ->get();
           $pdf = PDF::loadView('report/printselesai_network', compact('networks2'))->setPaper('a4', 'landscape');
           return $pdf->stream();        
      }
   
        public function print3()
      {
           // $this->authorize('detail_data/hardware');
       $networks3 = DB::table('dnetworks as a')
           ->select('a.*', 'b.nama_status', 'c.nama_progress')
            ->join('status as b', 'b.id_status', 'a.i_nstatus')
            ->join('progress as c', 'c.id_progress', 'a.i_nprog')
            ->where('a.i_nstatus', '4')
           ->get();
           $pdf = PDF::loadView('report/printurgent_network', compact('networks3'))->setPaper('a4', 'landscape');
           return $pdf->stream();        
      }
      
      public function edit($id_net)
      {
      // mengambil data berdasarkan id_network yang dipilih
      $networks = DB::table('networks')->where('id_net',$id_net)->first();
      $dnetworks = dnetworks::where('id_net', $id_net)->get();
      $status = status::all();
      $progress = progress::all();
      $its = its::all();
      $client = client::all();
      // passing data yang did_networkapat ke view edit.blade.php
      return view('pengelola/edit_network', compact('networks','progress','status','its','client','dnetworks'));
      }
 
      public function update(Request $request) 
 {
     // untuk validasi form
     $this -> validate($request, [
        'r_net' => 'required',
        'd_net' => 'required',
        'i_company' => 'required',
        'i_Leader' => 'required',
        'n_its' => 'required',
        'i_nstatus' => 'required',
        'i_nprog' => 'required',
        'j_pemasangan' => 'required',
        'tgl_mpemasangan' => 'required',
        'tgl_apemasangan' => 'required'
     ]);
     // update data
     
 // menghapus data pada tabel dnetworks
 dnetworks::where('id_net', $request->id_net)->delete();
//  dd($detail);
// menyimpan ulang data yg sudah diubah
if (isset($request->d_net)){
  foreach($request->d_net as $key => $value){
      $detail = new dnetworks;
      $detail->id_net = $request->id_net;
      $detail->d_net = $request->d_net[$key];
      $detail->j_pemasangan = $request->j_pemasangan[$key];
      $detail->l_pemasangan = $request->l_pemasangan[$key];
      $detail->i_nstatus = $request->i_nstatus[$key];
      $detail->i_nprog = $request->i_nprog[$key];
      $detail->save();
    }
  }
     // alihkan halaman edit ke halaman 
     return redirect()->route('network.index')->with(['success' => 'Data berhasil disimpan!']);
 }
 
 public function destroy($id_net)
 {
      $networks = network::where('id_net',$id_net)->delete();
      dnetworks::where('id_net',$id_net)->delete();
      
      return redirect()->route('network.index')->with(['success' => 'Data berhasil dihapus']);
 }
}
