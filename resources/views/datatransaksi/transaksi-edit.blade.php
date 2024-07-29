@extends('layout.header')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Edit Data Transaksi</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('dashboard')}}">Menu Data</a></div>
        <div class="breadcrumb-item"><a href="{{ route('transaksi.index')}}">Data Transaksi</a></div>
        <div class="breadcrumb-item">Edit Data Transaksi</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="shadow col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
            <form method="POST" action="{{ route('transaksi.update', $transaksiM->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Pasien</label>
                    <div class="form-group">
                        <select name="id_pasien" class="form-control" required>
                          <option value="">- Pilih Pasien -</option>
                          @foreach ($pasienM as $p)
                          <option value="{{ $p->id }}" {{ $p->id == $transaksiM->id_pasien ? 'selected' : '' }}>
                              {{ $p->nik }} - {{ $p->nama_pasien }}
                          </option>
                          @endforeach
                        </select>
                    </div>
                  </div>
              <div class="form-group">
                <label>Keluhan</label>
                <input name="keluhan" type="text" class="form-control" value="{{ $transaksiM->keluhan }}" required>
              </div>
              <div class="form-group">
                <label>Rawat</label>
                <div class="form-group">
                    <select name="id_rawat" class="form-control" required>
                      <option value="">- Pilih Rawat -</option>
                      @foreach ($rawatM as $r)
                      <option value="{{ $r->id }}" {{ $r->id == $transaksiM->id_rawat ? 'selected' : '' }}>
                          {{ $r->nama_rawat }} - {{ $r->harga_rawat }}
                      </option>
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
                      <option value="{{ $o->id }}" {{ $o->id == $transaksiM->id_obat ? 'selected' : '' }}>
                          {{ $o->nama_obat }} - {{ $o->harga_obat }}
                      </option>
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
                       <option value="{{ $l->id }}" {{ $l->id == $transaksiM->id_layanan ? 'selected' : '' }}>
                           {{ $l->nama_layanan }} - {{ $l->harga_layanan }}
                       </option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label>Total bayar</label>
                <input name="total_bayar" type="number" class="form-control" value="" required readonly>
              </div>

              <div class="form-group">
                <label>Uang bayar</label>
                <input name="uang_bayar" type="number" class="form-control" value="{{ $transaksiM->uang_bayar }}" required>
              </div>

              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
      </div>
    </div>
  </section>
@endsection
