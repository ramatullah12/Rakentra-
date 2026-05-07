<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'pelanggan_id',
        'alat_id',
        'tanggal_booking',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan',
        'status'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }

    public function kontrak()
    {
        return $this->hasOne(Kontrak::class);
    }
}
