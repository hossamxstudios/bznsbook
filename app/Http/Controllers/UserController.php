<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller {

    public function index(){
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('admin.users',compact('users','roles'));
    }

    public function assignRoles(Request $request){
        $user        = User::findOrFail($request->user_id);
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->syncRoles([$request->role]);
        $user->save();
        return redirect()->back();
    }

    public function add(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->syncRoles([$request->role]);
        return redirect()->back();
    }

    public function destroy(Request $request){
        if (!Hash::check($request->password, $request->user()->password)) {
            return redirect()->back()->withErrors(['password' => 'Password is incorrect']);
        }else{
            $user = User::findOrFail($request->id);
            $user->delete();
            return redirect()->back();
        }
    }

}
