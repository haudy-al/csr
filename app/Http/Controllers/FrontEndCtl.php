<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use App\Models\BidangModel;
use App\Models\FaqModel;
use App\Models\GaleriFotoModel;
use App\Models\GaleriVideoModel;
use App\Models\MemberModel;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Svg\Surface\SurfacePDFLib;
use Spatie\PdfToImage\Pdf;


class FrontEndCtl extends Controller
{
    function __construct()
    {
        $this->middleware('counterview');
    }

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


    public function viewProposalImage($id)
    {
        $cek = UsulanKegiatanModel::find($id);

        if (!$cek) {
            abort(404, 'File not found');
        }

        $pdfPath = storage_path('app/pdf/' . $cek->proposal);
        $imagePath = storage_path('app/pdf/' . $cek->id . '.png'); // Path untuk menyimpan gambar hasil konversi

        // Periksa apakah file PDF sudah ada
        if (!file_exists($pdfPath)) {
            abort(404, 'File not found');
        }

        // Konversi PDF ke Gambar (PNG)
        $pdf = new Pdf($pdfPath);

        $pdf->saveImage($imagePath);

        // Mengembalikan URL gambar hasil konversi
        return response()->file($imagePath, ['Content-Type' => 'image/png']);
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



    function viewStatistik()
    {

        $tahunSelect =  date('Y');

        if (_get('t')) {
            $tahunSelect = _get('t');
        }

        $Kegiatan = [];

        for ($month = 1; $month <= 12; $month++) {
            $count = UsulanKegiatanModel::whereYear('created_at', $tahunSelect)
                ->whereMonth('created_at', $month)
                ->count();

            $Kegiatan[date('F', mktime(0, 0, 0, $month, 1))] = $count;
        }


        return view('statistik', [
            'UsulanKegiatan' => $Kegiatan,
            'tahunData' => $this->dataTahun()
        ]);
    }

    function dataTahun()
    {
        $tahunSekarang = date('Y');
        $tahun = [$tahunSekarang];

        for ($i = 1; $i <= 5; $i++) {
            $tahun[] = $tahunSekarang - $i;
        }

        return $tahun;
    }

    function viewMitraCsr() {
        return view('mitracsr.index');
    }


    function viewDetailMitraCsr() {
        if (!_get('i')) {
           abort('404');
        }

        $dataUser = MemberModel::find(_get('i'));

        return view('mitracsr.detail',[
            'data'=>$dataUser
        ]);

    }
}
