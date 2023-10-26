<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy('created_at','DESC')->get();
        return view('admin.kalender.index', compact('activities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        Activity::create($request->all());

        return redirect()->route('calendar.index')->with('success', 'Berhasil di Tambahkan');
    }

    function viewTambah() {
        return view('admin.kalender.tambah');
        
    }

    function ProsesHapus($id) {
        $cek = Activity::find($id);
        if (!$cek) {
            return redirect()->route('calendar.index')->with('error', 'Data Tidak Ditemukan');
        }
        $cek->delete();
        return redirect()->route('calendar.index')->with('error', 'Data Berhasil di Hapus');


    }
}
