<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspeksi extends Model
{
    protected $fillable = [
        'alat_id',
        'operasional_id',
        'mekanik_id',
        'tanggal_inspeksi',
        'kondisi_alat',
        'hasil_inspeksi',
        'foto_kerusakan',
        'status',
        'keterangan',
    ];

    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }

    public function operasional()
    {
        return $this->belongsTo(Operasional::class);
    }

    public function mekanik()
    {
        return $this->belongsTo(Mekanik::class);
    }
    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
}
