<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kursus extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "kursus";
    
    protected $fillable = [
        'nama_kursus',
        'desksripsi',
        'tanggal',
        'harga',
        'pengajar_id',
        'category_id',
        'like'
    ];
}
