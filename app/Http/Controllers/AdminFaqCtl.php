<?php

namespace App\Http\Controllers;

use App\Models\FaqModel;
use Illuminate\Http\Request;

class AdminFaqCtl extends Controller
{
    function viewFaq() {
        $data = FaqModel::orderBy('created_at', 'DESC')->get();
        return view('admin.faq.index', [
            'data' => $data
        ]);
    }

    function viewFaqTambah() {
        return view('admin.faq.tambah');
    }

     function ProsesHapusFaq($id)
    {

        $data = FaqModel::find($id);

      
        $data->delete();

        return redirect()->back()->with(session()->flash('error', 'Delete Berhasil'));
    }

    function viewFaqEdit()
    {
        if (!$dataGet = _get('i')) {
            return redirect('/admin/faq/')->with(session()->flash('error', 'Terjadi Kesalahan'));
        }
        return view('admin.faq.edit');
    }
}
