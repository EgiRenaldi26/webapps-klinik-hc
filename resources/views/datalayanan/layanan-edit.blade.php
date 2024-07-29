
@extends('layout.header')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Edit Data Layanan</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Menu Data</a></div>
        <div class="breadcrumb-item"><a href="{{ route('layanan.index')}}">Data Layanan</a></div>
        <div class="breadcrumb-item">Edit Data Layanan</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="shadow col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
            <form method="POST" action="{{ route('layanan.update',$layanan->id)}}">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label>Nama Layanan</label>
                <input name="nama_layanan" type="text" class="form-control" value="{{ $layanan->nama_layanan}}" required>
              </div>

              <div class="form-group">
                <label>Harga Layanan</label>
                <input name="harga_layanan" type="text" class="form-control" value="{{ $layanan->harga_layanan}}" required>
              </div>
             
              <div class="form-group">
                  <select name="id_obat" class="form-control" required>
                    <option value="">- Pilih Obat -</option>
                    @foreach ($obatM as $data)
                    <option value="{{ $data->id }}"> {{ $data->nama_obat }} - {{ $data->harga_obat }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input name="keterangan" type="text" class="form-control" value="{{ $layanan->keterangan}}" required>
              </div>
              
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
      </div>
    </div>
  </section>
@endsection