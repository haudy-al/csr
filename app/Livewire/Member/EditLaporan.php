<?php

namespace App\Livewire\Member;

use App\Models\LaporanModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditLaporan extends Component
{
    public $id;
    public $idKegiatan;
    public $nama_kegiatan;
    public $keterangan;
    public $dokumen;
    public $foto;

    use WithFileUploads;


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
        ]);

        $cek->keterangan = $this->keterangan;

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

        $dLog = [
            'level'=>'user',
            'idAkun'=>getDataMember()->id,
            'url'=>$_SERVER['HTTP_HOST'].'/'.getUrlSaatIni(),
            'subject'=>'Edit Laporan member'
        ];
        createdLog($dLog['level'],$dLog['idAkun'],$dLog['subject'],$dLog['url']);

        $this->dispatch('TambahBerhasil');
    }
}
