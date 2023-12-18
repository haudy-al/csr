<?php

namespace App\Livewire\Member;

use App\Models\BidangModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use App\Models\UsulanKegiatanModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class TambahUsulanKegiatan extends Component
{
    use WithFileUploads;

    public $nama_kegiatan;
    public $bidang;
    public $proposal;
    public $penerima_manfaat;
    public $waktu_pelaksanaan;
    public $bentuk_kegiatan;
    public $lokasi_kegiatan;
    public $kecamatan;
    public $kelurahan;
    public $userId;
    public $jumlah_penerima_manfaat;
    public $jesnis_kategori_manfaat;
    public $kategori_manfaat;

    public function mount()
    {

        $this->userId = getDataMember()->id;
    }

    public function render()
    {
        $bidang = BidangModel::all();
        $kecamatan = KecamatanModel::all();
        $kelurahan = KelurahanModel::where('id_kecamatan', $this->kecamatan)->get();

        if ($this->jesnis_kategori_manfaat == 'uang') {
            $this->kategori_manfaat = 'rupiah';
        }else{

            if (!$this->kategori_manfaat) {
                $this->jesnis_kategori_manfaat = 'barang';
                $this->kategori_manfaat = 'buah';
            }

        }

        return view('livewire.member.tambah-usulan-kegiatan', [
            'dataBidang' => $bidang,
            'dataKecamatan' => $kecamatan,
            'datakelurahan' => $kelurahan,
        ]);
    }

    function TambahUsulanKegiatan()
    {
        $this->validate([
            'nama_kegiatan' => 'required',
            'bidang' => 'required',
            'proposal' => 'required|mimes:pdf|max:2048',
            'penerima_manfaat' => 'required',
            'waktu_pelaksanaan' => 'required',
            'bentuk_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'jumlah_penerima_manfaat' => 'required',
            'kategori_manfaat' => 'required',


        ], [
            'nama_kegiatan.required' => 'Nama Kegiatan Wajib di Isi',
            'bidang.required' => 'Bidang Wajib di Isi',
            'proposal.required' => 'Proposal Wajib di Isi',
            'penerima_manfaat.required' => 'Penerima Manfaat Wajib di Isi',
            'waktu_pelaksanaan.required' => 'Waktu Pelaksanaan Wajib di Isi',
            'bentuk_kegiatan.required' => 'Deskripsi Wajib di Isi',
            'lokasi_kegiatan.required' => 'Lokasi Kegiatan Wajib di Isi',
            'kecamatan.required' => 'Kecamatan Wajib di Isi',
            'kelurahan.required' => 'Kelurahan Wajib di Isi',
            'jumlah_penerima_manfaat.required' => 'Jumlah Penerima Wajib di Isi',
            'kategori_manfaat.required' => 'Bentuk Bantuan Wajib di Isi',
        ]);

        $namaPdf = 'usulan-kegiatan-' . uniqid() . date('ymdhis') . '.' . $this->proposal->getClientOriginalExtension();

        UsulanKegiatanModel::create([
            'nama_kegiatan' => $this->nama_kegiatan,
            'id_bidang' => $this->bidang,
            'proposal' => $namaPdf,
            'penerima_manfaat' => $this->penerima_manfaat,
            'waktu_pelaksanaan' => $this->waktu_pelaksanaan,
            'bentuk_kegiatan' => $this->bentuk_kegiatan,
            'lokasi_kegiatan' => $this->lokasi_kegiatan,
            'id_kelurahan' => $this->kelurahan,
            'id_member' => $this->userId,
            'jumlah_penerima_manfaat' => str_replace(',','',$this->jumlah_penerima_manfaat),
            'kategori_manfaat' => $this->kategori_manfaat,
        ]);

        $this->proposal->storeAs('pdf/', $namaPdf);

        $this->clearInput();

        $dLog = [
            'level' => 'user',
            'idAkun' => getDataMember()->id,
            'url' => $_SERVER['HTTP_HOST'] . '/' . getUrlSaatIni(),
            'subject' => 'Tambah Usulan Kegiatan member'
        ];
        createdLog($dLog['level'], $dLog['idAkun'], $dLog['subject'], $dLog['url']);

        $this->dispatch('TambahBerhasil');
    }

    function clearInput()
    {
        $this->nama_kegiatan = "";
        $this->bidang = "";
        $this->proposal = "";
        $this->penerima_manfaat = "";
        $this->waktu_pelaksanaan = "";
        $this->bentuk_kegiatan = "";
        $this->lokasi_kegiatan = "";
        $this->kelurahan = "";
        $this->jumlah_penerima_manfaat = "";
    }
}
