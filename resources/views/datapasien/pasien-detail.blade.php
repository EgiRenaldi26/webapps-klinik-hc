
@extends('layout.header')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Detail Data Pasien</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('dashboard')}}">Menu Data</a></div>
        <div class="breadcrumb-item"><a href="{{ route('pasien.index')}}">Data Pasien</a></div>
        <div class="breadcrumb-item">Detail Data Pasien</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="shadow col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
            <form method="POST" action="{{ route('pasien.update', $pasien->id)}}">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label>NIK</label>
                <input name="nik" type="number" class="form-control" value="{{ $pasien->nik}}" readonly>
              </div>

              <div class="form-group">
                <label>Nama Pasien</label>
                <input name="nama_pasien" type="text" class="form-control" value="{{ $pasien->nama_pasien}}" readonly>
              </div>
              <div class="form-group">
                <label>Umur</label>
                <input name="umur" type="number" class="form-control" value="{{ $pasien->umur}}" readonly>
              </div>
              <div class="form-group">
                <label>No HP</label>
                <input name="no_hp" type="text" class="form-control" value="{{ $pasien->no_hp}}" readonly>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" type="text" class="form-control" value="{{ $pasien->alamat}}" readonly>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input name="tanggal_lahir" type="date" class="form-control" value="{{ $pasien->tanggal_lahir}}" readonly>
              </div>
              <div class="form-group">
                <label>Berat Badan</label>
                <input name="berat_badan" type="text" class="form-control" value="{{ $pasien->berat_badan}}" readonly>
              </div>
              <div class="form-group">
                <label>Tinggi Badan</label>
                <input name="tinggi_badan" type="text" class="form-control" value="{{ $pasien->tinggi_badan}}" readonly>
              </div>
              <div class="form-group">
                <label>Nama Ibu Kandung</label>
                <input name="nama_ibukandung" type="text" class="form-control" value="{{ $pasien->nama_ibukandung}}" readonly>
              </div>
              <div class="form-group">
                <label>Nama Ayah Kandung</label>
                <input name="nama_ayahkandung" type="text" class="form-control" value="{{ $pasien->nama_ayahkandung}}" readonly>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
      </div>
    </div>
  </section>
@endsection