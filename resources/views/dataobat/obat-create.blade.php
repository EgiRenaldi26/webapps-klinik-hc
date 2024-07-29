
@extends('layout.header')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Tambah Data obat</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Menu Data</a></div>
        <div class="breadcrumb-item"><a href="{{ route('obat.index')}}">Data obat</a></div>
        <div class="breadcrumb-item">Tambah Data obat</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="shadow col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
            <form method="POST" action="{{ route('obat.store')}}">
                @csrf
              <div class="form-group">
                <label>Nama obat</label>
                <input name="nama_obat" type="text" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Harga obat</label>
                <input name="harga_obat" type="number" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Stok</label>
                <input name="stok" type="number" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Dosis</label>
                <input name="dosis" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Fungsi</label>
                <input name="fungsi" type="text" class="form-control" required>
              </div>
              
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
      </div>
    </div>
  </section>
@endsection