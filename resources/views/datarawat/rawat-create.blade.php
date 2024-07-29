
@extends('layout.header')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Tambah Data Rawat</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('dashboard')}}">Menu Data</a></div>
        <div class="breadcrumb-item"><a href="{{ route('rawat.index')}}">Data Rawat</a></div>
        <div class="breadcrumb-item">Tambah Data Rawat</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="shadow col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
            <form method="POST" action="{{ route('rawat.store')}}">
                @csrf
              <div class="form-group">
                <label>Nama Rawat</label>
                <input name="nama_rawat" type="text" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Harga Rawat</label>
                <input name="harga_rawat" type="number" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input name="keterangan" type="text" class="form-control" required>
              </div>
              
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
      </div>
    </div>
  </section>
@endsection