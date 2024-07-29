
@extends('layout.header')
@section('content')
<section class="section">
  <div class="section-header shadow">
    <h1>Laporan Transaksi</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="#">Menu Data</a></div>
      <div class="breadcrumb-item active"><a href="#">Laporan Transaksi</a></div>
     
    </div>
  </div>
  
  <a href="{{ route('transaksi.pdf')}}" class="btn btn-primary"><i class="fas fa-print"></i> Print All</a>
  <br><br>
  <div class="table-responsive">
    <table 
      class="table table-bordered"
      id="dataTable"
      width="100%"
      cellspacing="0">
       <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Keluhan</th>
            <th scope="col">Lama Rawat</th>
            <th scope="col">Obat Tambahan</th>
            <th scope="col">Layanan</th>
            <th scope="col">Total Bayar</th>
            <th scope="col">Uang Bayar</th>
            <th scope="col">Uang Kembali</th>
            <th scope="col">Created At</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
            <tbody>
              @foreach ($transaksi as $t) 
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $t->pasien->nik }}</td>
                    <td>{{ $t->pasien->nama_pasien }}</td>
                    <td>{{ $t->keluhan }}</td>
                    <td>{{ $t->rawat->nama_rawat }} - Rp. {{ number_format($t->rawat->harga_rawat, 0, ',', '.') }}</td>
                    <td>{{ $t->obat->nama_obat }} - Rp. {{ number_format($t->obat->harga_obat, 0, ',', '.') }}</td>
                    <td>{{ $t->layanan->nama_layanan }} - Rp. {{ number_format($t->layanan->harga_layanan, 0, ',', '.') }} - {{ $t->layanan->obat->nama_obat }} - Rp. {{ number_format($t->obat->harga_obat, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($t->total_bayar, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($t->uang_bayar, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($t->uang_kembali, 0, ',', '.') }}</td>
                    <td>{{ $t->created_at }}</td>
                    <td>
                        <a href="{{ route('transaksi.pdfId', $t->id )}}" class="btn btn-warning"><i class="fas fa-print"></i></a>
                    </td>
                </tr>   
                @endforeach
            </tbody>
        </table> 
  </div> 
</section>
@endsection
