<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class AdminModel extends Authenticatable
{

    use HasFactory, HasApiTokens, Notifiable;
    protected $guard = 'admin';
    protected $table = 'admin';
    protected $fillable = ['username','password','token'];

}
