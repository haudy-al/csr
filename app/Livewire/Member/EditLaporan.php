<?php

namespace App\Livewire\Member;

use App\Models\LaporanModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditLaporan extends Component
{
    public $id;
    public $idKegiatan;
    public $nama_kegiatan;
    public $keterangan;
    public $anggaran;
    public $dokumen;
    public $foto;
    public $target_sasaran;
    public $batasAnggaran;
    public $jumlahPenerimaManfaat;

    function mount()
    {
        $cek = LaporanModel::where('id', _get('i'))->where('id_member', getDataMember()->id)->first();
        if (!$cek) {
            return abort('404');
        }

        $this->id = $cek->id;
        $this->idKegiatan = $cek->id_usulan_kegiatan;
        $this->nama_kegiatan = $cek->usulan->nama_kegiatan ?? 'Kegiatan Dihapus';
        $this->keterangan = $cek->keterangan;
        $this->anggaran = $cek->anggaran;
        $this->target_sasaran = $cek->target_sasaran;

        $query = "SELECT laporan.* 
        FROM usulan_kegiatan 
        JOIN laporan ON usulan_kegiatan.id = laporan.id_usulan_kegiatan 
        WHERE usulan_kegiatan.id = :idUsulanKegiatan";

        $dataLaporan = DB::select($query, ['idUsulanKegiatan' => $this->idKegiatan]);

        $this->batasAnggaran = $cek->usulan->anggaran;
        $this->jumlahPenerimaManfaat = $cek->usulan->jumlah_penerima_manfaat;

        foreach ($dataLaporan as $item) {
            $this->batasAnggaran -= $item->anggaran;
            $this->jumlahPenerimaManfaat -= $item->target_sasaran;
        }
    }

    public function render()
    {
        return view('livewire.member.edit-laporan');
    }

    public function SimpanLaporan()
    {
        $cek = LaporanModel::find($this->id);

        $this->validate([
            'keterangan' => 'required',
            'anggaran' => 'required',
            'target_sasaran' => 'required',
        ]);

        $status1 = false;
        $status2 = false;
        $Banggaran = $cek->anggaran + $this->batasAnggaran;
        $Btarget = $cek->target_sasaran + $this->jumlahPenerimaManfaat;

        if ($this->anggaran > $Banggaran) {
            $message = 'Anggaran Melebihi Batas ' . $Banggaran;
            $this->dispatch('jumlahLebihBesar', $message);
            $status1 = true;
        }

        if ($this->target_sasaran > $Btarget) {
            $message = 'Melebihi Jumlah Penerima Manfaat ' . $Btarget;
            $this->dispatch('jumlahLebihBesar', $message);
            $status2 = true;
        }

        if ($status1 || $status2) {
            return false;
        }

        $cek->keterangan = $this->keterangan;
        $cek->anggaran = $this->anggaran;
        $cek->target_sasaran = $this->target_sasaran;

        if ($this->dokumen) {
            $namadokumen = 'dokumen-laporan-' . uniqid() . date('ymdhis') . '.' . $this->dokumen->getClientOriginalExtension();
            if ($cek->dokumen == null) {
                $cek->dokumen = 'kosong.png';
            }
            if (file_exists(storage_path('app/pdf/' . $cek->dokumen))) {
                unlink(storage_path('app/pdf/' . $cek->dokumen));
            }

            $cek->dokumen = $namadokumen;

            $this->dokumen->storeAs('pdf/', $namadokumen);
        }

        if ($this->foto) {
            $namafoto = 'foto-laporan-' . uniqid() . date('ymdhis') . '.' . $this->foto->getClientOriginalExtension();
            if ($cek->foto == null) {
                $cek->foto = 'kosong.png';
            }
            if (file_exists(storage_path('app/pdf/' . $cek->foto))) {
                unlink(storage_path('app/pdf/' . $cek->foto));
            }

            $cek->foto = $namafoto;

            $this->foto->storeAs('public/img/', $namafoto);
        }

        $cek->save();

        $this->dispatch('TambahBerhasil');
    }
}
