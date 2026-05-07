<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operasional extends Model
{
    protected $fillable = [
        'mobilisasi_id',
        'tanggal',
        'hour_meter',
        'lokasi',
        'jam_operasional',
        'penggunaan_alat',
        'biaya_operasional',
        'status_unit',
        'keterangan',
    ];

    public function mobilisasi()
    {
        return $this->belongsTo(Mobilisasi::class);
    }
}
