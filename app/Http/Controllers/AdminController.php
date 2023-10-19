<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\BeritaModel;
use App\Models\CounterViewModel;
use App\Models\LoginLogModel;
use App\Models\MemberModel;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard()
    {

        $currentYear = date('Y');
        $years = [$currentYear];
        for ($i = 1; $i <= 5; $i++) {
            $years[] = $currentYear - $i;
        }
        $usulanKegiatan = [];

        foreach ($years as $year) {
            $usulanCount = UsulanKegiatanModel::whereYear('created_at', $year)->count();
            $usulanKegiatan[$year] = $usulanCount;
        }

        $jumlahBerita = BeritaModel::count();
        $jumlahMember = MemberModel::count();
        $jumlahView = CounterViewModel::count();


        return view('admin.dashboard',[
            'usulanKegiatan'=>$usulanKegiatan,
            'jumlahBerita'=>$jumlahBerita,
            'jumlahMember'=>$jumlahMember,
            'jumlahPengunjung'=>$jumlahView,
        ]);
    }

    function viewLogin()
    {
        $cekLogin = AdminModel::where('token', session('token'))->get()->first();

        if ($cekLogin && $cekLogin->token != '0') {
            return redirect('/admin');
        }

        return view('admin.auth.login');
    }

    function logout()
    {
        $user = AdminModel::where('token', session('token'))->get()->first();
        if (!$user) {
            return redirect('/admin/login');
        }
        $user->update(['token' => 0]);
        $user->save();
        session()->forget('token');

        return redirect('/admin/login')->with(session()->flash('success', 'Logout Berhasil'));
    }

    function resetLogin(Request $req)
    {
        $cek = LoginLogModel::where('user_ip', $req->ip)->get()->first();

        if ($cek && $cek->jml_upaya_login > 3) {
            $cek->jml_upaya_login = 0;
            $cek->save();
        }
    }

    function viewBerita()
    {
        $data = BeritaModel::orderBy('created_at', 'DESC')->get();

        return view('admin.berita.index', [
            'dataBerita' => $data
        ]);
    }

    function viewProfile()
    {
        return view('admin.profile');
    }
}
