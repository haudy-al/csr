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

    public $idT;
    public $idKegiatan;
    public $nama_kegiatan;
    public $keterangan;
    public $dokumen;
    public $foto;
    public $jumlahPenerimaManfaat;
    public $kategori_manfaat;
    public $transaksi;

    public $total_sasaran;


    public function mount($idT)
    {
        $this->idT = $idT;
        $cek = UsulanKegiatanModel::join('transaksi_usulan', 'usulan_kegiatan.id', '=', 'transaksi_usulan.id_usulan_kegiatan')
            ->where('usulan_kegiatan.id', _get('usulan'))
            ->where('transaksi_usulan.id_member', getDataMember()->id)
            ->where('transaksi_usulan.id', $this->idT)
            ->first();
        if (!$cek) {
            return abort('404');
        }

        $this->kategori_manfaat = $cek->kategori_manfaat;
        $this->total_sasaran = $cek->jumlah_penerima_manfaat;

        $this->nama_kegiatan = $cek->nama_kegiatan;
        $this->idKegiatan = _get('usulan');

        $query = "SELECT transaksi_usulan.* 
                    FROM usulan_kegiatan 
                    JOIN transaksi_usulan ON usulan_kegiatan.id = transaksi_usulan.id_usulan_kegiatan 
                    WHERE usulan_kegiatan.id = :idUsulanKegiatan AND transaksi_usulan.status != 'ditolak'";

        $dataTransaksi = DB::select($query, ['idUsulanKegiatan' => $this->idKegiatan]);

        $this->jumlahPenerimaManfaat = $cek->jumlah_penerima_manfaat;

        foreach ($dataTransaksi as $item) {
            $this->jumlahPenerimaManfaat -= $item->target_sasaran;
        }

        $this->transaksi = $dataTransaksi;

        $cekLaporan = LaporanModel::where('id_usulan_kegiatan',$this->idKegiatan)->where('id_member',getDataMember()->id)->where('id_transaksi',$this->idT)->get()->first();

   
        if ($cekLaporan) {
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
            'dokumen' => 'required|mimes:pdf|max:2048',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,gif|max:2048',
        ]);
        
        $namaPdf = 'dokumen-laporan-' . uniqid() . date('ymdhis') . '.' . $this->dokumen->getClientOriginalExtension();
        $namaFoto = 'foto-laporan-' . uniqid() . date('ymdhis') . '.' . $this->foto->getClientOriginalExtension();

        LaporanModel::create([
            'id_member' => getDataMember()->id,
            'id_usulan_kegiatan' => $this->idKegiatan,
            'id_transaksi'=>$this->idT,
            'keterangan' => $this->keterangan,
            'dokumen' => $namaPdf,
            'foto' => $namaFoto,
        ]);

        $this->dokumen->storeAs('pdf/', $namaPdf);
        $this->foto->storeAs('public/img/', $namaFoto);

        $this->clearInput();

        $dLog = [
            'level'=>'user',
            'idAkun'=>getDataMember()->id,
            'url'=>$_SERVER['HTTP_HOST'].'/'.getUrlSaatIni(),
            'subject'=>'Tambah Laporan member'
        ];
        createdLog($dLog['level'],$dLog['idAkun'],$dLog['subject'],$dLog['url']);

        $this->dispatch('TambahBerhasil');
    }

    function clearInput()
    {
        $this->keterangan = "";
        $this->dokumen = "";
        $this->foto = "";
    }
}
