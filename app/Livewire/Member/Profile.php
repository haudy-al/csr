<?php

namespace App\Livewire\Member;

use App\Models\MemberModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{

    use WithFileUploads;

    public $id;
    public $nama_perusahaan;
    public $nama_kontak_person;
    public $no_telepon_person;
    public $no_telepon_perusahaan;
    public $kategori_perusahaan;
    public $alamat_perusahaan;
    public $latitude;
    public $longitude;

    public $gambar_perusahaan;
    public $gambar_perusahaan_lama;

    public $username;
    public $password;
    public $passwordSekarang;
    public $statusPassword = '';
    public $messagePassword = '';

    public $email_perusahaan;

    public $ubah = false;




    public function mount()
    {
        $member = MemberModel::where('id', getDataMember()->id)->get()->first();
        $this->id = $member->id;
        $this->username = $member->username;
        $this->email_perusahaan = $member->email_perusahaan;
        $this->nama_perusahaan = $member->nama_perusahaan;
        $this->nama_kontak_person = $member->nama_kontak_person;
        $this->no_telepon_person = $member->no_telepon_person;
        $this->no_telepon_perusahaan = $member->no_telepon_perusahaan;
        $this->alamat_perusahaan = $member->alamat_perusahaan;
        $this->latitude = $member->latitude;
        $this->longitude = $member->longitude;
        $this->gambar_perusahaan_lama = $member->gambar_perusahaan;
        $this->kategori_perusahaan = $member->id_kategori_perusahaan;
    }
    public function render()
    {

        if ($this->password) {
            $this->statusPassword = validatePassword($this->password)['status'];
            $this->messagePassword = validatePassword($this->password)['message'];
        }

        return view('livewire.member.profile');
    }

    function Batal()
    {
        $this->ubah = false;
    }

    function ubahPass()
    {
        $this->ubah = true;
    }

    function SimpanPassword()
    {
        $this->validate([
            'password' => 'required',
            'passwordSekarang'=>'required'
        ]);

        if (!Auth::guard('member')->attempt(['username' => getDataMember()->username, 'password' => $this->passwordSekarang])) {
            $this->dispatch('PasswordLemah',message: 'Password Saat ini Salah');
            return false;
        }

        if ($this->statusPassword != 'kuat') {
            $this->dispatch('PasswordLemah',message: $this->messagePassword);
            return false;
        }

        $expirePass = date('Y-m-d', strtotime('+1 year'));

        MemberModel::where('id', $this->id)->update([
            'password' => Hash::make($this->password),
            'password_expire'=>$expirePass,
        ]);

        $this->password = "";
        $this->ubah = false;

        $dLog = [
            'level'=>'user',
            'idAkun'=>getDataMember()->id,
            'url'=>$_SERVER['HTTP_HOST'].'/'.getUrlSaatIni(),
            'subject'=>'Reset Password member'
        ];
        createdLog($dLog['level'],$dLog['idAkun'],$dLog['subject'],$dLog['url']);

        $this->dispatch('UbahPasswordSuccess');
    }

    function SimpanProfile()
    {

        $namaGambar = $this->gambar_perusahaan_lama;
        if ($this->gambar_perusahaan) {
            $namaGambar = 'member-' . uniqid() . date('ymdhis') . '.' . $this->gambar_perusahaan->getClientOriginalExtension();

            if ($this->gambar_perusahaan_lama == null) {
                $this->gambar_perusahaan_lama = 'kosong.png';
            }
            if (file_exists(storage_path('app/public/img/' . $this->gambar_perusahaan_lama))) {
                unlink(storage_path('app/public/img/' . $this->gambar_perusahaan_lama));
            }

            $this->gambar_perusahaan->storeAs('public/img/', $namaGambar);
        }


        MemberModel::where('id', $this->id)->update([
            'nama_perusahaan' => $this->nama_perusahaan,
            'email_perusahaan' => $this->email_perusahaan,
            'nama_kontak_person' => $this->nama_kontak_person,
            'no_telepon_person' => $this->no_telepon_person,
            'no_telepon_perusahaan' => $this->no_telepon_perusahaan,
            'id_kategori_perusahaan' => $this->kategori_perusahaan,
            'alamat_perusahaan' => $this->alamat_perusahaan,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            // 'id_kelurahan' => $this->kelurahan,
            'gambar_perusahaan' => $namaGambar,

        ]);

        $dLog = [
            'level'=>'user',
            'idAkun'=>getDataMember()->id,
            'url'=>$_SERVER['HTTP_HOST'].'/'.getUrlSaatIni(),
            'subject'=>'Update Profile member'
        ];
        createdLog($dLog['level'],$dLog['idAkun'],$dLog['subject'],$dLog['url']);

        $this->dispatch('TambahBerhasil');
    }

    function clearGambar() {
        $this->gambar_perusahaan = "";
    }
}
