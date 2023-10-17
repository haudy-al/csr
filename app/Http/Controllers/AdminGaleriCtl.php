<?php

namespace App\Http\Controllers;

use App\Models\GaleriFotoModel;
use App\Models\GaleriVideoModel;
use Illuminate\Http\Request;

class AdminGaleriCtl extends Controller
{
    function viewVideo()
    {
        $data = GaleriVideoModel::orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.galeri.video.index',[
            'dataVideo' => $data
        ]);
    }

    function viewFoto()
    {
        $data = GaleriFotoModel::orderBy('created_at', 'DESC')->get();

        return view('admin.galeri.foto.index', [
            'dataFoto' => $data
        ]);
    }

    function viewFotoTambah()
    {

        return view('admin.galeri.foto.tambah');
    }

    function viewVideoTambah() {
        return view('admin.galeri.video.tambah');
        
    }

    function ProsesHapusFoto($id)
    {
        $data = GaleriFotoModel::find($id);

        if ($data->gambar == null) {
            $data->gambar = 'kosong.png';
        }

        if (file_exists(storage_path('app/public/img/' . $data->gambar))) {
            unlink(storage_path('app/public/img/' . $data->gambar));
        }
        $data->delete();

        return redirect()->back()->with(session()->flash('error', 'Delete Berhasil'));
    }

    function viewFotoEdit()
    {
        if (!$dataGet = _get('i')) {
            return redirect('/admin/galeri/foto')->with(session()->flash('error', 'Terjadi Kesalahan'));
        }
        return view('admin.galeri.foto.edit');
    }

    function ProsesHapusVideo($id) {
        $data = GaleriVideoModel::find($id);

        if ($data->gambar == null) {
            $data->gambar = 'kosong.png';
        }

        if (file_exists(storage_path('app/public/img/' . $data->gambar))) {
            unlink(storage_path('app/public/img/' . $data->gambar));
        }
        $data->delete();

        return redirect()->back()->with(session()->flash('error', 'Delete Berhasil'));
    }

    function viewVideoEdit()
    {
        if (!$dataGet = _get('i')) {
            return redirect('/admin/galeri/video')->with(session()->flash('error', 'Terjadi Kesalahan'));
        }
        return view('admin.galeri.video.edit');
    }
}
