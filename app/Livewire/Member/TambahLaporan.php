<?php

namespace App\Livewire\Member;

use App\Models\LaporanModel;
use App\Models\UsulanKegiatanModel;
use Illuminate\Support\Facades\DB;
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
    public $target_sasaran;
    public $batasAnggaran;
    public $jumlahPenerimaManfaat;
    public $kategori_manfaat;


    public function mount()
    {
        $cek = UsulanKegiatanModel::join('transaksi_usulan', 'usulan_kegiatan.id', '=', 'transaksi_usulan.id_usulan_kegiatan')
            ->where('usulan_kegiatan.id', _get('usulan'))
            ->where('transaksi_usulan.id_member', getDataMember()->id)
            ->first();
        if (!$cek) {
            return abort('404');
        }

        $this->kategori_manfaat = $cek->kategori_manfaat;

        $this->nama_kegiatan = $cek->nama_kegiatan;
        $this->idKegiatan = _get('usulan');

        $query = "SELECT laporan.* 
          FROM usulan_kegiatan 
          JOIN laporan ON usulan_kegiatan.id = laporan.id_usulan_kegiatan 
          WHERE usulan_kegiatan.id = :idUsulanKegiatan";

        $dataLaporan = DB::select($query, ['idUsulanKegiatan' => $this->idKegiatan]);

        $this->batasAnggaran = $cek->anggaran;
        $this->jumlahPenerimaManfaat = $cek->jumlah_penerima_manfaat;

        foreach ($dataLaporan as $item) {
            $this->batasAnggaran -= $item->anggaran;
            $this->jumlahPenerimaManfaat -= $item->target_sasaran;
        }

        $cekLaporan = LaporanModel::where('id_usulan_kegiatan',$this->idKegiatan)->where('id_member',getDataMember()->id)->get();

   
        if (count($cekLaporan) > 0) {
            return redirect('/member/laporan')->with(session()->flash('error','Laporan '. $this->nama_kegiatan.' Sudah Ada'));
        }
    }

    public function render()
    {
        return view('livewire.member.tambah-laporan');
    }

    function TambahLaporan()
    {
        $this->validate([
            'dokumen' => 'required|mimes:pdf',
            'keterangan' => 'required',
            'anggaran' => 'required',
            'target_sasaran' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,gif',
        ]);
        $status1 = false;
        $status2 = false;

        if ($this->anggaran > $this->batasAnggaran) {
            $message = 'Anggaran Melebihi Batas ' . $this->batasAnggaran;
            $this->dispatch('jumlahLebihBesar', $message);
            $status1 = true;
        }

        if ($this->target_sasaran > $this->jumlahPenerimaManfaat) {
            $message = 'Melebihi Jumlah Penerima Manfaat ' . $this->jumlahPenerimaManfaat;
            $this->dispatch('jumlahLebihBesar', $message);
            $status2 = true;
        }

        if ($status1 || $status2) {
            return false;
        }


        $namaPdf = 'dokumen-laporan-' . uniqid() . date('ymdhis') . '.' . $this->dokumen->getClientOriginalExtension();
        $namaFoto = 'foto-laporan-' . uniqid() . date('ymdhis') . '.' . $this->foto->getClientOriginalExtension();

        LaporanModel::create([
            'id_member' => getDataMember()->id,
            'id_usulan_kegiatan' => $this->idKegiatan,
            'anggaran' => $this->anggaran,
            'keterangan' => $this->keterangan,
            'target_sasaran' => $this->target_sasaran,
            'dokumen' => $namaPdf,
            'foto' => $namaFoto,
        ]);

        $this->dokumen->storeAs('pdf/', $namaPdf);
        $this->foto->storeAs('public/img/', $namaFoto);

        $this->clearInput();

        $this->dispatch('TambahBerhasil');
    }

    function clearInput()
    {
        $this->nama_kegiatan = "";
        $this->keterangan = "";
        $this->anggaran = "";
        $this->dokumen = "";
        $this->target_sasaran = "";
        $this->foto = "";
    }
}
