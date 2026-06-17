<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HargaSewa extends Model
{
    protected $fillable = [
        'alat_id',
        'harga_harian',
        'harga_mingguan',
        'harga_bulanan',
        'keterangan',
    ];

    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }
}
