<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
Use Alert;
use PDF;
use App\dhard;
use App\hardware;
use App\total;
use App\status;
use App\progress;
use App\its;
use App\client;
class HardwareController extends Controller
{
    //
    public function index()
	 {
    $this->authorize('pengelola/hardware');
         $hardware = DB::table('hardware as a')
         ->select('a.*', 'b.nama_client', 'c.nama_its')
        ->join('client as b', 'b.id_client', 'a.i_client')
        ->join('its as c', 'c.id_its', 'a.h_its')
         ->get();
		 return view('pengelola/hardware', compact('hardware'));
     }

     public function index2()
	 {
        // $this->authorize('detail_data/hardware');
		$hardware2 = DB::table('dhard as a')
        ->select('a.*', 'b.nama_status', 'c.nama_progress')
         ->join('status as b', 'b.id_status', 'a.i_status')
         ->join('progress as c', 'c.id_progress', 'a.i_prog')
        ->get(); 
        $tidakurgent = dhard::where('i_status','!=','4')->count();
        $urgent = dhard::where('i_status','4')->count();
        $belumselesai = dhard::where('i_prog','!=','6')->count();
        $selesai = dhard::where('i_prog','6')->count();
		 return view('detail_data/detail_hard', compact('hardware2','urgent','tidakurgent','selesai','belumselesai'));
     }
     public function index3()
	 {
        // $this->authorize('detail_data/hardware');
		$hardware3 = DB::table('dhard as a')
        ->select('a.*', 'b.nama_status', 'c.nama_progress')
         ->join('status as b', 'b.id_status', 'a.i_status')
         ->join('progress as c', 'c.id_progress', 'a.i_prog')
         ->where('a.i_status', '4')
        ->get();
		 return view('detail_data/urgent_hard', compact('hardware3'));
     }

    public function create(Request $request)
    {
        $status = status::all();
        $progress = progress::all();
        $its = its::all();
        $client = client::all();
        // dd($status);
        return view('pengelola/create_hard', compact('progress','status','its','client'));
    } 
     public function store(Request $request)
    {
        //  dd($request->all());
        // mengecek data yang wajib diisi
    	$this->validate($request,[
            // 'id_hard' => 'required|numeric',
    		'm_hard' => 'required',
            'dm_hard' => 'required',
            'i_client' => 'required',
            'i_staff' => 'required',
            'i_status' => 'required',
            'k_rusak' => 'required',
            // 'k_ganti' => 'required',
            'tgl_perbaikan' => 'required',
            'i_prog' => 'required',
            'h_its' => 'required'
    	]);
 // mengirim data master
         $hardware = new hardware;
		 $hardware->m_hard = $request->m_hard;
         $hardware->i_client = $request->i_client;
         $hardware->i_staff = $request->i_staff;
         $hardware->tgl_perbaikan = $request->tgl_perbaikan;
         $hardware->h_its = $request->h_its;
		 $hardware->save();
//  dd($hardware);
// mengirim data detail
         if (isset($request->dm_hard)){
            foreach($request->dm_hard as $key => $value){
                $detail = new dhard;
                $detail->id_hard = $hardware->id_hard;
                $detail->dm_hard = $request->dm_hard[$key];
                $detail->j_komputer = $request->j_komputer[$key];
                $detail->k_rusak = $request->k_rusak[$key];
                $detail->i_status = $request->i_status[$key];
                $detail->i_prog = $request->i_prog[$key];
                $detail->save();
            }
        }
    	return redirect()->route('hardware.index')->with(['success' => 'Data berhasil disimpan!']);
     }

