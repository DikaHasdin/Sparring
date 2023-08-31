<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_jurnal',
        'posisi_dk',
        'nominal_jurnal',
        'akun_id',
        'transaksi_id',
    ];
} 
