<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mekanik extends Model
{
    protected $fillable = [
        'nama_mekanik',
        'email',
        'no_hp',
        'alamat',
        'spesialisasi',
        'status',
    ];
}
