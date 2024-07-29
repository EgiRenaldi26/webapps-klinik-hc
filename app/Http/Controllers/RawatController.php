<?php

namespace App\Http\Controllers;

use App\Models\rawatM;
use Illuminate\Http\Request;

class RawatController extends Controller
{
   
    public function index()
    {
        $title = "Data rawat";
        $rawat = rawatM::all();
        return view('datarawat.rawat',compact('title','rawat'));
    }

    public function create()
    {
        $title = "Tambah rawat";
        return view('datarawat.rawat-create',compact('title'));
    }

    
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'nama_rawat' => 'required',
            'harga_rawat' => 'required',
            'keterangan' => 'required',        
        ]);

       
        rawatM::create($validatedData);

     
        return redirect()->route('rawat.index')->with('success', 'Data rawat berhasil disimpan.');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $title = "Edit rawat";
        $rawat = rawatM::findOrFail($id);
        return view('datarawat.rawat-edit',compact('rawat','title'));
    }

   
    public function update(Request $request, $id)
    {
        $rawat = rawatM::findOrFail($id);

        $rawat->update([
           
            'nama_rawat' => $request->nama_rawat,
            'harga_rawat' => $request->harga_rawat,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('rawat.index')->with('success', 'Data rawat berhasil diupdate.');
    }

  
    public function destroy($id)
    {
        $rawat = rawatM::find($id);
        if (!$rawat) {
            return redirect()->back()->with('error', 'Data rawat tidak ditemukan.');
        }
        $rawat->delete();
        return redirect()->route('rawat.index')->with('success', 'Data rawat berhasil dihapus.');
    }
}
