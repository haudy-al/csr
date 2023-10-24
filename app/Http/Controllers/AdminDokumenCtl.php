<?php

namespace App\Http\Controllers;

use App\Models\DokumenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDokumenCtl extends Controller
{
    function index()
    {

        $data = DokumenModel::orderBy('created_at', 'DESC')->get();

        return view('admin.dokumen.index', [
            'dataDokumen' => $data
        ]);
    }

    function viewTambah()
    {
        return view('admin.dokumen.tambah');
    }

   

    public function ProsesHapus($id)
    {
        $cek = DokumenModel::find($id);

        if ($cek) {
            $dokumenFileName = $cek->dokumen;

            // Hapus file dokumen
            $dokumenPath = storage_path('app/pdf/' . $dokumenFileName);
            if (file_exists($dokumenPath)) {
                unlink($dokumenPath);
            }

            // Hapus file gambar dengan pola nama tertentu
            $awalan_nama = 'dokumen-img_' . $cek->id . '_page_';
            $direktori = storage_path('app/public/pdf-image');

            $files = scandir($direktori);
            foreach ($files as $file) {
                if (strpos($file, $awalan_nama) === 0 && pathinfo($file, PATHINFO_EXTENSION) === 'png') {
                    $gambarPath = $direktori . '/' . $file;
                    if (file_exists($gambarPath)) {
                        unlink($gambarPath);
                    }
                }
            }

            // Hapus data dari database
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
