<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
Use Alert;
use App\its;
use Response;
use Auth;
class ITSController extends Controller
{
    //
    public function index()
	 {
		//  dd(Auth::user()->authorize('master/itsf'));
		$this->authorize('master/its');
		 $its = its::all();
		 return view('master/its', ['its' => $its]);
     }

     public function store(Request $request)
    {
		//  dd($request->all());
    	$this->validate($request,[
    		// 'id_its' => 'required|numeric',
            'nama_its' => 'required',
            'nohp_its' => 'required|numeric',
			 'email_its' => 'required',
			 'alamat_its' => 'required'
    	]);

		 if($request->id_its == null){
			//  dd('add');
			 $its = new its;
			 $its->nama_its = $request->nama_its;
			 $its->tgl_lahir_its = $request->tgl_lahir_its;
			 $its->nohp_its = $request->nohp_its;
			 $its->email_its = $request->email_its;
			 $its->alamat_its = $request->alamat_its;
			 $its->save();
		 }else{
			//  dd('edit');
			 $its = its::find ($request->id_its);
			 $its->nama_its = $request->nama_its;
			 $its->tgl_lahir_its = $request->tgl_lahir_its;
			 $its->nohp_its = $request->nohp_its;
			 $its->email_its = $request->email_its;
			 $its->alamat_its = $request->alamat_its;
			 $its->save();
		 }
		 
 
    	return redirect('/its')->with(['success' => 'Data berhasil disimpan!']);
    }
 

public function destroy($id_its)
{
	 $its = its::where('id_its',$id_its)->delete();
	 
	 return redirect()->route('its.index')->with(['success' => 'Data berhasil dihapus']);
}
}
