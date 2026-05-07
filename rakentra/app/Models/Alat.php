<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $fillable = [
        'nama_alat',
        'kode_alat',
        'lokasi',
        'hour_meter',
        'status'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function inspeksis()
    {
        return $this->hasMany(Inspeksi::class);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
}