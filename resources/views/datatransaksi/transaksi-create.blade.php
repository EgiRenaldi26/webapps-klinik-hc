
@extends('layout.header')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Tambah Data Transaksi</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('dashboard')}}">Menu Data</a></div>
        <div class="breadcrumb-item"><a href="{{ route('transaksi.index')}}">Data Transaksi</a></div>
        <div class="breadcrumb-item">Tambah Data Transaksi</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="shadow col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
            <form method="POST" action="{{ route('transaksi.store')}}">
                @csrf
                <div class="form-group">
                    <label>Pasien</label>
                    <div class="form-group">
                        <select name="id_pasien" class="form-control" required>
                          <option value="">- Pilih Pasien -</option>
                          @foreach ($pasienM as $p)
                          <option value="{{ $p->id }}"> {{ $p->nik }} - {{ $p->nama_pasien }}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
              <div class="form-group">
                <label>Keluhan</label>
                <input name="keluhan" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Rawat</label>
                <div class="form-group">
                    <select name="id_rawat" class="form-control" required>
                      <option value="">- Pilih Rawat -</option>
                      @foreach ($rawatM as $r)
                      <option value="{{ $r->id }}"> {{ $r->nama_rawat }} - {{ $r->harga_rawat }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label>Obat</label>
                <div class="form-group">
                    <select name="id_obat" class="form-control" required>
                      <option value="">- Pilih Obat -</option>
                      @foreach ($obatM as $o)
                      <option value="{{ $o->id }}"> {{ $o->nama_obat }} - {{ $o->harga_obat }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label>Layanan</label>
                <div class="form-group">
                    <select name="id_layanan" class="form-control" required>
                      <option value="">- Pilih Layanan -</option>
                      @foreach ($layananM as $l)
                      <option value="{{ $l->id }}"> {{ $l->nama_layanan }} - {{ $l->harga_layanan }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label>Total bayar</label>
                <input name="total_bayar" type="number" class="form-control" required readonly>
              </div>

              <div class="form-group">
                <label>Uang bayar</label>
                <input name="uang_bayar" type="number" class="form-control" required>
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
      </div>
    </div>
  </section>
@endsection