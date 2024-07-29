<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasienM extends Model
{
    use HasFactory ;
    protected $table = 'pasien';
    protected $fillable =[
        'nik',
        'nama_pasien',
        'umur',
        'no_hp',
        'alamat',
        'tanggal_lahir',
        'tinggi_badan',
        'berat_badan',
        'nama_ibukandung',
        'nama_ayahkandung',
        'created_at',
        'updated_at',
    ];

    public function layanan()
    {
        return $this->belongsTo(LayananM::class, 'id_layanan');
    }
}
