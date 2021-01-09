<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
Use Alert;

use App\pro;

class PROController extends Controller
{
    //
    public function index()
	 {
		$this->authorize('master/pro');
		 $pro = pro::all();
		 return view('master/pro', ['pro' => $pro]);
     }

     public function store(Request $request)
    {
		//  dd($request->all());
    	$this->validate($request,[
    		// 'id_pro' => 'required|numeric',
            'nama_pro' => 'required',
            'nohp_pro' => 'required|numeric',
			 'email_pro' => 'required',
			 'alamat_pro' => 'required'
    	]);
		 
		if($request->id_pro == null){
		 $pro = new pro;
		//  $pro->id_pro = $request->id_pro;
		 $pro->nama_pro = $request->nama_pro;
		 $pro->tgl_lahir_pro = $request->tgl_lahir_pro;
       $pro->nohp_pro = $request->nohp_pro;
		 $pro->email_pro = $request->email_pro;
		 $pro->alamat_pro = $request->alamat_pro;
		 $pro->save();
		}else{
			//  dd('edit');
		 $pro = pro::find ($request->id_pro);
		 $pro->nama_pro = $request->nama_pro;
		 $pro->tgl_lahir_pro = $request->tgl_lahir_pro;
       $pro->nohp_pro = $request->nohp_pro;
		 $pro->email_pro = $request->email_pro;
		 $pro->alamat_pro = $request->alamat_pro;
		 $pro->save();
		 }
    	return redirect('/pro')->with(['success' => 'Data berhasil disimpan!']);
		}
	

public function destroy($id_pro)
{
	 $pro = pro::where('id_pro',$id_pro)->delete();
	 
	 return redirect()->route('pro.index')->with(['success' => 'Data berhasil dihapus']);
}
}
