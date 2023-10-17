<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanModel extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $guarded = [];

    public function usulanKegiatan()
    {
        return $this->belongsTo(UsulanKegiatanModel::class, 'id_usulan_kegiatan');
    }

    public function usulan()
    {
        return $this->hasOne(UsulanKegiatanModel::class, 'id', 'id_usulan_kegiatan');
    }
}
