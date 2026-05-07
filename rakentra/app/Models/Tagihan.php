<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $fillable = [
        'kontrak_id',
        'nomor_tagihan',
        'tanggal_tagihan',
        'jatuh_tempo',
        'subtotal',
        'ppn',
        'total',
        'status_tagihan',
        'keterangan',
    ];

    public function kontrak()
    {
        return $this->belongsTo(Kontrak::class);
    }
}
