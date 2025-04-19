<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "pembayaran";
    
    protected $fillable = [
        'kursus_id',
        'pengguna_id',
        'bukti_bayar',
        'tanggal',
        'metode_bayar',
        'status'
    ];
}
