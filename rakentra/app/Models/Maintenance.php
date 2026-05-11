<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'alat_id',
        'inspeksi_id',
        'mekanik_id',
        'tanggal_maintenance',
        'jenis_maintenance',
        'deskripsi_kerusakan',
        'tindakan_perbaikan',
        'biaya',
        'status',
        'foto_perbaikan',
        'keterangan',
    ];

    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }

    public function inspeksi()
    {
        return $this->belongsTo(Inspeksi::class);
    }

    public function mekanik()
    {
        return $this->belongsTo(Mekanik::class);
    }

    public function materialRequests()
    {
        return $this->hasMany(MaterialRequest::class);
    }
}
