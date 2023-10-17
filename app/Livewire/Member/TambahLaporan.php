<?php

namespace App\Livewire\Member;

use App\Models\LaporanModel;
use App\Models\UsulanKegiatanModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class TambahLaporan extends Component
{
    use WithFileUploads;

    public $idKegiatan;
    public $nama_kegiatan;
    public $keterangan;
    public $anggaran;
    public $dokumen;
    public $foto;


    public function mount()
    {
        $cek = UsulanKegiatanModel::join('transaksi_usulan', 'usulan_kegiatan.id', '=', 'transaksi_usulan.id_usulan_kegiatan')
            ->where('usulan_kegiatan.id', _get('usulan'))
            ->where('transaksi_usulan.id_member', getDataMember()->id)
            ->first();
        if (!$cek) {
            return abort('404');
        }

        $this->nama_kegiatan = $cek->nama_kegiatan;
        $this->idKegiatan = _get('usulan');
        
    }

    public function render()
    {
        return view('livewire.member.tambah-laporan');
    }

    function TambahLaporan() {
        $this->validate([
            'dokumen' => 'required|mimes:pdf',
            'keterangan' => 'required',
            'anggaran' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,gif',
        ]);

        $namaPdf = 'dokumen-laporan-' . uniqid() . date('ymdhis') . '.' . $this->dokumen->getClientOriginalExtension();
        $namaFoto = 'foto-laporan-' . uniqid() . date('ymdhis') . '.' . $this->foto->getClientOriginalExtension();

        LaporanModel::create([
            'id_member'=>getDataMember()->id,
            'id_usulan_kegiatan'=>$this->idKegiatan,
            'anggaran'=>$this->anggaran,
            'keterangan'=>$this->keterangan,
            'dokumen'=>$namaPdf,
            'foto'=>$namaFoto,
        ]);

        $this->dokumen->storeAs('pdf/', $namaPdf);
        $this->foto->storeAs('public/img/', $namaFoto);

        $this->dispatch('TambahBerhasil');
    }
}
