<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsulanKegiatanModel extends Model
{
    use HasFactory;

    protected $table = 'usulan_kegiatan';

    protected $guarded = [];

    public function bidang()
    {
        return $this->hasOne(BidangModel::class, 'id', 'id_bidang');
    }

    public function kelurahan()
    {
        return $this->hasOne(KelurahanModel::class, 'id_kelurahan', 'id_kelurahan');
    }

    public function member()
    {
        return $this->belongsTo(MemberModel::class, 'id_member');
    }

    public function transaksiUsulan()
    {
        return $this->hasMany(TransaksiUsulan::class, 'id_usulan_kegiatan');
    }

}
