<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use Illuminate\Http\Request;

class AdminBeritaCtl extends Controller
{
    function viewTambah() {
        return view('admin.berita.tambah');
    }

    function ProsesHapus($id) {
        $data = BeritaModel::find($id);

        if ($data->pemeriksaan_penunjang == null) {
            $data->pemeriksaan_penunjang = 'kosong.png';
        }

        if (file_exists(storage_path('app/public/img/' . $data->gambar))) {
            unlink(storage_path('app/public/img/' . $data->gambar));
        }
        $data->delete();

        return redirect()->back()->with(session()->flash('error', 'Delete Berhasil'));
    }

    function viewEdit() {
        if (!$dataGet = _get('i')) {
            
            // $data = BeritaModel::find($dataGet);
           
            return redirect('/member')->with(session()->flash('error', 'Terjadi Kesalahan'));
        
        }
         
        return view('member.datausulan.edit');
        
    }
}
