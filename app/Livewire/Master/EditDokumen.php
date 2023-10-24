<?php

namespace App\Livewire\Master;

use App\Models\DokumenModel;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\PdfToImage\Pdf;

class EditDokumen extends Component
{

    use WithFileUploads;

    public $id;
    public $judul;
    public $dokumen;
    public $dokumenLama;

    public function mount()
    {
        $data = DokumenModel::find(_get('i'));

        if (!$data) {
            return redirect('/admin/master/dokumen');
        }

        $this->id = $data->id;
        $this->judul = $data->judul;
        $this->dokumenLama = $data->judul;
    }

    public function render()
    {
        return view('livewire.master.edit-dokumen');
    }

    function SimpanDokumen()
    {
        $cek = DokumenModel::find($this->id);

        $this->validate([
            'judul' => 'required',
            // 'dokumen' => 'mimes:pdf|max:2048',
        ], [
            'judul.required' => 'Judul Wajib di Isi',
        ]);


        $cek->judul = $this->judul;

        if ($this->dokumen) {
            $namadokumen = 'dokumen-' . uniqid() . date('ymdhis') . '.' . $this->dokumen->getClientOriginalExtension();
            if ($cek->dokumen == null) {
                $cek->dokumen = 'kosong.png';
            }
            if (file_exists(storage_path('app/pdf/' . $cek->dokumen))) {
                unlink(storage_path('app/pdf/' . $cek->dokumen));
            }

            $cek->dokumen = $namadokumen;


            $this->dokumen->storeAs('pdf/', $namadokumen);

            $awalan_nama = 'dokumen-img_' . $cek->id . '_page_';
            $direktori = storage_path('app/public/pdf-image');
            $files = scandir($direktori);

            foreach ($files as $file) {
                if (strpos($file, $awalan_nama) === 0 && pathinfo($file, PATHINFO_EXTENSION) === 'png') {
                    Storage::delete('app/public/pdf-image/' . $file);
                    unlink($direktori . '/' . $file);
                }
            }

            $pdfPath = storage_path('app/pdf/' . $cek->dokumen);
            $imagePath = storage_path('app/public/pdf-image/' . 'dokumen-img_' . $cek->id . '_page_'); // Nama file akan ditambahi dengan nomor halaman

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
        }

        $cek->save();

        $this->dispatch('TambahBerhasil');
    }
}
