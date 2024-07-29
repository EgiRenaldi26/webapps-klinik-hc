<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksiM extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable =[
        'id_pasien',
        'keluhan',
        'id_rawat',
        'id_obat',
        'id_layanan',
        'total_bayar',
        'uang_bayar',
        'uang_kembali',
        'created_at',
        'updated_at',
    ];

    public function layanan()
    {
        return $this->belongsTo(layananM::class, 'id_layanan');
    }

    public function rawat()
    {
        return $this->belongsTo(rawatM::class, 'id_rawat');
    }

    public function pasien()
    {
        return $this->belongsTo(pasienM::class, 'id_pasien');
    }

    public function obat()
    {
        return $this->belongsTo(obatM::class, 'id_obat');
    }

}
