<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\NotifikasiTransaksi;
use App\Models\TransaksiUsulan;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminUsulanPermintaan extends Controller
{
    function index()
    {

        $dataTransaksi = TransaksiUsulan::orderBy('created_at', 'DESC')->get();

        return view('admin.usulan_peminatan.index', [
            'dataTransaksi' => $dataTransaksi
        ]);
    }

    function UpdateStatus(Request $req, $id)
    {
        $cek = TransaksiUsulan::find($id);
        if (!$cek) {
            abort('404');
        }

        $query = "SELECT transaksi_usulan.* 
                    FROM usulan_kegiatan 
                    JOIN transaksi_usulan ON usulan_kegiatan.id = transaksi_usulan.id_usulan_kegiatan 
                    WHERE usulan_kegiatan.id = :idUsulanKegiatan AND transaksi_usulan.status = 'diterima'";


        $dataTransaksi = DB::select($query, ['idUsulanKegiatan' => $cek->id_usulan_kegiatan]);


        $targetSasaran = getTargetSasaran($cek->id_usulan_kegiatan)->jumlah_penerima_manfaat;

        foreach ($dataTransaksi as $item) {
            $targetSasaran -= $item->target_sasaran;
        }

        if (($cek->status == 'proses' || $cek->status == 'ditolak') && $req->status == 'diterima') {
            if ($cek->target_sasaran > $targetSasaran) {
                $message = 'Target Sasaran Melebihi Batas ' . $targetSasaran;

                return redirect()->back()->with(session()->flash('error', $message));
            }
        }

        $cek->status = $req->status;
        $cek->save();

        if ($req->status == 'diterima') {
            $dataMail = [
                'email'=>'csdewa25@gmail.com',
                'nama_perusahaan'=>getDataMemberById($cek->id_member)->nama_perusahaan,
                // 'pesan'=>'Minat Anda Di Terima',
                'target_sasaran'=>getTargetSasaran($cek->id_usulan_kegiatan)->kategori_manfaat . ' '. $cek->target_sasaran,
                'nama_kegiatan'=>getTargetSasaran($cek->id_usulan_kegiatan)->nama_kegiatan
            ];
    
            SendEmailJob::dispatch($dataMail);
        }

        $dLog = [
            'level'=>'admin',
            'idAkun'=>getDataAdmin()->id,
            'url'=>$_SERVER['HTTP_HOST'].'/'.getUrlSaatIni(),
            'subject'=>'Update Status Usulan Minat ('.$req->status.')'
        ];
        createdLog($dLog['level'],$dLog['idAkun'],$dLog['subject'],$dLog['url']);

        return redirect()->back()->with(session()->flash('success', 'Update Berhasil'));
    }
}
