<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialRequest extends Model
{
    protected $fillable = [
        'maintenance_id',
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
}
