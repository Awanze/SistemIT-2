<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\client;

class ClientController extends Controller
{
	 //
	 
    public function index()
	 {
		$this->authorize('master/client');
		$client = client::all();
		 return view('master/client', ['client' => $client]);
     }

     public function store(Request $request)
    {
		 
		//  dd($request->all());
    	$this->validate($request,[
    		// 'id_client' => 'required|numeric',
          'nama_client' => 'required',
          'nohp_client' => 'required|numeric',
			 'alamat_client' => 'required',
			 'email_client' => 'required',
			 'maintenance' => 'required',
			 'jumlah_lisensi' => 'required|numeric',
			 'jumlah_server' => 'required|numeric',
			 'jumlah_komputer' => 'required|numeric'

    	]);
 if($request -> id_client == null){
		 $client = new client;
		//  $client->id_client = $request->id_client;
         $client->nama_client = $request->nama_client;
         $client->nohp_client = $request->nohp_client;
		   $client->alamat_client = $request->alamat_client;		 
		   $client->email_client = $request->email_client;
         $client->maintenance = $request->maintenance;
		   $client->jumlah_lisensi = $request->jumlah_lisensi;
		   $client->jumlah_server = $request->jumlah_server;
         $client->jumlah_komputer = $request->jumlah_komputer;
		   $client->save();
 }else{
		$client = client::find ($request->id_client);
		$client->nama_client = $request->nama_client;
		$client->nohp_client = $request->nohp_client;
	   $client->alamat_client = $request->alamat_client;		 
	   $client->email_client = $request->email_client;
		$client->maintenance = $request->maintenance;
	   $client->jumlah_lisensi = $request->jumlah_lisensi;
	   $client->jumlah_server = $request->jumlah_server;
		$client->jumlah_komputer = $request->jumlah_komputer;
		$client->save();
	
 }
    	return redirect('/client')->with(['success' => 'Data berhasil disimpan!']);
	 }

public function destroy($id_client)
{
	 $client = client::where('id_client',$id_client)->delete();
	 
	 return redirect()->route('client.index')->with(['success' => 'Data berhasil dihapus']);
}
 
}