     public function print($id_hard){
        // mengambil data berdasarkan id_hardware yang dipilih
        // $hardware = DB::table('hardware')->where('id_hard',$id_hard)->first();
        $hardware = DB::table('hardware as a')
        ->select('a.*', 'b.nama_client', 'c.nama_its')
       ->join('client as b', 'b.id_client', 'a.i_client')
       ->join('its as c', 'c.id_its', 'a.h_its')
       ->where('a.id_hard',$id_hard)
        ->get();       
        $hardware2 = DB::table('dhard as a')
        ->select('a.*', 'b.nama_status', 'c.nama_progress')
         ->join('status as b', 'b.id_status', 'a.i_status')
         ->join('progress as c', 'c.id_progress', 'a.i_prog')
         ->where('a.id_hard', $id_hard)
        ->get(); 
         // passing data yang did_hardwareapat ke view edit.blade.php
         $pdf = PDF::loadView('report/print_hard', compact('hardware','hardware2'))->setPaper('a4', 'landscape');
    return $pdf->stream();
    }
    public function print2()
	 {
        // $this->authorize('detail_data/hardware');
		$hardware2 = DB::table('dhard as a')
        ->select('a.*', 'b.nama_status', 'c.nama_progress')
         ->join('status as b', 'b.id_status', 'a.i_status')
         ->join('progress as c', 'c.id_progress', 'a.i_prog')
         ->where('a.i_prog', '6')
        ->get();
         $pdf = PDF::loadView('report/printselesai_hard', compact('hardware2'))->setPaper('a4', 'landscape');
    return $pdf->stream();
     }
     public function print3()
	 {
        // $this->authorize('detail_data/hardware');
		$hardware3 = DB::table('dhard as a')
        ->select('a.*', 'b.nama_status', 'c.nama_progress')
         ->join('status as b', 'b.id_status', 'a.i_status')
         ->join('progress as c', 'c.id_progress', 'a.i_prog')
         ->where('a.i_status', '4')
        ->get();
        // return view('report/printurgent_hard', compact('hardware3'));

         $pdf = PDF::loadView('report/printurgent_hard', compact('hardware3'))->setPaper('a4', 'landscape');
    return $pdf->stream();
     }

     public function view($id_hard){
        // mengambil data berdasarkan id_hardware yang dipilih
        $hardware = DB::table('hardware')->where('id_hard',$id_hard)->first();
        $dhard = dhard::where('id_hard', $id_hard)->get();
        $status = status::all();
        $progress = progress::all();
        $its = its::all();
        $client = client::all();
         // passing data yang did_hardwareapat ke view edit.blade.php
         return view('pengelola/view_hard', compact('hardware','progress','status','its','client', 'dhard'));
    }
     
public function edit($id_hard){
    // mengambil data berdasarkan id_hardware yang dipilih
    $hardware = DB::table('hardware')->where('id_hard',$id_hard)->first();
    $dhard = dhard::where('id_hard', $id_hard)->get();
    $status = status::all();
    $progress = progress::all();
    $its = its::all();
    $client = client::all();
	 // passing data yang did_hardwareapat ke view edit.blade.php
	 return view('pengelola/edit_hard', compact('hardware','progress','status','its','client', 'dhard'));
}
      

	 public function update(Request $request) 
{
    // dd($request->all());
    // untuk validasi form
    $this -> validate($request, [
        'm_hard' => 'required',
        'dm_hard' => 'required',
        'i_client' => 'required',
        'i_staff' => 'required',
        'tgl_perbaikan' => 'required',
        'h_its' => 'required'
    ]);
	// update data
	
// passing data yang didapat ke view edit.blade.php
    DB::table('hardware')->where('id_hard',$request->id_hard)->update([
		 'm_hard' => $request->m_hard,
         'i_client' => $request->i_client,
         'i_staff' => $request->i_staff,
         'tgl_perbaikan' => $request->tgl_perbaikan,
         'h_its' => $request->h_its
    ]);

    dhard::where('id_hard', $request->id_hard)->delete();
//  dd($detail);

    if (isset($request->dm_hard)){
        foreach($request->dm_hard as $key => $value){
            $detail = new dhard;
            $detail->id_hard = $request->id_hard;
            $detail->dm_hard = $request->dm_hard[$key];
            $detail->k_rusak = $request->k_rusak[$key];
            $detail->j_komputer = $request->j_komputer[$key];
            $detail->i_status = $request->i_status[$key];
            $detail->i_prog = $request->i_prog[$key];
            $detail->save();
        }
    }

    // alihkan halaman edit ke halaman 
    return redirect()->route('hardware.index')->with(['success' => 'Data berhasil disimpan!']);
}

public function destroy($id_hard)
{
	 $hardware = hardware::where('id_hard',$id_hard)->delete();
     dhard::where('id_hard',$id_hard)->delete();
     
	 return redirect()->route('hardware.index')->with(['success' => 'Data berhasil dihapus']);
}

public function printdata($id)
{
    //GET DATA BERDASARKAN ID
    $hardware = hard::with(['customer', 'detail', 'detail.product'])->find($id);
    //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
    //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
    $pdf = PDF::loadView('invoice.print', compact('invoice'))->setPaper('a4', 'landscape');
    return $pdf->stream();
}

}
