<?php

namespace App\Livewire;

use App\Models\LaporanModel;
use App\Models\MemberModel;
use App\Models\TransaksiUsulan;
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
    public $kategori_manfaat;

    function mount()
    {
        $this->id = _get('i');
        $this->data = getDataUsulan($this->id);

        $query = "SELECT transaksi_usulan.* 
                    FROM usulan_kegiatan 
                    JOIN transaksi_usulan ON usulan_kegiatan.id = transaksi_usulan.id_usulan_kegiatan 
                    WHERE usulan_kegiatan.id = :idUsulanKegiatan AND transaksi_usulan.status = 'diterima'";

        $dataTransaksi = DB::select($query, ['idUsulanKegiatan' => $this->data->id]);

        foreach ($dataTransaksi as $item) {
            $this->penerimaManfaat += $item->target_sasaran;
        }

    }

    public function render()
    {

        $cek = UsulanKegiatanModel::find($this->id);

        if (!$cek) {
            abort(404, 'File not found');
        }

        $this->kategori_manfaat = $cek->kategori_manfaat;

        $pdfPath = storage_path('app/pdf/' . $cek->proposal);
        $imagePath = storage_path('app/public/pdf-image/' . $cek->id . '_page_'); // Nama file akan ditambahi dengan nomor halaman

        $imageUrl = [];
        
        
        // if (file_exists($pdfPath)) {
        //     $pdf = new Pdf($pdfPath);
        //     $totalPages = $pdf->getNumberOfPages();
    
    
        //     for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
        //         $pageNumberString = str_pad($pageNumber, 3, '0', STR_PAD_LEFT);
        //         $imageUrl[] = $cek->id . '_page_' . $pageNumberString . '.png';
        //         $imageFilePath = $imagePath . $pageNumberString . '.png';
        //         if (!file_exists($imageFilePath)) {
        //             $pdf->setPage($pageNumber)->saveImage($imageFilePath);
        //         }
        //     }
        // }

        

        $dataMemberPartisipasi = TransaksiUsulan::where('id_usulan_kegiatan',$cek->id)->where('status','diterima')->get();


        // dd($dataMemberPartisipasi);

        return view('livewire.detail-proyek', ['imageUrl' => $imageUrl, 'dataMemberPartisipasi' => $dataMemberPartisipasi]);
    }
}
