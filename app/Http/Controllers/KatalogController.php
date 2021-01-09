<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
Use Alert;

use App\katalog;
class KatalogController extends Controller
{
    //
	 public function index()
	 {
		$this->authorize('pengelola/katalog');
		$katalog = katalog::all();
		return view('pengelola/katalog',['katalog' => $katalog]);
	}
 
	public function store(Request $request){
		$this->validate($request, [
			'judul' => 'required',
			'file' => 'required|file',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
 
		katalog::create([
			'judul' => $request->judul,
			'file' => $nama_file,
		]);
 
		return redirect('/katalog')->with(['success' => 'Data berhasil disimpan']);
	}

	public function destroy($id)
{
	 $katalog = katalog::where('id',$id)->delete();
	 
	 return redirect()->route('katalog.index')->with(['success' => 'Data berhasil dihapus']);
}
	

}
