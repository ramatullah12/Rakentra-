<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    protected $fillable = [
        'booking_id',
        'nomor_kontrak',
        'tanggal_kontrak',
        'durasi',
        'nilai_kontrak',
        'file_po',
        'file_spk',
        'status',
        'keterangan'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    public function mobilisasi()
    {
        return $this->hasOne(Mobilisasi::class);
    }
    public function tagihans()
    {
        return $this->hasMany(Tagihan::class);
    }
}
