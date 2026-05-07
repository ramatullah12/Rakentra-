<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';

    protected $fillable = [
        'nama',
        'hp',
        'alamat',
        'status'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}