<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialRequest extends Model
{
    protected $fillable = [
        'maintenance_id',
        'mekanik_id',
        'nama_material',
        'jumlah',
        'satuan',
        'harga',
        'supplier',
        'status',
        'keterangan',
    ];

    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class);
    }

    public function mekanik()
    {
        return $this->belongsTo(Mekanik::class);
    }

    public function getTotalHargaAttribute()
    {
        return $this->jumlah * $this->harga;
    }
}