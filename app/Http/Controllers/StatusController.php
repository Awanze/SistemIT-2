<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
Use Alert;

use App\status;

class StatusController extends Controller
{
    //
    public function index()
	 {
		$this->authorize('master/status');
		 $status = status::all();
		 return view('master/status', ['status' => $status]);
     }

     public function store(Request $request)
    {
		//  dd($request->all());
    	$this->validate($request,[
    		// 'id_status' => 'required',
    		'nama_status' => 'required'
    	]);
		 if($request -> id_status == null){
		 $status = new status;
		//  $status->id_status = $request->id_status;
		 $status->nama_status = $request->nama_status;
		 $status->save();
		 }else{
 		 $status = status::find ($request->id_status);
		 $status->nama_status = $request->nama_status;
		 $status->save();
		 }

    	return redirect('/status')->with(['success' => 'Data berhasil disimpan!']);
    }
 
	 public function destroy($id_status)
    {
        $status = status::where('id_status',$id_status)->delete();
        
        return redirect()->route('status.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
