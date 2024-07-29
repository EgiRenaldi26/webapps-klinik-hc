<?php

namespace App\Http\Controllers;

use App\Models\layananM;
use App\Models\obatM;
use App\Models\pasienM;
use App\Models\rawatM;
use App\Models\transaksiM;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard";
        $pasien = pasienM::count();
        $users = User::count();
        $transaksi = transaksiM::count();
        $layanan = layananM::count();
        $obat = obatM::count();
        $rawat = rawatM::count();

       // Hitung total_bayar dari transaksi
       $totalBayar = transaksiM::sum('total_bayar');
        
       // Data penjualan per hari, bulan, tahun
       $dailySales = transaksiM::whereDate('created_at', Carbon::today())->sum('total_bayar');
       $monthlySales = transaksiM::whereMonth('created_at', Carbon::now()->month)->sum('total_bayar');
       $yearlySales = transaksiM::whereYear('created_at', Carbon::now()->year)->sum('total_bayar');

       return view('dashboard.dashboard', compact('title', 'pasien', 'users', 'transaksi', 'layanan', 'obat', 'rawat', 'totalBayar', 'dailySales', 'monthlySales', 'yearlySales'));
    }
}
