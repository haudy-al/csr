<?php

namespace App\Http\Controllers;

use App\Models\LaporanModel;
use App\Models\TransaksiUsulan;
use App\Models\UsulanKegiatanModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class dataUsulanPeminatanCtl extends Controller
{
    function index() {

        $user_id = getDataMember()->id;

        $dataUsulanKegiatan = UsulanKegiatanModel::whereHas('transaksiUsulan', function ($query) use ($user_id) {
            $query->whereIn('id_usulan_kegiatan', function ($subquery) use ($user_id) {
                $subquery->select('id_usulan_kegiatan')
                    ->from('transaksi_usulan')
                    ->where('id_member', $user_id)
                    ->orderBy('created_at','DESC');
            });
        })->get();

        return view('member.usulanpeminatan.index',[
            'dataUsulanKegiatan'=>$dataUsulanKegiatan
        ]);
    }

    public function DownloadSuratMinat($id) {
        $data = TransaksiUsulan::where('id_usulan_kegiatan',$id)->get()->first();
    
        $html = view('pdf.template-usulan-peminatan', compact('data'))->render();
        $pdf = PDF::loadHtml($html);
    
        $pdf->setPaper('A4', 'portrait');
    
        
        $filePath = 'generated-pdf.pdf';
        $pdf->save(storage_path('app/public/' . $filePath));

        $dLog = [
            'level'=>'user',
            'idAkun'=>getDataMember()->id,
            'url'=>$_SERVER['HTTP_HOST'].'/'.getUrlSaatIni(),
            'subject'=>'Download Surat Minat'
        ];
        createdLog($dLog['level'],$dLog['idAkun'],$dLog['subject'],$dLog['url']);
    
        
        return response()->download(storage_path('app/public/' . $filePath))->deleteFileAfterSend(true);
    }

    function ProsesHapus($id) {
        $cek = TransaksiUsulan::find($id);

        if (!$cek) {
            return abort('404');
        }
        $cek->delete();

        $dLog = [
            'level'=>'user',
            'idAkun'=>getDataMember()->id,
            'url'=>$_SERVER['HTTP_HOST'].'/'.getUrlSaatIni(),
            'subject'=>'Hapus Usulan Peminatan member'
        ];
        createdLog($dLog['level'],$dLog['idAkun'],$dLog['subject'],$dLog['url']);
        
        return redirect()->back()->with(session()->flash('error', 'Delete Berhasil'));
    }
}
