<?php

namespace App\Http\Controllers;

use App\Models\MemberModel;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    function register() {
        
        return view('auth.register');
    }

    function viewLogin() {
        return view('auth.login');

    }

    function Logout() {
        $user = MemberModel::where('token', session('user_token'))->get()->first();
        if (!$user) {
            return redirect('/login');
        }
        $user->update(['token' => 0]);
        $user->save();
        session()->forget('user_token');

        return redirect('/login')->with(session()->flash('success','Logout Berhasil'));
    }

    function LupaPassword() {
        return view('auth.reset-password');
    }
}
