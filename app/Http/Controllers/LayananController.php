<?php

namespace App\Http\Controllers;

use App\Models\layananM;
use App\Models\obatM;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $title = "Data Layanan";
        $layanan = layananM::all();
        return view('datalayanan.layanan',compact('title','layanan'));
    }

    public function create()
    {
        $title = "Tambah Layanan";
        $obatM = obatM::all();
        return view('datalayanan.layanan-create',compact('title','obatM'));
    }

    
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'nama_layanan' => 'required',
            'harga_layanan' => 'required',
            'id_obat' => 'required',
            'keterangan' => 'required',        
        ]);

       
        layananM::create($validatedData);

     
        return redirect()->route('layanan.index')->with('success', 'Data layanan berhasil disimpan.');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $title = "Edit Layanan";
        $layanan = layananM::findOrFail($id);
        $obatM = obatM::all();
        return view('datalayanan.layanan-edit',compact('layanan','title','obatM'));
    }

   
    public function update(Request $request, $id)
    {
        $layanan = layananM::findOrFail($id);

        $layanan->update([
           
            'nama_layanan' => $request->nama_layanan,
            'harga_laynanan' => $request->harga_laynanan,
            'id_obat' => $request->id_obat,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('layanan.index')->with('success', 'Data layanan berhasil diupdate.');
    }

  
    public function destroy($id)
    {
        $layanan = layananM::find($id);
        if (!$layanan) {
            return redirect()->back()->with('error', 'Data layanan tidak ditemukan.');
        }
        $layanan->delete();
        return redirect()->route('layanan.index')->with('success', 'Data layanan berhasil dihapus.');
    }
}
