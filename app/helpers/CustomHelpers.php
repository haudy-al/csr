<?php

use App\Models\AdminModel;
use App\Models\BidangModel;
use App\Models\KategoriMemberModel;
use App\Models\KelurahanModel;
use App\Models\LaporanModel;
use App\Models\LogActivities;
use App\Models\MemberModel;
use App\Models\TransaksiUsulan;
use App\Models\UsulanKegiatanModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
  $token = session('user_token');
  if ($token == null) {
    return null;
  }
  $user = MemberModel::where('token', $token)->get()->first();
  if (!$user) {
    return null;
  } else {
    return $user;
  }
}

function getDataMemberById($id)
{
  $user = MemberModel::find($id);

  return $user;
}

function getDataAdminById($id)
{
  $user = AdminModel::find($id);

  return $user;
}

function getDataAdmin()
{
  $token = session('token');
  if ($token == null) {
    return null;
  }
  $admin = AdminModel::where('token', $token)->get()->first();
  if (!$admin) {
    return null;
  } else {
    return $admin;
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

function getTransaksiTersedia($id_kegiatan)
{
  $query = "SELECT transaksi_usulan.* 
                    FROM usulan_kegiatan 
                    JOIN transaksi_usulan ON usulan_kegiatan.id = transaksi_usulan.id_usulan_kegiatan 
                    WHERE usulan_kegiatan.id = :idUsulanKegiatan AND transaksi_usulan.status = 'diterima'";


  $dataLaporan = DB::select($query, ['idUsulanKegiatan' => $id_kegiatan]);


  $targetSasaran = getTargetSasaran($id_kegiatan)->jumlah_penerima_manfaat;

  foreach ($dataLaporan as $item) {
    $targetSasaran -= $item->target_sasaran;
  }

  return $targetSasaran;
}

function getTargetSasaran($id)
{
  $data = UsulanKegiatanModel::find($id);
  if (!$data) {
    return null;
  } else {
    return $data;
  }
}

function getTaransaksi($id_kegiatan)
{
  $data = TransaksiUsulan::where('id_usulan_kegiatan', $id_kegiatan)->where('id_member', getDataMember()->id)->get()->first();
  if (!$data) {
    return null;
  } else {
    return $data;
  }
}

function getTaransaksiAdmin($id)
{
  $data = TransaksiUsulan::find($id);
  if (!$data) {
    return null;
  } else {
    return $data;
  }
}

function getJmlTransaksiProsesByMember()
{
  $data = TransaksiUsulan::where('id_member', getDataMember()->id)->where('status', 'proses')->count();

  return $data;
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

function getDataBidang($id)
{
  $data = BidangModel::find($id);
  return $data;
}

function getDataUsulan($id)
{
  $data = UsulanKegiatanModel::find($id);
  return $data;
}

function cekGambarMember($namaFile)
{
  if (file_exists(storage_path('app/public/img/' . $namaFile))) {
    return asset('storage/img/' . $namaFile);
  } else {
    return asset('storage/img/none.png');
  }
}

function cekGambarDokumenPage1($id)
{
  $namaFile = 'dokumen-img_' . $id . '_page_001.png';
  if (file_exists(storage_path('app/public/pdf-image/' . $namaFile))) {
    return asset('storage/pdf-image/' . $namaFile);
  } else {
    return asset('storage/img/none.png');
  }
}

function getJumlahTransaksiTerkumpul($id)
{
  $query = "SELECT transaksi_usulan.* 
                    FROM usulan_kegiatan 
                    JOIN transaksi_usulan ON usulan_kegiatan.id = transaksi_usulan.id_usulan_kegiatan 
                    WHERE usulan_kegiatan.id = :idUsulanKegiatan AND transaksi_usulan.status = 'diterima'";

  $dataTransaksi = DB::select($query, ['idUsulanKegiatan' => $id]);

  $targetSasaran = 0;

  foreach ($dataTransaksi as $item) {
    $targetSasaran += $item->target_sasaran;
  }

  return $targetSasaran;
}


function getJumlahProyekTerkumpul($id)
{
  $query = "SELECT transaksi_usulan.* 
                    FROM usulan_kegiatan 
                    JOIN transaksi_usulan ON usulan_kegiatan.id = transaksi_usulan.id_usulan_kegiatan 
                    WHERE usulan_kegiatan.id = :idUsulanKegiatan AND transaksi_usulan.status = 'diterima'";

  $dataTransaksi = DB::select($query, ['idUsulanKegiatan' => $id]);


  $sasaran = 0;

  foreach ($dataTransaksi as $item) {
    $sasaran += $item->target_sasaran;
  }

  return [
    'sasaran' => $sasaran,
  ];
}

function hitungPersentase($angka, $total)
{
  if ($total != 0) {
    $persentase = ($angka / $total) * 100;
    return number_format($persentase, 0);
  } else {
    return 0;
  }
}


function validatePassword($password)
{
  $minLength = 8;
  $status = 'kuat';
  $message = "Password kuat!";

  if (strlen($password) < $minLength) {
    $status = 'lemah';
    $message = "Password terlalu pendek. Minimal $minLength karakter.";
  } else {
    if (!preg_match('/[A-Z]/', $password)) {
      $status = 'lemah';
      $message = "Password harus mengandung minimal satu huruf besar.";
    }

    if (!preg_match('/[a-z]/', $password)) {
      $status = 'lemah';
      $message = "Password harus mengandung minimal satu huruf kecil.";
    }

    if (!preg_match('/[0-9]/', $password)) {
      $status = 'sedang';
      $message = "Password harus mengandung minimal satu angka.";
    }

    if (!preg_match('/[!@#$%^&*()\-_=+{};:,<.>ยง~]/', $password)) {
      $status = 'sedang';
      $message = "Password harus mengandung minimal satu karakter khusus.";
    }
  }

  return [
    'status' => $status,
    'message' => $message
  ];
}

function cekLaporan($id)
{
  $data = LaporanModel::where('id_transaksi', $id)->get()->first();

  if ($data) {
    return $data;
  } else {
    return null;
  }
}

function createdLog($level,$idakun,$subject, $url)
{
  LogActivities::create([
    'level'=>$level,
    'id_akun' => $idakun,
    'url' => $url,
    'subject' => $subject,
    'ip' => $_SERVER['REMOTE_ADDR'],
    'agent' => $_SERVER['HTTP_USER_AGENT']
  ]);
}
