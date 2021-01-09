<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
Use Alert;

use App\progress;

class ProgressController extends Controller
{
    //
    public function index()
	 {
		$this->authorize('master/progress');
		 $progress = progress::all();
		 return view('master/progress', ['progress' => $progress]);
     }

     public function store(Request $request)
    {
		//  dd($request->all());
    	$this->validate($request,[
    		// 'id_progress' => 'required|numeric',
    		'nama_progress' => 'required'
    	]);
		 if($request -> id_progress == null){
		 $progress = new progress;
		 $progress->nama_progress = $request->nama_progress;
		 $progress->save();
		 }else{
		 $progress = progress::find ($request->id_progress);
		 $progress->nama_progress = $request->nama_progress;
		 $progress->save();	 
		 }
    	return redirect('/progress')->with(['success' => 'Data berhasil disimpan!']);
	 }

	 public function destroy($id_progress)
    {
        $progress = progress::where('id_progress',$id_progress)->delete();
        
        return redirect()->route('progress.index')->with(['success' => 'Data berhasil dihapus']);
    }
 
}