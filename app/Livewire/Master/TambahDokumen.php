<?php

namespace App\Livewire\Master;

use App\Models\DokumenModel;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\PdfToImage\Pdf;

class TambahDokumen extends Component
{

    use WithFileUploads;

    public $judul;
    public $dokumen;

    public function render()
    {
        return view('livewire.master.tambah-dokumen');
    }

    function TambahDokumen() {
        $this->validate([
            'judul' => 'required',
            'dokumen' => 'required|mimes:pdf|max:2048',
        ]);

        $namaPdf = 'dokumen-' . uniqid() . date('ymdhis') . '.' . $this->dokumen->getClientOriginalExtension();

        $cek = DokumenModel::create([
            'judul'=>$this->judul,
            'dokumen'=>$namaPdf
        ]);

        $this->dokumen->storeAs('pdf/', $namaPdf);

        $this->clearInput();

        $pdfPath = storage_path('app/pdf/' . $cek->dokumen);
        $imagePath = storage_path('app/public/pdf-image/'.'dokumen-img_'. $cek->id . '_page_'); // Nama file akan ditambahi dengan nomor halaman

        if (!file_exists($pdfPath)) {
            abort(404, 'File not found');
        }

        $pdf = new Pdf($pdfPath);
        $totalPages = $pdf->getNumberOfPages();


        for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
            $pageNumberString = str_pad($pageNumber, 3, '0', STR_PAD_LEFT);
            $imageFilePath = $imagePath . $pageNumberString . '.png';
            if (!file_exists($imageFilePath)) {
                $pdf->setPage($pageNumber)->saveImage($imageFilePath);
            }
        }

        $this->dispatch('TambahBerhasil');

    }

    function clearInput() {
        $this->judul = "";
        $this->dokumen = "";
    }
}
