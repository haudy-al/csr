<?php

use App\Models\AdminModel;
use App\Models\BidangModel;
use App\Models\KategoriMemberModel;
use App\Models\KelurahanModel;
use App\Models\MemberModel;
use App\Models\TransaksiUsulan;
use App\Models\UsulanKegiatanModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

function isx(&$value, $default_value = "")
{
  $value = isset($value) ? $value : $default_value;
  $value = !$value ? $default_value : $value;
  return $value;
}
function _get($name)
{
  return isx($_GET[$name]);
}

function hallo()
{
  return "hallo";
}

function getKelurahan()
{
  $data = KelurahanModel::all();
  return $data;
}

function getKategoriPerusahaan()
{
  $data = KategoriMemberModel::all();
  return $data;
}

function getDataMember()
{
  $user = MemberModel::where('token', session('user_token'))->get()->first();
  if (!$user) {
    return null;
  } else {
    return $user;
  }
}

function cekUrlAdmin()
{
  $currentUrl = request()->url();

  if (Str::contains($currentUrl, '/admin') && Auth::guard('admin')->check()) {
    return true;
  } else {
    return false;
  }
}


function getDataTransaksiByid($id)
{
  $data = TransaksiUsulan::where('id_member', getDataMember()->id)->where('id_usulan_kegiatan', $id)->get()->first();
  if (!$data) {
    return null;
  } else {
    return $data;
  }
}

function getUrlSaatIni()
{
  return request()->getPathInfo();
}

function cekLevelUsulanByMemberId($id)
{
  $cek = MemberModel::find($id);
  if ($cek->level == 'pd') {
    return 'Perangkat Daerah ' . '(' . $cek->nama_perusahaan . ')';
  } elseif ($cek->level == 'cp') {
    return 'Perusahaan ' . '(' . $cek->nama_perusahaan . ')';
  } else {
    return '-';
  }
}

function getJumlahKegiatanByBidang($id)
{
  $data = UsulanKegiatanModel::where('id_bidang', $id)->count();

  return $data;
}

function getDataBidang($id) {
    $data = BidangModel::find($id);
    return $data;
}

function getDataUsulan($id) {
  $data = UsulanKegiatanModel::find($id);
  return $data;
}

