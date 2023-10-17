<?php

namespace App\Http\Controllers;

use App\Models\BidangModel;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;

class AdminDataUsulanCtl extends Controller
{
    function index() {

        $data = UsulanKegiatanModel::orderBy('created_at','desc')->get();

        return view('admin.datausulan.index',[
            'data'=>$data
        ]);
    }

    function viewTambah()
    {
        return view('admin.datausulan.tambah');
    }

    function viewEdit()
    {
        if (!$dataGet = _get('i')) {
            return redirect('/admin/data-usulan')->with(session()->flash('error', 'Terjadi Kesalahan'));
        }
        return view('admin.datausulan.edit');
    }
}
