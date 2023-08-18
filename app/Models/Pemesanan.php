<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tgl_pemesanan',
        'jam_mulai',
        'jumlah_jam',
        'keterangan',
        'status_pemesanan',
        'ruangan_id',
        'paket_id',
        'pelanggan_id',
    ];
}
