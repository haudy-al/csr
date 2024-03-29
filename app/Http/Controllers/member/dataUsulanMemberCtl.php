<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\TransaksiUsulan;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    function viewTambah($type = null)
    {
        if (getDataMember()->level == 'pd') {
            return view('member.datausulan.tambah');  
        }

        return view('member.datausulan.cp.tambah', [
            'type' => $type
        ]);
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

    function DownloadWordSuratUsulan($id)
    {
        $cek = UsulanKegiatanModel::find($id);
        $path = storage_path('app/word/' . $cek->surat_pernyataan);

        if (file_exists($path)) {
            return response()->download($path, $cek->surat_pernyataan, [
                'Content-Type' => 'application/docx',
                'Content-Disposition' => 'inline; filename="' . $cek->surat_pernyataan . '"',
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

            $cekTransaksi = TransaksiUsulan::where('id_usulan_kegiatan',$id)->get();

            if ($cekTransaksi->isNotEmpty()) {
                TransaksiUsulan::where('id_usulan_kegiatan', $id)->delete();
            }

            $cek->delete();

            $level = '';
            $idAkun = '';

            if (cekUrlAdmin()) {
                $level = 'admin';
                $idAkun = getDataAdmin()->id;
                $sub = 'Hapus Usulan Kegiatan (admin)';
            } else {
                $level = 'user';
                $idAkun = getDataMember()->id;
                $sub = 'Hapus Usulan Kegiatan ';
            }

            $dLog = [
                'level' => $level,
                'idAkun' => $idAkun,
                'url' => $_SERVER['HTTP_HOST'] . '/' . getUrlSaatIni(),
                'subject' => $sub
            ];

            createdLog($dLog['level'], $dLog['idAkun'], $dLog['subject'], $dLog['url']);

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

    function BantuUsulan(Request $req, $id)
    {

        $data = $req->all();

        $rules = [
            'target_sasaran' => 'required|numeric|min:0',
        ];

        $customMessages = [
            'target_sasaran.required' => 'Target Sasaran harus diisi.',
        ];

        $validator = Validator::make($data, $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with(session()->flash('BantuGagal', $id));
        }

        $query = "SELECT transaksi_usulan.* 
                    FROM usulan_kegiatan 
                    JOIN transaksi_usulan ON usulan_kegiatan.id = transaksi_usulan.id_usulan_kegiatan 
                    WHERE usulan_kegiatan.id = :idUsulanKegiatan AND transaksi_usulan.status = 'diterima'";


        $dataLaporan = DB::select($query, ['idUsulanKegiatan' => $id]);


        $targetSasaran = getTargetSasaran($id)->jumlah_penerima_manfaat;

        foreach ($dataLaporan as $item) {
            $targetSasaran -= $item->target_sasaran;
        }

        if ($req->target_sasaran > $targetSasaran) {
            $message = 'Target Sasaran Melebihi Batas ' . $targetSasaran;

            return redirect()->back()->withErrors(['target_sasaran' => $message])->withInput()->with(session()->flash('BantuGagal', $id));
        }

        if (getDataTransaksiByid($id) == null) {
            TransaksiUsulan::create([
                'id_member' => getDataMember()->id,
                'id_usulan_kegiatan' => $id,
                'target_sasaran' => $req->target_sasaran,
            ]);

            return redirect('/member/data-usulan-peminatan');
        }

        TransaksiUsulan::where('id_usulan_kegiatan', $id)->where('id_member', getDataMember()->id)->update([
            'target_sasaran' => $req->target_sasaran,
            'status' => 'proses',
        ]);

        $dLog = [
            'level' => 'user',
            'idAkun' => getDataMember()->id,
            'url' => $_SERVER['HTTP_HOST'] . '/' . getUrlSaatIni(),
            'subject' => 'Tambah Usulan Peminatan member'
        ];
        createdLog($dLog['level'], $dLog['idAkun'], $dLog['subject'], $dLog['url']);

        // return redirect('/member/laporan/tambah?usulan=' . $id);
        return redirect('/member/data-usulan-peminatan');
    }

    function viewDetail()
    {
        $data = UsulanKegiatanModel::where('id', _get('i'))->get()->first();

        if (!$data) {
            return redirect()->back()->with(session()->flash('error', 'Data Tidak Ditemukan!'));
        }
        return view('member.datausulan.detail', [
            'data' => $data
        ]);
    }
}
