<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\BeritaModel;
use App\Models\CounterViewModel;
use App\Models\LogActivities;
use App\Models\LoginLogModel;
use App\Models\MemberModel;
use App\Models\TransaksiUsulan;
use App\Models\UsulanKegiatanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $logAktivites = LogActivities::orderBy('created_at','DESC')->get();


        return view('admin.dashboard',[
            'usulanKegiatan'=>$usulanKegiatan,
            'jumlahBerita'=>$jumlahBerita,
            'jumlahMember'=>$jumlahMember,
            'jumlahPengunjung'=>$jumlahView,
            'logAktivites'=>$logAktivites,
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

        $dLog = [
            'level'=>'admin',
            'idAkun'=>$user->id,
            'url'=>$_SERVER['HTTP_HOST'].'/'.getUrlSaatIni(),
            'subject'=>'Logout Admin'
        ];
        
        createdLog($dLog['level'],$dLog['idAkun'],$dLog['subject'],$dLog['url']);

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

    public function getDataTransaksi()
    {
        $currentYear = Carbon::now()->year;

        $data = TransaksiUsulan::whereYear('created_at', $currentYear)
            ->select(
                DB::raw("DATE_FORMAT(created_at, '%M') as month"),
                DB::raw("SUM(CASE WHEN status = 'proses' THEN 1 ELSE 0 END) as bantuan_proses"),
                DB::raw("SUM(CASE WHEN status = 'diterima' THEN 1 ELSE 0 END) as diterima"),
                DB::raw("SUM(CASE WHEN status = 'ditolak' THEN 1 ELSE 0 END) as ditolak")
            )
            ->groupBy('month')
            ->get();

        if (count($data) > 0) {
            return response()->json($data);
        } else {
            return response()->json([
                '0' => [
                    'month' => '0',
                    'bantuan_proses' => '0',
                ],
            ]);
        }
    }
}
