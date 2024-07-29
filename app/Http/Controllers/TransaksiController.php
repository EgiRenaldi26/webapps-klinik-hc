<?php

namespace App\Http\Controllers;

use App\Models\layananM;
use App\Models\obatM;
use App\Models\pasienM;
use App\Models\rawatM;
use App\Models\transaksiM;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $title = "Data Transaksi";
        $transaksi = transaksiM::all();
        $obatM = obatM::all();
        $rawatM = rawatM::all();
        $layananM = layananM::all();
        $pasienM = pasienM::all();

        return view('datatransaksi.transaksi',compact('title','transaksi','obatM','rawatM','layananM','pasienM'));
    }
    
    public function create()
    {
        $title = "Tambah Transaksi";
        $obatM = obatM::all();
        $rawatM = rawatM::all();
        $layananM = layananM::all();
        $pasienM = pasienM::all();
        return view('datatransaksi.transaksi-create',compact('title','obatM','rawatM','layananM','pasienM'));
    }

    
    public function store(Request $request)
    {
    
        try {
            $request->validate([
                'id_pasien' => 'required',
                'keluhan' => 'required',  
                'id_rawat' => 'required',
                'id_obat' => 'required',
                'id_layanan' => 'required',
                'uang_bayar' => 'required',
            ]);
    
            $pasien = pasienM::find($request->input('id_pasien'));
            $obat = obatM::find($request->input('id_obat'));
            $rawat = rawatM::find($request->input('id_rawat'));
            $layanan = layananM::find($request->input('id_layanan'));
    
            if (!$obat || !$rawat) {
                return redirect()->route('transaksi.create')->with('error', 'Produk tidak ditemukan.');
            }
    
            // Periksa apakah stok cukup untuk transaksi
            if ($obat->stok < 1) {
                return redirect()->route('transaksi.create')->with('error', 'Stok obat tidak mencukupi.');
            }
    
            // Kurangi stok obat
            $obat->stok--;
            $obat->save();
    
            $transaksi = new transaksiM;
            $transaksi->id_pasien = $request->input('id_pasien');
            $transaksi->keluhan = $request->input('keluhan');
            $transaksi->id_rawat = $request->input('id_rawat');
            $transaksi->id_obat = $request->input('id_obat');
            $transaksi->id_layanan = $request->input('id_layanan');
            $transaksi->total_bayar = $obat->harga_obat + $rawat->harga_rawat + $layanan->harga_layanan;
            $transaksi->uang_bayar = $request->input('uang_bayar');
            $transaksi->uang_kembali = $transaksi->uang_bayar - $transaksi->total_bayar;
            $transaksi->save();
    
            return redirect()->route('transaksi.index')->with('success', 'Data Transaksi Berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('transaksi.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $title = "Tambah Transaksi";
        $obatM = obatM::all();
        $rawatM = rawatM::all();
        $layananM = layananM::all();
        $pasienM = pasienM::all();
        $transaksiM = transaksiM::find($id);
        return view('datatransaksi.transaksi-edit',compact('title','transaksiM','obatM','rawatM','layananM','pasienM'));
    }

  
    public function update(Request $request, $id)
    {
        try {
            
            $request->validate([
                'id_pasien' => 'required',
                'keluhan' => 'required',  
                'id_rawat' => 'required',
                'id_obat' => 'required',
                'id_layanan' => 'required',
                'uang_bayar' => 'required|numeric|min:0',
            ]);
            
            
            $transaksi = transaksiM::findOrFail($id);
            
            
            $pasien = pasienM::find($request->input('id_pasien'));
            $obat = obatM::find($request->input('id_obat'));
            $rawat = rawatM::find($request->input('id_rawat'));
            $layanan = layananM::find($request->input('id_layanan'));
            
            if (!$obat || !$rawat || !$layanan) {
                return redirect()->route('transaksi.edit', $id)->with('error', 'Produk tidak ditemukan.');
            }
            
            
            $total_bayar = $obat->harga_obat + $rawat->harga_rawat + $layanan->harga_layanan;
            
            
            $transaksi->update([
                'id_pasien' => $request->id_pasien,
                'keluhan' => $request->keluhan,
                'id_rawat' => $request->id_rawat,
                'id_obat' => $request->id_obat,
                'id_layanan' => $request->id_layanan,
                'total_bayar' => $total_bayar,
                'uang_bayar' => $request->uang_bayar,
                'uang_kembali' => $request->uang_bayar - $total_bayar,
            ]);

            return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('transaksi.edit', $id)->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    

    public function destroy($id)
    {
        $transaksi = transaksiM::find($id);
        if (!$transaksi) {
            return redirect()->back()->with('error', 'Data Transaksi tidak ditemukan.');
        }
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil dihapus.');
    }

    public function laporan()
    {
        $title = "Laporan Transaksi";
        $transaksi = transaksiM::all();
        $obatM = obatM::all();
        $rawatM = rawatM::all();
        $layananM = layananM::all();
        $pasienM = pasienM::all();
        return view('laporan.laptransaksi',compact('title','transaksi','obatM','rawatM','layananM','pasienM'));
    }

    public function pdf() {
        $transaksi = transaksiM::all();
        $obatM = obatM::all();
        $rawatM = rawatM::all();
        $layananM = layananM::all();
        $pasienM = pasienM::all();

        $data = [
            'transaksi' => $transaksi,
            'obat' => $obatM,
            'rawat' => $rawatM,
            'layanan' => $layananM,
            'pasien' => $pasienM
        ];

        
        $pdf = PDF::loadview('laporan.pdf.laporan-all-pdf', $data);
        return $pdf->stream('transaksi.pdf');
    }
    
    public function pdfId($id) {
        $transaksi = transaksiM::find($id);
        $obatM = obatM::all();
        $rawatM = rawatM::all();
        $layananM = layananM::all();
        $pasienM = pasienM::all();

        $data = [
            'transaksi' => $transaksi,
            'obat' => $obatM,
            'rawat' => $rawatM,
            'layanan' => $layananM,
            'pasien' => $pasienM
        ];

        
        $pdf = PDF::loadview('laporan.pdf.laporan-id-pdf', $data);
        return $pdf->stream('transaksi.pdf');
    }
}
