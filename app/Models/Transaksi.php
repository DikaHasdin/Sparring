<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tgl_transaksi',
        'tot_jasa',
        'tot_penjualan',
        'status_transaksi',
        'ruangan_id',
        'pelanggan_id',
        'pemesanan_id',
    ];
} 
