<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\BeritaModel;
use App\Models\BidangModel;
use App\Models\DokumenModel;
use App\Models\FaqModel;
use App\Models\GaleriFotoModel;
use App\Models\GaleriVideoModel;
use App\Models\MemberModel;
use App\Models\UsulanKegiatanModel;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Svg\Surface\SurfacePDFLib;
use Spatie\PdfToImage\Pdf;
use Illuminate\Support\Facades\Cache;


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
        $activities = Activity::all();
        // $dataBeritaKotaBogor = array_slice($this->getApiBeritaKotaBogor(), 0, 3);
        $dataBeritaKotaBogor = array_slice($this->getApiBeritaKotaBogor()->{'Berita Bogor'} ?? [], 0, 3) ;

        // dd($dataBeritaKotaBogor);      
        
        return view('home', [
            'dataGaleriVideo' => $dataGaleriVideo,
            'dataGaleriFoto' => $dataGaleriFoto,
            'dataBerita' => $dataBerita,
            'Faq' => $Faq,
            'activities'=>$activities,
            'dataBeritaKotaBogor'=>$dataBeritaKotaBogor
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

    function viewMitraCsr()
    {
        return view('mitracsr.index');
    }


    function viewDetailMitraCsr()
    {
        if (!_get('i')) {
            abort('404');
        }

        $dataUser = MemberModel::find(_get('i'));

        return view('mitracsr.detail', [
            'data' => $dataUser
        ]);
    }

    function viewDokumen()
    {

        $data = DokumenModel::orderBy('created_at', 'DESC')->paginate('6');

        return view('dokumen', [
            'dataDokumen' => $data
        ]);
    }

    function viewDokumenDetail($id)
    {
        $dataDokumen = DokumenModel::find($id);

        $pdfPath = storage_path('app/pdf/' . $dataDokumen->dokumen);
        $imagePath = storage_path('app/public/pdf-image/' .'dokumen-img_'. $dataDokumen->id . '_page_'); 

        if (!file_exists($pdfPath)) {
            abort(404, 'File not found');
        }

        $pdf = new Pdf($pdfPath);
        $totalPages = $pdf->getNumberOfPages();


        $imageUrl = [];


        for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
            $pageNumberString = str_pad($pageNumber, 3, '0', STR_PAD_LEFT);
            $imageUrl[] = 'dokumen-img_'. $dataDokumen->id . '_page_' . $pageNumberString . '.png';
           
        }

        return view('detailDokumen', [
            'dataDokumen' => $dataDokumen,
            'imageUrl'=>$imageUrl,
        ]);
    }

    function viewAgendaKegiatan() {
        $activities = Activity::all();
        return view('agendakegiatan',[
            'activities'=>$activities
        ]);
    }

    public function getApiBeritaKotaBogor(){
        try {
            $cachedData = Cache::get('api_berita_kota_bogor');
            if ($cachedData) {
                return $cachedData;
            }

            $clientId = env('OAUTH_CLIENT_ID');
            $clientSecret = env('OAUTH_CLIENT_SECRET');
            $tokenUrl = env('OAUTH_TOKEN_URL');

            $client = new Client();
            
            $response = $client->post($tokenUrl, [
                'form_params' => [
                    'grant_type' => 'client_credentials',
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret,
                ],
            ]);

            $token = json_decode($response->getBody()->getContents())->access_token;

            $apiUrl = 'https://api-splp.layanan.go.id/t/kotabogor.go.id/KotaBogor/1.0/berita?key=b3r1t4b0g0r';
            $response = $client->get($apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents());

            Cache::put('api_berita_kota_bogor', $data, now()->addHours(1));

            return $data;
        } catch (\Exception $e) {
            return null;
        }
    }


    public function viewBeritaKotaBogor()
    {
        $dataBerita = $this->getApiBeritaKotaBogor()->{'Berita Bogor'} ?? [];
        return view('berita-kota-bogor',[
            'dataBerita'=>$dataBerita
        ]);
    }

     public function detailBeritaKotaBogor($post_id)
        {
            try {
                $cachedData = Cache::get('api_berita_kota_bogor')->{'Berita Bogor'} ?? $this->getApiBeritaKotaBogor()->{'Berita Bogor'};

                $detailBerita = collect($cachedData)->firstWhere('postid', $post_id);

                if ($detailBerita) {
                    
                    return view('detail-berita-kota-bogor', ['data' => $detailBerita,'beritaLain'=>array_slice($this->getApiBeritaKotaBogor()->{'Berita Bogor'}, 0, 5)]);
                }

                return abort(404);
            } catch (\Exception $e) {
                return abort(404);
            }
        }

}
