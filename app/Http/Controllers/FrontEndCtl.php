<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use App\Models\BidangModel;
use App\Models\FaqModel;
use App\Models\GaleriFotoModel;
use App\Models\GaleriVideoModel;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class FrontEndCtl extends Controller
{

    function index()
    {
        $dataGaleriVideo = GaleriVideoModel::take(5)->get();
        $dataGaleriFoto = GaleriFotoModel::take(5)->get();
        $dataBerita = BeritaModel::take(3)->get();
        $Faq = FaqModel::get();


        return view('home', [
            'dataGaleriVideo' => $dataGaleriVideo,
            'dataGaleriFoto' => $dataGaleriFoto,
            'dataBerita' => $dataBerita,
            'Faq' => $Faq,
        ]);
    }

    function viewGaleri()
    {
        $dataGaleriVideo = GaleriVideoModel::orderBy('created_at', 'DESC')->get();
        $dataGaleriFoto = GaleriFotoModel::orderBy('created_at', 'DESC')->get();

        return view('galeri', [
            'dataGaleriVideo' => $dataGaleriVideo,
            'dataGaleriFoto' => $dataGaleriFoto,

        ]);
    }

    function viewBerita()
    {
        $data = BeritaModel::orderBy('created_at', 'DESC')->paginate('6');

        return view('berita', [
            'dataBerita' => $data,
        ]);
    }

    function detailBerita($id)
    {
        $cek = BeritaModel::find($id);
        if (!$cek) {
            abort(404);
        }

        return view('detailBerita', [
            'data' => $cek,
        ]);
    }


    function detailGaleriFoto($id)
    {
        $cek = GaleriFotoModel::find($id);
        if (!$cek) {
            abort(404);
        }

        return view('detailFoto', [
            'data' => $cek,
        ]);
    }

    function detailGaleriVideo($id)
    {
        $cek = GaleriVideoModel::find($id);
        if (!$cek) {
            abort(404);
        }

        return view('detailVideo', [
            'data' => $cek,
        ]);
    }


    function viewProyekCsr()
    {

        $bidang = BidangModel::all();

        return view('proyekcsr.index', [
            'dataBidang' => $bidang,
        ]);
    }

    function viewProyekCsrKegiatan()
    {
        if (!_get('i')) {
            return redirect('/proyek-csr');
        }
        return view('proyekcsr.kegiatan', []);
    }

    function viewProyekCsrKegiatanDetail()
    {
        if (!_get('i')) {
            return redirect('/proyek-csr');
        }

        return view('proyekcsr.detail', []);
    }

    function viewProposal($id)
    {
        $cek = UsulanKegiatanModel::find($id);

        if (!$cek) {
            abort(404, 'File not found');
        }
        
        $filePath = storage_path('app/pdf/'.$cek->proposal);

        if (file_exists($filePath)) {
            $headers = [
                'Content-Type' => 'application/pdf',
            ];

            return response()->file($filePath, $headers);
        } else {
            abort(404, 'File not found');
        }
    }
}
