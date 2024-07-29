<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obatM extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $fillable =[
        'nama_obat',
        'harga_obat',
        'stok',
        'dosis',
        'fungsi',
        'created_at',
        'updated_at',
    ];
}
