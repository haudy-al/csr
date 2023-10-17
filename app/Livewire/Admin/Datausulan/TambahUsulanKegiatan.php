<?php

namespace App\Livewire\Admin\Datausulan;

use App\Models\BidangModel;
use App\Models\KelurahanModel;
use App\Models\MemberModel;
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
    public $anggaran;
    public $bentuk_kegiatan;
    public $lokasi_kegiatan;
    public $kelurahan;
    public $userId;

    public function render()
    {
        $dataBidang = BidangModel::all();
        $dataKelurahan = KelurahanModel::all();
        $dataMember = MemberModel::all();

        return view('livewire.admin.datausulan.tambah-usulan-kegiatan',[
            'dataBidang'=>$dataBidang,
            'datakelurahan'=>$dataKelurahan,
            'dataMember'=>$dataMember,
        ]);
    }

    function TambahUsulanKegiatan()
    {
        $this->validate([
            'userId' => 'required',
            'nama_kegiatan' => 'required',
            'bidang' => 'required',
            'proposal' => 'required|mimes:pdf',
            'penerima_manfaat' => 'required',
            'waktu_pelaksanaan' => 'required',
            'anggaran' => 'required|numeric',
            'bentuk_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'kelurahan' => 'required',
        ], [
            'userId.required' => 'Member Wajib di Isi',
            'nama_kegiatan.required' => 'Nama Kegiatan Wajib di Isi',
            'bidang.required' => 'Bidang Wajib di Isi',
            'proposal.required' => 'Proposal Wajib di Isi',
            'penerima_manfaat.required' => 'Penerima Manfaat Wajib di Isi',
            'waktu_pelaksanaan.required' => 'Waktu Pelaksanaan Wajib di Isi',
            'anggaran.required' => 'Anggaran Wajib di Isi',
            'bentuk_kegiatan.required' => 'Deskripsi Wajib di Isi',
            'lokasi_kegiatan.required' => 'Lokasi Kegiatan Wajib di Isi',
            'kelurahan.required' => 'Kelurahan Wajib di Isi',
        ]);

        $namaPdf = 'usulan-kegiatan-' . uniqid() . date('ymdhis') . '.' . $this->proposal->getClientOriginalExtension();

        UsulanKegiatanModel::create([
            'nama_kegiatan' => $this->nama_kegiatan,
            'id_bidang' => $this->bidang,
            'proposal' => $namaPdf,
            'penerima_manfaat' => $this->penerima_manfaat,
            'waktu_pelaksanaan' => $this->waktu_pelaksanaan,
            'anggaran' => $this->anggaran,
            'bentuk_kegiatan' => $this->bentuk_kegiatan,
            'lokasi_kegiatan' => $this->lokasi_kegiatan,
            'id_kelurahan' => $this->kelurahan,
            'id_member' => $this->userId,
        ]);

        $this->proposal->storeAs('pdf/', $namaPdf);

        $this->clearInput();

        $this->dispatch('TambahBerhasil');
    }

    function clearInput()
    {
        $this->nama_kegiatan = "";
        $this->bidang = "";
        $this->proposal = "";
        $this->penerima_manfaat = "";
        $this->waktu_pelaksanaan = "";
        $this->anggaran = "";
        $this->bentuk_kegiatan = "";
        $this->lokasi_kegiatan = "";
        $this->kelurahan = "";
    }
}
