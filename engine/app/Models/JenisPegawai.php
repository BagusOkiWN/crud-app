<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPegawai extends Model
{
    use HasFactory;

    protected $table = 'jenis_pegawai';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'jenis_pegawai'
    ];
}
