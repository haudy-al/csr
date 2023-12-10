<?php

namespace App\Livewire\Member\Cp;

use App\Models\BidangModel;
use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use App\Models\LaporanModel;
use App\Models\TransaksiUsulan;
use App\Models\UsulanKegiatanModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;


class TambahUsulan extends Component
{

    use WithFileUploads;

    public $noStap = 1;

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

    // laporan

    public $dokumen;
    public $foto;
    public $keterangan;

    public $type;

    public function mount($type)
    {
        $this->type = $type;
        $this->userId = getDataMember()->id;
    }

    public function render()
    {

        $bidang = BidangModel::all();
        $kecamatan = KecamatanModel::all();
        $kelurahan = KelurahanModel::where('id_kecamatan', $this->kecamatan)->get();

        if ($this->jesnis_kategori_manfaat == 'uang') {
            $this->kategori_manfaat = 'rupiah';
        } else {

            if (!$this->kategori_manfaat) {
                $this->jesnis_kategori_manfaat = 'barang';
                $this->kategori_manfaat = 'buah';
            }
        }

        if ($this->type == 'baru') {

            $view = 'livewire.member.cp.tambah-usulan-baru';
        } elseif ($this->type == 'sudah-berjalan') {

            $view = 'livewire.member.cp.tambah-usulan';
        } else {
            abort(404);
        }

        return view($view, [
            'dataBidang' => $bidang,
            'dataKecamatan' => $kecamatan,
            'datakelurahan' => $kelurahan,
        ]);
    }

    function StepSelanjutnya()
    {

        if ($this->noStap == 1) {
            $this->ValidateStap1();
        }

        $this->noStap++;
    }

    function StepSebelumnya()
    {
        $this->noStap--;
    }

