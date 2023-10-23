<?php

namespace App\Http\Controllers;

use App\Models\DokumenModel;
use Illuminate\Http\Request;

class AdminDokumenCtl extends Controller
{
    function index() {

        $data = DokumenModel::orderBy('created_at','DESC')->get();

        return view('admin.dokumen.index',[
            'dataDokumen'=>$data
        ]);

    }

    function viewTambah() {
        return view('admin.dokumen.tambah');
    }

    function ProsesHapus($id) {
        
        $cek = DokumenModel::find($id);

        if ($cek) {

            $path = storage_path('app/pdf/' . $cek->dokumen); 

            if (file_exists($path)) {
                unlink($path);
            }

            $cek->delete();

            return redirect()->back()->with(session()->flash('error', 'Delete Berhasil'));
        } else {
            abort(404, 'Page not found');
        }

    }

    function viewEdit()
    {
        if (!$dataGet = _get('i')) {
            return redirect('/admin/master/dokumen')->with(session()->flash('error', 'Terjadi Kesalahan'));
        }
        return view('admin.dokumen.edit');
    }
}
