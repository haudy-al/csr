<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\TransaksiUsulan;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class dataUsulanMemberCtl extends Controller
{
    function index()
    {
        $dataUsulan = UsulanKegiatanModel::where('id_member', getDataMember()->id)->get();

        if (getDataMember()->level == 'pd') {

            return view('member.datausulan.pd', [
                'dataUsulan' => $dataUsulan
            ]);
        } elseif (getDataMember()->level == 'cp') {
            $dataUsulanCp = UsulanKegiatanModel::whereHas('member', function ($query) {
                $query->where('level', 'cp');
            })->where('id_member', '!=', getDataMember()->id)->get();
            return view('member.datausulan.cp', [
                'dataUsulan' => $dataUsulan,
                'dataUsulanCp' => $dataUsulanCp
            ]);
        }
    }


    function viewDataUsulanPD()
    {

        $dataUsulanCs = UsulanKegiatanModel::whereHas('member', function ($query) {
            $query->where('level', 'pd');
        })->get();


        return view('member.datausulan.viewpd', [
            'dataUsulan' => $dataUsulanCs
        ]);
    }

    function viewTambah()
    {

        return view('member.datausulan.tambah');
    }

    function DownloadPdf($id)
    {
        $cek = UsulanKegiatanModel::find($id);
        $path = storage_path('app/pdf/' . $cek->proposal); // Tentukan path file di folder storage

        if (file_exists($path)) {
            return response()->download($path, $cek->proposal, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $cek->proposal . '"',
            ]);
        } else {
            abort(404, 'File not found');
        }
    }

    function ProsesHapus($id)
    {
        $cek = UsulanKegiatanModel::find($id);

        if ($cek) {

            $path = storage_path('app/pdf/' . $cek->proposal);

            if (file_exists($path)) {
                unlink($path);
            }

            $awalan_nama = $cek->id;
            $direktori = storage_path('app/public/pdf-image');

            $files = scandir($direktori);

            foreach ($files as $file) {
                if (strpos($file, $awalan_nama) === 0 && pathinfo($file, PATHINFO_EXTENSION) === 'png') {
                    Storage::delete('app/public/pdf-image/' . $file);
                    unlink($direktori . '/' . $file);
                }
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
            return redirect('/member')->with(session()->flash('error', 'Terjadi Kesalahan'));
        }
        return view('member.datausulan.edit');
    }

    function BantuUsulan($id)
    {
        if (getDataTransaksiByid($id) == null) {
            TransaksiUsulan::create([
                'id_member' => getDataMember()->id,
                'id_usulan_kegiatan' => $id,
            ]);

            return redirect('/member/laporan/tambah?usulan=' . $id);
        }

        return redirect('/member/laporan/tambah?usulan=' . $id);
    }

    function viewDetail() {
        $data = UsulanKegiatanModel::where('id', _get('i'))->get()->first();

        if (!$data) {
            return redirect()->back()->with(session()->flash('error', 'Data Tidak Ditemukan!'));
        }
        return view('member.datausulan.detail', [
            'data'=>$data
        ]);
    }
}
