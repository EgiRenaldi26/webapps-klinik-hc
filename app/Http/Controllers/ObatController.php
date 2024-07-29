<?php

namespace App\Http\Controllers;

use App\Models\obatM;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $title = "Data obat";
        $obat = obatM::all();
        return view('dataobat.obat',compact('title','obat'));
    }

    public function create()
    {
        $title = "Tambah obat";
        return view('dataobat.obat-create',compact('title'));
    }

    
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'nama_obat' => 'required',
            'harga_obat' => 'required',
            'stok' => 'required',
            'dosis' => 'required',        
            'fungsi' => 'required',        
        ]);

       
        obatM::create($validatedData);

     
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil disimpan.');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $title = "Edit obat";
        $obat = obatM::findOrFail($id);
        return view('dataobat.obat-edit',compact('obat','title'));
    }

   
    public function update(Request $request, $id)
    {
        $obat = obatM::findOrFail($id);

        $obat->update([
           
            'nama_obat' => $request->nama_obat,
            'harga_obat' => $request->harga_obat,
            'stok' => $request->stok,
            'dosis' => $request->dosis,
            'fungsi' => $request->fungsi,
        ]);
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diupdate.');
    }

  
    public function destroy($id)
    {
        $obat = obatM::find($id);
        if (!$obat) {
            return redirect()->back()->with('error', 'Data obat tidak ditemukan.');
        }
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus.');
    }
}
