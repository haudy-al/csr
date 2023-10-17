<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLogModel extends Model
{
    use HasFactory;

    protected $table = 'login_log';
    protected $fillable = [
        'user_ip','user_agent','jml_upaya_login','waktu'
    ];
}
