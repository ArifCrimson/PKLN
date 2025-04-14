<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('role:admin',['only' => ['index','edit','update','delete']]);
    }
    public function index(){
        $users = User::paginate(10);
        return view('tetapan.User.index', compact('users'));
    }

    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();
        $userRoles = $user->roles->pluck('name')->toArray();
        return view('tetapan.User.edit', compact('user','roles','userRoles'));
    }

    public function update(Request $request, $id){

        $user = User::find($id);

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|confirmed',
            'roles' => 'required'
        ],[
            'name.required' => 'Nama pengguna akaun perlu disertakan',
            'email.required' => 'Emel pengguna akaun perlu disertakan',
            'roles.required' => 'Peranan pengguna diperlukan untuk kemaskini',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }   

        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        $input = $request->all();
        
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            unset($input['password']);
        }
        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('tetapanuser.index')->with('success', 'User Bejaya Dikemaskini!');

    }

    public function delete($id){
        $user = User::find($id);

        if($user){
            $user->delete();
        }
        return redirect()->route('tetapanuser.index')->with('success', 'User Bejaya Dihapus!');

    }


}
