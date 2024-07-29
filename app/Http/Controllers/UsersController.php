<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        $title = "Data Users";
        $users = User::all();
        return view('datausers.users',compact('title','users'));
    }

    public function create()
    {
        // $LogM = LogM::create([
        //     'id_user' => Auth::user()->id,
        //     'activity' => 'User Memasuki Halaman Tambah Data Users'
        // ]);
        $title = "Tambah Data Users";
        $users = User::all();
        return view('datausers.users-create',compact('users','title'));
    }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'role' => 'required',
        ]);

        
         $users = new User([
            'nama' => $validatedData['nama'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']), 
            'role' => $validatedData['role'],
        ]);

       
        $users->save();

        return redirect()->route('users.index')->with('success', 'Data Pengguna berhasil disimpan.');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $title = "Edit Data Users";
        $users = User::findOrFail($id);
        return view('datausers.users-edit',compact('users','title'));
    }

    
    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $users->update([
            'nama' => $request->nama,
            'username' => $request->username,  
            'password' => Hash::make($request->password),  
            'role' => $request->role,  
           
        ]);
       
        return redirect()->route('users.index')->with('success', 'Data User berhasil diupdate.');
    }

    
    public function destroy($id)
    {
        $users = User::find($id);
        if (!$users) {
            return redirect()->back()->with('error', 'Data User tidak ditemukan.');
        }
        $users->delete();
        return redirect()->route('users.index')->with('success', 'Data User berhasil dihapus.');
    }

    public function changepassword($id) {
        $title = "Edit Kata Sandi";
        $users = User::findOrFail($id);
        return view('datausers.changepassword',compact('users','title'));
    }

    public function change(Request $request,$id) {
        $request->validate([
            'password_new' => 'required',
            'password_confirm' => 'required|same:password_new',
        ]);
        $users = User::where("id",$id)->first();
        $users->update([
            'password' => Hash::make($request->password_new),
        ]);
        return redirect()->route('users.index')->with('success','Kata sandi berhasil diperbaharui');
    }
}
