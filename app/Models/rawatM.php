<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rawatM extends Model
{
    use HasFactory;
    protected $table = 'rawat';
    protected $fillable =[
        'nama_rawat',
        'harga_rawat',
        'keterangan',
        'created_at',
        'updated_at',
    ];
}
