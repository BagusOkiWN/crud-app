<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_pegawai',
        'nik',
        'jenis_pegawai_id',
        'status_pegawai_id',
        'unit',
        'sub_unit',
        'pendidikan_id',
        'tgl_lahir',
        'tpt_lahir',
        'jenkel_id',
        'agama_id',
        'gambar'
    ];
}
