<?php

namespace App\Http\Controllers;

use App\Models\pasienM;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    
    public function index()
    {
        $title = "Data Pasien";
        $pasien = pasienM::all();
        return view('datapasien.pasien',compact('title','pasien'));
    }

    public function detail($id)
    {
        $title = "Data Pasien detail";
        $pasien = pasienM::findOrFail($id);
        return view('datapasien.pasien-detail',compact('title','pasien'));
    }

    public function create()
    {
        $title = "Tambah Pasien";
        return view('datapasien.pasien-create',compact('title'));
    }

    
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'nik' => 'required',
            'nama_pasien' => 'required',
            'umur' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'nama_ibukandung' => 'required',
            'nama_ayahkandung' => 'required',
        
        ]);

       
        pasienM::create($validatedData);

     
        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil disimpan.');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $title = "Edit Pasien";
        $pasien = pasienM::findOrFail($id);
        return view('datapasien.pasien-edit',compact('pasien','title'));
    }

   
    public function update(Request $request, $id)
    {
        $pasien = pasienM::findOrFail($id);

        $pasien->update([
           
            'nik' => $request->nik,
            'nama_pasien' => $request->nama_pasien,
            'umur' => $request->umur,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'tanggal_lahir' =>$request->tanggal_lahir,
            'berat_badan' =>$request->berat_badan ,
            'tinggi_badan' =>$request->tinggi_badan ,
            'nama_ibukandung' =>$request->nama_ibukandung ,
            'nama_ayahkandung' => $request->nama_ayahkandung, 
           
        ]);
       
        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil diupdate.');
    }

  
    public function destroy($id)
    {
        $pasien = pasienM::find($id);
        if (!$pasien) {
            return redirect()->back()->with('error', 'Data Pasien tidak ditemukan.');
        }
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil dihapus.');
    }
}
