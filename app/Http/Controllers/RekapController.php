<?php

namespace App\Http\Controllers;

use App\Models\layananM;
use App\Models\pasienM;
use App\Models\transaksiM;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function imun() {
        $title = "Rekap Imunisasi";
        $pasien = transaksiM::whereHas('layanan', function($query) {
            $query->where('nama_layanan', 'like', 'Imunisasi%');
        })->get();
        
    
        return view('rekap.imunisasi.imunisasi', compact('title', 'pasien'));
    }
    

    public function kb() {
        
        $title = "Rekap KB";
        $pasien = pasienM::all();
        return view('rekap.kb.kb',compact('title','pasien'));
    }
}
