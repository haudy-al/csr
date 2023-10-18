<?php

namespace App\Http\Controllers;

use App\Models\LaporanModel;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;

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
}
