<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use App\Models\BidangModel;
use App\Models\FaqModel;
use App\Models\GaleriFotoModel;
use App\Models\GaleriVideoModel;
use Illuminate\Http\Request;

class FrontEndCtl extends Controller
{
    function index() {
        $dataGaleriVideo = GaleriVideoModel::take(5)->get();
        $dataGaleriFoto = GaleriFotoModel::take(5)->get();
        $dataBerita = BeritaModel::take(3)->get();
        $Faq = FaqModel::get();
        

        return view('home',[
            'dataGaleriVideo'=>$dataGaleriVideo,
            'dataGaleriFoto'=>$dataGaleriFoto,
            'dataBerita'=>$dataBerita,
            'Faq'=>$Faq,
        ]);
    }

    function detailBerita($id) {
        $cek = BeritaModel::find($id);
        if (!$cek) {
            abort(404);
        }

        return view('detailBerita',[
            'data'=>$cek,
        ]);
    }

    function viewProyekCsr() {

        $bidang = BidangModel::all();

        return view('proyekcsr.index',[
            'dataBidang'=>$bidang,
        ]);
    }
}
