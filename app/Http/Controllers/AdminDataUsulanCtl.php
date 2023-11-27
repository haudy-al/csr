<?php

namespace App\Http\Controllers;

use App\Exports\UsulanKegiatanExport;
use App\Models\BidangModel;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $data = UsulanKegiatanModel::where('id', $id)->get()->first();
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
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $data->bentuk_kegiatan);
        $textrun = $section->addTextRun();


        $filename = str_replace(' ', '-', $data->nama_kegiatan) . '.docx';

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path($filename));

        return response()->download(storage_path($filename))->deleteFileAfterSend(true);
    }

    function exportExcel(Request $req)
    {
        $data = $req->all();

        $rules = [
            'password_excel' => 'required',

        ];

        $customMessages = [
            'password_excel.required' => 'Password harus diisi.',
        ];

        $validator = Validator::make($data, $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with(session()->flash('tambahGagal'));
        }

        // return Excel::download(new UsulanKegiatanExport, 'kegiatan.xlsx');

        $export = new UsulanKegiatanExport();
        $filePath = 'document.xlsx';
        Excel::store($export, $filePath);

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $workbook = $reader->load(storage_path("app/{$filePath}"));
        $workbook->getSecurity()->setLockWindows(true);
        $workbook->getSecurity()->setLockStructure(true);
        $workbook->getSecurity()->setlockRevision(true);
        $workbook->getSecurity()->setRevisionsPassword($req->password_excel);
        $workbook->getSecurity()->setWorkbookPassword($req->password_excel);

        // dd($workbook);
        
        $protectedFilePath = 'document_protected.xlsx';
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($workbook);

        $writer->save(storage_path("app/{$protectedFilePath}"));

        return response()->download(storage_path("app/{$protectedFilePath}"))->deleteFileAfterSend(true);
    }
}
