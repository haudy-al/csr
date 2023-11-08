<?php

namespace App\Http\Controllers;

use App\Models\TransaksiUsulan;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;

class AdminUsulanPermintaan extends Controller
{
    function index() {

        $dataTransaksi = TransaksiUsulan::orderBy('created_at','DESC')->get();

        return view('admin.usulan_peminatan.index',[
            'dataTransaksi'=>$dataTransaksi
        ]);

    }

    function UpdateStatus(Request $req, $id) {
        $cek = TransaksiUsulan::find($id);
        if (!$cek) {
            abort('404');
        }
        $cek->status = $req->status;
        $cek->save();

        return redirect()->back()->with(session()->flash('success', 'Update Berhasil'));

    }
}
