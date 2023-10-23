<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\LaporanModel;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;

class LaporanMemberCtl extends Controller
{
    function index()
    {
        $user_id = getDataMember()->id;

        // $dataLaporan = LaporanModel::whereHas('usulanKegiatan', function ($query) use ($user_id) {
        //     $query->whereHas('transaksiUsulan', function ($query) use ($user_id) {
        //         $query->where('id_member', $user_id);
        //     });
        // })->get();

        $dataLaporan = LaporanModel::where('id_member', $user_id)->get();

        


        $dataUsulanKegiatan = UsulanKegiatanModel::whereHas('transaksiUsulan', function ($query) use ($user_id) {
            $query->whereIn('id_usulan_kegiatan', function ($subquery) use ($user_id) {
                $subquery->select('id_usulan_kegiatan')
                    ->from('transaksi_usulan')
                    ->where('id_member', $user_id);
            });
        })->get();


        return view('member.laporan.index', [
            'dataLaporan' => $dataLaporan,
            'dataUsulanKegiatan' => $dataUsulanKegiatan,
        ]);
    }

    function viewTambah()
    {
        return view('member.laporan.tambah', [
           
        ]);
    }

    function DownloadPdf($id)
    {
        $cek = LaporanModel::find($id);
        $path = storage_path('app/pdf/' . $cek->dokumen); // Tentukan path file di folder storage

        if (file_exists($path)) {
            return response()->download($path, $cek->dokumen, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $cek->dokumen . '"',
            ]);
        } else {
            abort(404, 'File not found');
        }
    }

    function ProsesHapus($id)
    {
        $cek = LaporanModel::find($id);

        if ($cek) {

            $path = storage_path('app/pdf/' . $cek->dokumen); // Tentukan path file di folder storage

            if (file_exists($path)) {
                unlink($path);
            }

            $cek->delete();

            return redirect()->back()->with(session()->flash('error', 'Delete Berhasil'));
        } else {
            abort(404, 'Page not found');
        }
    }

    function viewEdit() {
        return view('member.laporan.edit', [
           
        ]);
    }
}
