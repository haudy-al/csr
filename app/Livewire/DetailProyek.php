<?php

namespace App\Livewire;

use App\Models\LaporanModel;
use App\Models\MemberModel;
use App\Models\UsulanKegiatanModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\PdfToImage\Pdf;

class DetailProyek extends Component
{
    use WithPagination;
    public $id;
    public $data;

    public $anggaranTersedia;
    public $penerimaManfaat;

    function mount()
    {
        $this->id = _get('i');
        $this->data = getDataUsulan($this->id);

        $query = "SELECT laporan.* 
          FROM usulan_kegiatan 
          JOIN laporan ON usulan_kegiatan.id = laporan.id_usulan_kegiatan 
          WHERE usulan_kegiatan.id = :idUsulanKegiatan";

        $dataLaporan = DB::select($query, ['idUsulanKegiatan' => $this->data->id]);

        

        foreach ($dataLaporan as $item) {
            $this->anggaranTersedia += $item->anggaran;
            $this->penerimaManfaat += $item->target_sasaran;
        }

    }

    public function render()
    {

        $cek = UsulanKegiatanModel::find($this->id);

        if (!$cek) {
            abort(404, 'File not found');
        }

        $pdfPath = storage_path('app/pdf/' . $cek->proposal);
        $imagePath = storage_path('app/public/pdf-image/' . $cek->id . '_page_'); // Nama file akan ditambahi dengan nomor halaman

        if (!file_exists($pdfPath)) {
            abort(404, 'File not found');
        }

        $pdf = new Pdf($pdfPath);
        $totalPages = $pdf->getNumberOfPages();


        $imageUrl = [];


        for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
            $pageNumberString = str_pad($pageNumber, 3, '0', STR_PAD_LEFT);
            $imageUrl[] = $cek->id . '_page_' . $pageNumberString . '.png';
            $imageFilePath = $imagePath . $pageNumberString . '.png';
            if (!file_exists($imageFilePath)) {
                $pdf->setPage($pageNumber)->saveImage($imageFilePath);
            }
        }

        $dataMemberPartisipasi = DB::table('member')
            ->join('laporan', 'member.id', '=', 'laporan.id_member')
            ->where('laporan.id_usulan_kegiatan', $this->id)
            ->select('member.*', 'laporan.*') 
            ->get();


        // dd($dataMemberPartisipasi);

        return view('livewire.detail-proyek', ['imageUrl' => $imageUrl, 'dataMemberPartisipasi' => $dataMemberPartisipasi]);
    }
}
