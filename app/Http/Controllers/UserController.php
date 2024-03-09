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
}
