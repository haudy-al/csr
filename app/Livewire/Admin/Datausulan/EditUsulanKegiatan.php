<?php

namespace App\Livewire\Admin\Datausulan;

use App\Models\BidangModel;
use App\Models\KelurahanModel;
use App\Models\UsulanKegiatanModel;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditUsulanKegiatan extends Component
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
    public $id;
    public $proposalLama;


    public function mount()
    {
        $kegiatan = UsulanKegiatanModel::find(_get('i'));

        $this->id = $kegiatan->id;
        $this->nama_kegiatan = $kegiatan->nama_kegiatan;
        $this->bidang = $kegiatan->id_bidang;

        $this->penerima_manfaat = $kegiatan->penerima_manfaat;
        $this->waktu_pelaksanaan = $kegiatan->waktu_pelaksanaan;
        $this->anggaran = $kegiatan->anggaran;
        $this->bentuk_kegiatan = $kegiatan->bentuk_kegiatan;
        $this->lokasi_kegiatan = $kegiatan->lokasi_kegiatan;
        $this->kelurahan = $kegiatan->id_kelurahan;
        $this->proposalLama = $kegiatan->proposal;

    }
    public function render()
    {

        $bidang = BidangModel::all();
        $kelurahan = KelurahanModel::all();
        return view('livewire.admin.datausulan.edit-usulan-kegiatan', [
            'dataBidang' => $bidang,
            'datakelurahan' => $kelurahan,
        ]);
    }

    function SimpanUsulan()
    {
        $cek = UsulanKegiatanModel::find($this->id);

        $this->validate([
            'nama_kegiatan' => 'required',
            'bidang' => 'required',
            'proposal' => '',
            'penerima_manfaat' => 'required',
            'waktu_pelaksanaan' => 'required',
            'anggaran' => 'required|numeric',
            'bentuk_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'kelurahan' => 'required',
        ], [
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

       

        $cek->nama_kegiatan = $this->nama_kegiatan;
        $cek->id_bidang = $this->bidang;
        $cek->penerima_manfaat = $this->penerima_manfaat;
        $cek->waktu_pelaksanaan = $this->waktu_pelaksanaan;
        $cek->anggaran = $this->anggaran;
        $cek->bentuk_kegiatan = $this->bentuk_kegiatan;
        $cek->lokasi_kegiatan = $this->lokasi_kegiatan;
        $cek->id_kelurahan = $this->kelurahan;



        if ($this->proposal) {
            $namaproposal = 'usulan-kegiatan-' . uniqid() . date('ymdhis') . '.' . $this->proposal->getClientOriginalExtension();
            if ($cek->proposal == null) {
                $cek->proposal = 'kosong.png';
            }
            if (file_exists(storage_path('app/pdf/' . $cek->proposal))) {
                unlink(storage_path('app/pdf/' . $cek->proposal));
            }

            $cek->proposal = $namaproposal;


            $this->proposal->storeAs('pdf/', $namaproposal);

            $awalan_nama = $cek->id; 
            $direktori = storage_path('app/public/pdf-image'); 

            $files = scandir($direktori);

            foreach ($files as $file) {
                if (strpos($file, $awalan_nama) === 0 && pathinfo($file, PATHINFO_EXTENSION) === 'png') {
                    Storage::delete('app/public/pdf-image/' . $file); 
                    unlink($direktori . '/' . $file);
                   
                }
            }
        }

        $cek->save();

        $this->dispatch('TambahBerhasil');
    }
}
