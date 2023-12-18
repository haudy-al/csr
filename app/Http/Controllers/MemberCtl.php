<?php

namespace App\Http\Controllers;

use App\Models\LaporanModel;
use App\Models\TransaksiUsulan;
use App\Models\UsulanKegiatanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberCtl extends Controller
{
    function index()
    {

        $currentYear = date('Y');
        $years = [$currentYear];
        for ($i = 1; $i <= 5; $i++) {
            $years[] = $currentYear - $i;
        }
        $usulanKegiatan = [];
        $dataLaporan = [];

        foreach ($years as $year) {
            $usulanCount = UsulanKegiatanModel::where('id_member', getDataMember()->id)->whereYear('created_at', $year)->count();
            $usulanKegiatan[$year] = $usulanCount;
        }

        foreach ($years as $year) {
            $laporanCount = LaporanModel::where('id_member', getDataMember()->id)->whereYear('created_at', $year)->count();
            $dataLaporan[$year] = $laporanCount;
        }

        return view('member.dashboard', [
            'usulanKegiatan' => $usulanKegiatan,
            'dataLaporan' => $dataLaporan
        ]);
    }

    public function getDataTransaksi()
    {
        $currentYear = Carbon::now()->year;

        $data = TransaksiUsulan::where('id_member', getDataMember()->id)->whereYear('created_at', $currentYear)
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

    function viewProfile()
    {
        return view('member.profile');
    }

    function viewRisetPassword()
    {
        return view('member.reset-password');
    }
}
