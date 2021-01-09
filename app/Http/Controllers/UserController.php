<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
Use Alert;

use App\user;
use App\role;

class UserController extends Controller
{
    //
    public function index()
	 {
		$this->authorize('auth/staff');
		 $user = DB::table('users')->join('roles', 'roles.id','users.role_id')->select('users.*','roles.name as rolename')->get();
		 $role = role::all();
		//  return view('auth/staff', ['user' => $user]);
		 return view('auth/staff', compact('user','role'));
     }

     public function store(Request $request)
    {
		//  dd($request->all());
    	$this->validate($request,[
    		// 'id' => 'required|numeric',
            'name' => 'required',
				'nohp' => 'required|numeric',
				'departemen' => 'required',
    			'email' => 'required',
            'password' => 'required',
    		'role_id' => 'required'
    	]);
	
if($request -> id == null){		 
		 $user = new user;
		//  $user->id = $request->id;
         $user->name = $request->name;
			$user->nohp = $request->nohp;
			$user->departemen = $request->departemen;
         $user->email = $request->email;
         $user->password = bcrypt ($request->password);
		 $user->role_id = $request->role_id;
		 $user->save();
}else{
		 $user = user::find ($request->id);
		 $user->name = $request->name;
		 $user->nohp = $request->nohp;
		 $user->departemen = $request->departemen;
		 $user->email = $request->email;
		 $user->password = bcrypt ($request->password);
		 $user->role_id = $request->role_id;
		 $user->save();
}
    	return redirect('/staff')->with(['success' => 'Data berhasil disimpan!']);
    }

public function destroy($id)
{
	 $user = user::where('id',$id)->delete();
	 
	 return redirect('/staff')->with(['success' => 'Data berhasil dihapus!']);
}
}
