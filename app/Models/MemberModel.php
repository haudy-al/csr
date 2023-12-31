<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class MemberModel extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $guard = 'member';
    protected $table = 'member';

    protected $guarded = [];
    

    public function laporan()
    {
        return $this->hasMany(LaporanModel::class, 'id_member', 'id');
    }
}
