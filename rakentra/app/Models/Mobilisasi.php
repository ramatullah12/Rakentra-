<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobilisasi extends Model
{
    protected $fillable = [
        'kontrak_id',
        'vendor_id',
        'tanggal_kirim',
        'tanggal_kembali',
        'lokasi_proyek',
        'status',
        'keterangan',
    ];

    public function kontrak()
    {
        return $this->belongsTo(Kontrak::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
