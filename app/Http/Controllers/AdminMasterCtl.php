<?php

namespace App\Http\Controllers;

use App\Models\BidangModel;
use App\Models\KategoriMemberModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use App\Models\MemberModel;
use App\Models\UsulanKegiatanModel;
use Illuminate\Http\Request;

class AdminMasterCtl extends Controller
{
    function viewKecamatan()
    {
        $data = KecamatanModel::orderBy('created_at', 'DESC')->get();
        return view('admin.master.kecamatan.index', [
            'data' => $data
        ]);
    }

    function viewKecamatanTambah()
    {
        return view('admin.master.kecamatan.tambah');
    }

    function ProsesHapuskecamatan($id)
    {

        $kelurahan = KelurahanModel::where('id_kecamatan', $id)->get();

        foreach ($kelurahan as $item) {
            $item->delete();
        }

        $data = KecamatanModel::find($id);

        $data->delete();

        return redirect()->back()->with(session()->flash('error', 'Delete Berhasil'));
    }
    function viewKecamatanEdit()
    {
        if (!$dataGet = _get('i')) {
            return redirect('/admin/master/kecamatan')->with(session()->flash('error', 'Terjadi Kesalahan'));
        }
        return view('admin.master.kecamatan.edit');
    }


    function viewKelurahan()
    {
        $data = kelurahanModel::orderBy('created_at', 'DESC')->get();
        return view('admin.master.kelurahan.index', [
            'data' => $data
        ]);
    }

    function viewKelurahanTambah()
    {
        return view('admin.master.kelurahan.tambah');
    }

    function ProsesHapusKelurahan($id)
    {
        $data = KelurahanModel::find($id);

        $data->delete();

        return redirect()->back()->with(session()->flash('error', 'Delete Berhasil'));
    }
    function viewKelurahanEdit()
    {
        if (!$dataGet = _get('i')) {
            return redirect('/admin/master/kelurahan')->with(session()->flash('error', 'Terjadi Kesalahan'));
        }
        return view('admin.master.kelurahan.edit');
    }


    function viewKategoriMember()
    {
        $data = KategoriMemberModel::orderBy('created_at', 'DESC')->get();
        return view('admin.master.kategori_member.index', [
            'data' => $data
        ]);
    }

    function viewKategoriMemberTambah()
    {
        return view('admin.master.kategori_member.tambah');
    }

    function ProsesHapusKategotiMember($id)
    {
        $data = KategoriMemberModel::find($id);

        $data->delete();

        return redirect()->back()->with(session()->flash('error', 'Delete Berhasil'));
    }
    function viewKategoriMemberEdit()
    {
        if (!$dataGet = _get('i')) {
            return redirect('/admin/master/kelurahan')->with(session()->flash('error', 'Terjadi Kesalahan'));
        }
        return view('admin.master.kategori_member.edit');
    }




    function viewBidang()
    {
        $data = BidangModel::orderBy('created_at', 'DESC')->get();
        return view('admin.master.bidang.index', [
            'data' => $data
        ]);
    }

    function viewBidangTambah()
    {
        return view('admin.master.bidang.tambah');
    }

    function ProsesHapusBidang($id)
    {
        $data = BidangModel::find($id);

        $usulanKegiatan = UsulanKegiatanModel::where('id_bidang', $id)->get();

        foreach ($usulanKegiatan as $item) {
            $path = storage_path('app/pdf/' . $item->proposal);

            if (file_exists($path)) {
                unlink($path);
            }

            $item->delete();
        }

        $data->delete();

        return redirect()->back()->with(session()->flash('error', 'Delete Berhasil'));
    }
    function viewBidangEdit()
    {
        if (!$dataGet = _get('i')) {
            return redirect('/admin/master/kelurahan')->with(session()->flash('error', 'Terjadi Kesalahan'));
        }
        return view('admin.master.bidang.edit');
    }
















    function viewMember()
    {
        $data = MemberModel::orderBy('created_at', 'DESC')->get();
        return view('admin.master.member.index', [
            'data' => $data
        ]);
    }

    function viewMemberTambah()
    {
        return view('admin.master.member.tambah');
    }

    function ProsesHapusMember($id)
    {

        $data = MemberModel::find($id);

        if ($data->gambar_perusahaan == null) {
            $data->gambar_perusahaan = 'kosong.png';
        }

        if (file_exists(storage_path('app/public/img/' . $data->gambar_perusahaan))) {
            unlink(storage_path('app/public/img/' . $data->gambar_perusahaan));
        }

        $data->delete();

        return redirect()->back()->with(session()->flash('error', 'Delete Berhasil'));
    }
    // function viewMemberEdit()
    // {
    //     if (!$dataGet = _get('i')) {
    //         return redirect('/admin/master/member')->with(session()->flash('error', 'Terjadi Kesalahan'));
    //     }
    //     return view('admin.master.member.edit');
    // }
}
