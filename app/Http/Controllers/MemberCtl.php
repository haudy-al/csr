<?php

namespace App\Http\Controllers;

use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;

class MemberCtl extends Controller
{
    function index() {

        $currentYear = date('Y');
        $years = [$currentYear];
        for ($i = 1; $i <= 5; $i++) {
            $years[] = $currentYear - $i;
        }
        $usulanKegiatan = [];

        foreach ($years as $year) {
            $usulanCount = UsulanKegiatanModel::where('id_member',getDataMember()->id)->whereYear('created_at', $year)->count();
            $usulanKegiatan[$year] = $usulanCount;
        }

        return view('member.dashboard',[
            'usulanKegiatan'=>$usulanKegiatan
        ]);
    }

    function viewProfile() {
        return view('member.profile');
    }
}
