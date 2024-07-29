
@extends('layout.header')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Edit Data obat</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Menu Data</a></div>
        <div class="breadcrumb-item"><a href="{{ route('obat.index')}}">Data obat</a></div>
        <div class="breadcrumb-item">Edit Data obat</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="shadow col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
            <form method="POST" action="{{ route('obat.update',$obat->id)}}">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label>Nama obat</label>
                <input name="nama_obat" type="text" class="form-control" value="{{ $obat->nama_obat }}" required>
              </div>

              <div class="form-group">
                <label>Harga obat</label>
                <input name="harga_obat" type="number" class="form-control" value="{{ $obat->harga_obat }}" required>
              </div>
              <div class="form-group">
                <label>Stok</label>
                <input name="stok" type="number" class="form-control" value="{{ $obat->stok }}" required>
              </div>
              <div class="form-group">
                <label>Dosis</label>
                <input name="dosis" type="text" class="form-control" value="{{ $obat->dosis }}" required>
              </div>
              <div class="form-group">
                <label>Fungsi</label>
                <input name="fungsi" type="text" class="form-control" value="{{ $obat->fungsi }}" required>
              </div>
              
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
      </div>
    </div>
  </section>
@endsection