<?php

namespace App\Livewire;

use App\Models\UsulanKegiatanModel;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\PdfToImage\Pdf;

class DetailProyek extends Component
{
    use WithPagination;
    public $id;
    public $data;

    function mount()
    {
        $this->id = _get('i');
        $this->data = getDataUsulan($this->id);
    }

    public function render()
    {

        $cek = UsulanKegiatanModel::find($this->id);

        if (!$cek) {
            abort(404, 'File not found');
        }

        $pdfPath = storage_path('app/pdf/' . $cek->proposal);
        $imagePath = storage_path('app/public/pdf-image/' . $cek->id . '_page_'); // Nama file akan ditambahi dengan nomor halaman

        // Periksa apakah file PDF sudah ada
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

        // for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
        //     $pageNumberString = str_pad($pageNumber, 3, '0', STR_PAD_LEFT);
        //     $imageUrl[] = $cek->id . '_page_' . $pageNumberString . '.png';
        //     $pdf->setPage($pageNumber)->saveImage($imagePath . $pageNumberString . '.png');
        // }

        return view('livewire.detail-proyek', ['imageUrl' => $imageUrl]);
    }
}
