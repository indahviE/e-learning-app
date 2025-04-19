<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Token_aksess extends Model
{
    use HasFactory, SoftDeletes;

    public $table = "token_akses";
    
    protected $fillable = [
        'kursus_id',
        'pengguna_id',
        'status'
    ];
}
