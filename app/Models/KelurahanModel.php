<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelurahanModel extends Model
{
    use HasFactory;

    protected $table = 'kelurahan';
    protected $guarded = [];

    public function kecamatan()
    {
        return $this->hasOne(KecamatanModel::class, 'id_kecamatan', 'id_kecamatan');
    }
}
