<?php

use App\Models\AdminModel;
use App\Models\KategoriMemberModel;
use App\Models\KelurahanModel;
use App\Models\MemberModel;
use App\Models\TransaksiUsulan;
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
