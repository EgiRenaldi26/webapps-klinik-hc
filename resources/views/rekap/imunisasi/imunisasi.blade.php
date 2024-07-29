
@extends('layout.header')
@section('content')
<section class="section">
  <div class="section-header shadow">
    <h1>Rekap Imunisasi</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="#">Menu Data</a></div>
      <div class="breadcrumb-item active"><a href="#">Rekap Imunisasi</a></div>
     
    </div>
  </div>
  
  <a href="" class="btn btn-success"><i class="fas fa-print"></i> Print Excel</a>
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
          <th scope="col">Nama Bayi</th>
          <th scope="col">Nama Ayah</th>
          <th scope="col">Nama Ibu</th>
          <th scope="col">Alamat</th>
          <th scope="col">No HP</th>
          <th scope="col">Imunisasi</th>
          <th scope="col">Tanggal</th>
          
        </tr>
        </thead>
            <tbody>
              @foreach ($pasien as $p)
              <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $p->pasien->nik }}</td>
                  <td>{{ $p->pasien->nama_pasien}}</td>
                  <td>{{ $p->pasien->nama_ayahkandung }}</td>
                  <td>{{ $p->pasien->nama_ibukandung }}</td>
                  <td>{{ $p->pasien->alamat }}</td>
                  <td>{{ $p->pasien->no_hp }}</td>
                  <td>{{ $p->layanan->nama_layanan }}</td>
                  <td>{{ $p->created_at }}</td>
              </tr>   
              @endforeach
            </tbody>
        </table> 
  </div> 
</section>
@endsection
