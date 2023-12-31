<?php

namespace App\Livewire;

use App\Mail\RegistrasiAkun;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use App\Models\MemberModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterPerusahaan extends Component
{

    use WithFileUploads;
   

    public $nama_perusahaan;
    public $email_perusahaan;
    public $nama_kontak_person;
    public $no_telepon_person;
    public $no_telepon_perusahaan;
    public $kategori_perusahaan;
    public $alamat_perusahaan;
    public $latitude = '0';
    public $longitude = '0';
    public $kecamatan;
    public $kelurahan;
    public $gambar_perusahaan;

    public $username;
    public $password;

    public $terms;


    public function render()
    {
        $dataKecamatan = KecamatanModel::all();
        $dataKelurahan = KelurahanModel::where('id_kecamatan',$this->kecamatan)->get();
       
        return view('livewire.register-perusahaan',[
            'dataKecamatan'=>$dataKecamatan,
            'dataKelurahan'=>$dataKelurahan,
        ]);
    }

    function RegisterAkun()
    {

        $this->validate([
            'nama_perusahaan' => 'required',
            'email_perusahaan' => 'required|email|unique:member',
            'nama_kontak_person' => 'required',
            'no_telepon_person' => 'required',
            'no_telepon_perusahaan' => 'required',
            'kategori_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'latitude' => '',
            'longitude' => '',
            'kecamatan' => 'required',

            'kelurahan' => 'required',
            'gambar_perusahaan' => 'required',
            'terms' => 'required',
        ],[
            'terms.required'=>'Wajib'
        ]);

        

        $namaGambar = 'member-' . uniqid() . date('ymdhis') . '.' . $this->gambar_perusahaan->getClientOriginalExtension();
        $this->password = str_pad(rand(0, 9999999999), 5, '0', STR_PAD_LEFT);
        $this->generateRandomUsername();

        MemberModel::create([
            'nama_perusahaan' => $this->nama_perusahaan,
            'email_perusahaan' => $this->email_perusahaan,
            'nama_kontak_person' => $this->nama_kontak_person,
            'no_telepon_person' => $this->no_telepon_person,
            'no_telepon_perusahaan' => $this->no_telepon_perusahaan,
            'id_kategori_perusahaan' => $this->kategori_perusahaan,
            'alamat_perusahaan' => $this->alamat_perusahaan,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'id_kelurahan' => $this->kelurahan,
            'gambar_perusahaan' => $namaGambar,
            'username' => $this->username,
            'password' => Hash::make($this->password),
        ]);

        $this->gambar_perusahaan->storeAs('public/img/', $namaGambar);

        $dataMail = [
            'username' => $this->username,
            'password' => $this->password

        ];

        Mail::to($this->email_perusahaan)->send(new RegistrasiAkun($dataMail));

        $this->dispatch('TambahBerhasil');
    }

   
    function clearGambar() {

        $this->gambar_perusahaan = null;
    }

    function generateRandomUsername($length = 5) {
        $characters = '0123456789';
        $username = '';
        $nama = str_replace(' ','_',$this->nama_perusahaan);
        
        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $username = $nama.'-'.$characters[$index];
        }
        
        $this->username = $username;
    }
    
   
    
}
