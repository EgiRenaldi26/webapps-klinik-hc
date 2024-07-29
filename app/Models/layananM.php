<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layananM extends Model
{
    use HasFactory;
    protected $table = 'layanan';
    protected $fillable =[
        'nama_layanan',
        'harga_layanan',
        'id_obat',
        'keterangan',
        'created_at',
        'updated_at',
    ];

    public function obat()
    {
        return $this->belongsTo(obatM::class, 'id_obat');
    }
}
