<?php

namespace App\Http\Controllers;

use App\Exports\UsulanKegiatanExport;
use App\Models\BidangModel;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class AdminDataUsulanCtl extends Controller
{
    function index()
    {

        $data = UsulanKegiatanModel::orderBy('created_at', 'desc')->get();

        return view('admin.datausulan.index', [
            'data' => $data
        ]);
    }

    function viewTambah()
    {
        return view('admin.datausulan.tambah');
    }

    function viewEdit()
    {
        if (!$dataGet = _get('i')) {
            return redirect('/admin/data-usulan')->with(session()->flash('error', 'Terjadi Kesalahan'));
        }
        return view('admin.datausulan.edit');
    }

    function exportWord($id)
    {
        $data = UsulanKegiatanModel::where('id',$id)->get()->first();
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
        $textrun->addText($data->nama_kegiatan);
        $textrun = $section->addTextRun();
        $textrun = $section->addTextRun();

        $textrun->addText('Waktu Pelaksanaan : ', ['bold' => true]);
        $textrun->addText($data->waktu_pelaksanaan);
        $textrun = $section->addTextRun();
        $textrun = $section->addTextRun();

        $textrun->addText('Penerima Manfaat : ', ['bold' => true]);
        $textrun->addText($data->penerima_manfaat);
        $textrun = $section->addTextRun();
        $textrun = $section->addTextRun();

        $textrun->addText('Anggaran : ', ['bold' => true]);
        $textrun->addText($data->anggaran);
        $textrun = $section->addTextRun();
        $textrun = $section->addTextRun();

        $textrun->addText('Bentuk Kegiatan : ', ['bold' => true]);
        $textrun = $section->addTextRun();
        \PhpOffice\PhpWord\Shared\Html::addHtml($section,$data->bentuk_kegiatan);
        $textrun = $section->addTextRun();


        $filename = str_replace(' ','-',$data->nama_kegiatan).'.docx';

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path($filename));

        return response()->download(storage_path($filename))->deleteFileAfterSend(true);
    }

    function exportExcel() {
        return Excel::download(new UsulanKegiatanExport, 'kegiatan.xlsx');
    }

}
