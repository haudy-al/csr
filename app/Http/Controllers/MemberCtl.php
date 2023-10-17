<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberCtl extends Controller
{
    function index() {
        return view('member.dashboard');
    }

    function viewProfile() {
        return view('member.profile');
    }
}
