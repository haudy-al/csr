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
            abort('404');
        }

        $data = BeritaModel::find($dataGet);

        if (!$data) {
            abort('404');
        }

        // dd($data);
         
        return view('admin.berita.edit',['data'=>$data]);
        
    }
}
