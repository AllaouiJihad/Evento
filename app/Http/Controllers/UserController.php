<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(){
        $users = User::with('events')->where('role_id', 3)->get();

        
        return view('users',compact('users'));
    }

    public function users(){
        $users = User::where('role_id',2)->get();
        return view('organisateurs',compact('users'));
    }
    public function banUser($user){
        $ban = User::find($user);
        $ban->role_id = 3;
        $ban->status = 0;
        $ban->save();
        return redirect()->back();
    }
}
