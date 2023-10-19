<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounterViewModel extends Model
{
    use HasFactory;

    protected $table = 'counter_view';
    protected $guarded = [];


}