    function ValidateStap1()
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
    }

    function ValidateStap2()
    {
        $this->validate([
            'dokumen' => 'required|mimes:pdf|max:2048',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,gif|max:2048',
        ]);
    }

    function TambahUsulanKegiatan()
    {

        $namaPdf = 'usulan-kegiatan-' . uniqid() . date('ymdhis') . '.' . $this->proposal->getClientOriginalExtension();

        $usulanKegiatan =  UsulanKegiatanModel::create([
            'nama_kegiatan' => $this->nama_kegiatan,
            'id_bidang' => $this->bidang,
            'proposal' => $namaPdf,
            'penerima_manfaat' => $this->penerima_manfaat,
            'waktu_pelaksanaan' => $this->waktu_pelaksanaan,
            'bentuk_kegiatan' => $this->bentuk_kegiatan,
            'lokasi_kegiatan' => $this->lokasi_kegiatan,
            'id_kelurahan' => $this->kelurahan,
            'id_member' => $this->userId,
            'jumlah_penerima_manfaat' => str_replace(',', '', $this->jumlah_penerima_manfaat),
            'kategori_manfaat' => $this->kategori_manfaat,
        ]);

        $this->proposal->storeAs('pdf/', $namaPdf);

        $dLog = [
            'level' => 'user',
            'idAkun' => getDataMember()->id,
            'url' => $_SERVER['HTTP_HOST'] . '/' . getUrlSaatIni(),
            'subject' => 'Tambah Usulan Kegiatan member'
        ];
        createdLog($dLog['level'], $dLog['idAkun'], $dLog['subject'], $dLog['url']);

        return $usulanKegiatan;
    }

    function BantuUsulan($targetSasaran, $idUsulan)
    {

        $transaksi =  TransaksiUsulan::create([
            'id_member' => getDataMember()->id,
            'id_usulan_kegiatan' => $idUsulan,
            'target_sasaran' => $targetSasaran,
            'status' => 'diterima'
        ]);

        $dLog = [
            'level' => 'user',
            'idAkun' => getDataMember()->id,
            'url' => $_SERVER['HTTP_HOST'] . '/' . getUrlSaatIni(),
            'subject' => 'Tambah Usulan Peminatan member'
        ];
        createdLog($dLog['level'], $dLog['idAkun'], $dLog['subject'], $dLog['url']);

        return $transaksi;
    }

    function TambahLaporan($idUsulanKegiatan, $idTransaksi)
    {

        $namaPdf = 'dokumen-laporan-' . uniqid() . date('ymdhis') . '.' . $this->dokumen->getClientOriginalExtension();
        $namaFoto = 'foto-laporan-' . uniqid() . date('ymdhis') . '.' . $this->foto->getClientOriginalExtension();

        $laporan = LaporanModel::create([
            'id_member' => getDataMember()->id,
            'id_usulan_kegiatan' => $idUsulanKegiatan,
            'id_transaksi' => $idTransaksi,
            'keterangan' => $this->keterangan,
            'dokumen' => $namaPdf,
            'foto' => $namaFoto,
        ]);

        $this->dokumen->storeAs('pdf/', $namaPdf);
        $this->foto->storeAs('public/img/', $namaFoto);


        $dLog = [
            'level' => 'user',
            'idAkun' => getDataMember()->id,
            'url' => $_SERVER['HTTP_HOST'] . '/' . getUrlSaatIni(),
            'subject' => 'Tambah Laporan member'
        ];
        createdLog($dLog['level'], $dLog['idAkun'], $dLog['subject'], $dLog['url']);

        return $laporan;
    }

    function Tambah()
    {
        $this->ValidateStap2();
        $usulan = $this->TambahUsulanKegiatan();
        $transaksi = $this->BantuUsulan($usulan->jumlah_penerima_manfaat, $usulan->id);
        $laporan = $this->TambahLaporan($usulan->id, $transaksi->id);

        return redirect('/member/data-usulan')->with(session()->flash('success', 'Tambah Berhasil'));
    }

    function TambahUsulanBaru()
    {
        
        $this->ValidateStap1();
        
        $namaPdf = 'usulan-kegiatan-' . uniqid() . date('ymdhis') . '.' . $this->proposal->getClientOriginalExtension();

        $usulanKegiatan =  UsulanKegiatanModel::create([
            'nama_kegiatan' => $this->nama_kegiatan,
            'id_bidang' => $this->bidang,
            'proposal' => $namaPdf,
            'penerima_manfaat' => $this->penerima_manfaat,
            'waktu_pelaksanaan' => $this->waktu_pelaksanaan,
            'bentuk_kegiatan' => $this->bentuk_kegiatan,
            'lokasi_kegiatan' => $this->lokasi_kegiatan,
            'id_kelurahan' => $this->kelurahan,
            'id_member' => $this->userId,
            'jumlah_penerima_manfaat' => str_replace(',', '', $this->jumlah_penerima_manfaat),
            'kategori_manfaat' => $this->kategori_manfaat,
        ]);

        $this->proposal->storeAs('pdf/', $namaPdf);

        $dLog = [
            'level' => 'user',
            'idAkun' => getDataMember()->id,
            'url' => $_SERVER['HTTP_HOST'] . '/' . getUrlSaatIni(),
            'subject' => 'Tambah Usulan Kegiatan member'
        ];
        createdLog($dLog['level'], $dLog['idAkun'], $dLog['subject'], $dLog['url']);


        $transaksi =  TransaksiUsulan::create([
            'id_member' => getDataMember()->id,
            'id_usulan_kegiatan' => $usulanKegiatan->id,
            'target_sasaran' => $usulanKegiatan->jumlah_penerima_manfaat,
            'status' => 'proses'
        ]);

        $dLog = [
            'level' => 'user',
            'idAkun' => getDataMember()->id,
            'url' => $_SERVER['HTTP_HOST'] . '/' . getUrlSaatIni(),
            'subject' => 'Tambah Usulan Peminatan member'
        ];
        createdLog($dLog['level'], $dLog['idAkun'], $dLog['subject'], $dLog['url']);

        return redirect('/member/data-usulan-peminatan')->with(session()->flash('success', 'Tambah Berhasil'));
    }
}
