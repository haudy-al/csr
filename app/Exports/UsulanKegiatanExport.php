<?php

namespace App\Exports;

use App\Models\UsulanKegiatanModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsulanKegiatanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
{
    $dataUsulan = UsulanKegiatanModel::all();

    $exportData = collect([
        [
            'Tanggal dan Waktu',
            'Perangkat Daerah/Perusahaan',
            'Nama Kegiatan',
            'Lokasi',
            'Nilai',
        ],
    ]);

    foreach ($dataUsulan as $data) {
        $exportData->push([
            'Tanggal dan Waktu' => $data->created_at->format('Y-m-d H:i:s'),
            'Perangkat Daerah/Perusahaan' => optional($data->member)->nama_perusahaan,
            'Nama Kegiatan' => $data->nama_kegiatan,
            'Lokasi' => $data->lokasi_kegiatan,
            'Nilai' => $data->kategori_manfaat.' : '. $data->jumlah_penerima_manfaat,
        ]);
    }

    return $exportData;
}


}
