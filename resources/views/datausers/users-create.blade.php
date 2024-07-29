
@extends('layout.header')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Tambah Users</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('dashboard')}}">Menu Data</a></div>
        <div class="breadcrumb-item"><a href="{{ route('users.index')}}">Data Users</a></div>
        <div class="breadcrumb-item">Tambah Users</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="shadow col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="{{ route('users.store')}}">
                @csrf
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input name="nama" type="text" class="form-control" id="nama" required>
              </div>

              <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" id="username" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" required>
              </div>
              <div class="form-group">
                <label for="password_confirm">Password Confirm</label>
                <input name="password_confirm" type="password" class="form-control" id="password_confirm" required>
              </div>
              <div class="form-group">
                <select name="role" class="form-control" >
                  <option value="">- Pilih Role -</option>
                  <option value="resepsionis">Resepsionis</option>
                  <option value="pelayanan">pelayanan</option>
                  <option value="apoteker">Apoteker</option>
                  <option value="owner">Owner</option>
                </select>
             </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
             
          </div>
      </div>
    </div>
  </section>
@endsection