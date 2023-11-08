<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiUsulan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_usulan';

    protected $guarded = [];

    public function member()
    {
        return $this->hasOne(MemberModel::class, 'id');
    }

    public function member2()
    {
        return $this->belongsTo(MemberModel::class, 'id_member');
    }

    public function usulanKegiatan()
    {
        return $this->belongsTo(UsulanKegiatanModel::class, 'id_usulan_kegiatan');
    }
}
