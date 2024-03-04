<?php

namespace App\Http\Controllers;

use App\Models\LaporanModel;
use App\Models\TransaksiUsulan;
use App\Models\UsulanKegiatanModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;



class AdminLaaporanCtl extends Controller
{
    function index()
    {
        $dataLaporan = LaporanModel::orderBy('created_at', 'desc')->get();

        return view('admin.laporan.index', [
            'dataLaporan' => $dataLaporan,
        ]);
    }

    function viewTambah()
    {
        return view('admin.laporan.tambah', []);
    }

    function exportWord($id)
    {
        $data = LaporanModel::where('id', $id)->get()->first();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();


        $imagePath = public_path('img/logo.png');
        $imageOptions = array(
            'width' => 100,

            'ratio' => true,
        );
        $header = $section->addHeader();
        $header->addImage($imagePath, $imageOptions);

        $footer = $section->addFooter();
        $footer->addText('By csr.kotabogor.go.id');



        $textrun = $section->addTextRun();
        $textrun = $section->addTextRun();
        $textrun->addText('Nama Kegiatan : ', ['bold' => true]);
        $textrun->addText($data->usulan->nama_kegiatan);
        $textrun = $section->addTextRun();
        $textrun = $section->addTextRun();

        $textrun->addText('Member : ', ['bold' => true]);
        $textrun->addText($data->member->nama_perusahaan);
        $textrun = $section->addTextRun();
        $textrun = $section->addTextRun();

        $textrun->addText('Penerima Manfaat : ', ['bold' => true]);
        $textrun->addText($data->usulan->penerima_manfaat);
        $textrun = $section->addTextRun();
        $textrun = $section->addTextRun();

        $textrun->addText('Anggaran : ', ['bold' => true]);
        $textrun->addText($data->anggaran);
        $textrun = $section->addTextRun();
        $textrun = $section->addTextRun();

        $textrun->addText('Keterangan : ', ['bold' => true]);
        $textrun = $section->addTextRun();
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $data->keterangan);
        $textrun = $section->addTextRun();


        $filename = str_replace(' ', '-', 'laporan') . '.docx';

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path($filename));

        return response()->download(storage_path($filename))->deleteFileAfterSend(true);
    }

    function exportPDF($id)
    {

        $dataLaporan = LaporanModel::find($id);

        $dataUsulanKegiatan = UsulanKegiatanModel::where('id', $dataLaporan->id_usulan_kegiatan)->first();

        $transaksi = TransaksiUsulan::where('id_usulan_kegiatan', $dataLaporan->id_usulan_kegiatan)->where('id_member', $dataLaporan->id_member)->first();

        // dd($dataUsulanKegiatan);

        $pdfDokumanLaporan = storage_path('app/pdf/'. $dataLaporan->dokumen);

        $pdf = PDF::loadView('admin.laporan.pdf', [
            'dataTransaksi' => $transaksi,
            'dataKegiatan' => $dataUsulanKegiatan
        ]);
        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('dokumen.pdf');
    }

    function gabungPdf() {
        $pdf = new \Clegginabox\PDFMerger\PDFMerger;
    }
}
