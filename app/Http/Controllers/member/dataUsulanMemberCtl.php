<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\TransaksiUsulan;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            return view('member.datausulan.cp', [
                'dataUsulan' => $dataUsulan
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

            $path = storage_path('app/pdf/' . $cek->proposal); // Tentukan path file di folder storage

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

            return redirect('/member/laporan/tambah?usulan='.$id);
        }

        return redirect('/member/laporan/tambah?usulan='.$id);

    }
}
