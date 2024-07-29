@extends('layout.header')
@section('content')

<section class="section">
  <div class="section-header shadow">
    <h1>Data Layanan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ url('dashboard')}}">Menu Data</a></div>
      <div class="breadcrumb-item active"><a href="{{ route('layanan.index')}}">Data Layanan</a></div>
    </div>
  </div>
  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif
  <a href="{{ route('layanan.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
  <div class="table-responsive">
    <table 
      class="table table-bordered"
      id="myTable"
      width="100%"
      cellspacing="0">
    <br><br>
    
       <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Layanan</th>
            <th scope="col">Harga Layanan</th>
            <th scope="col">Obat</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
            <tbody>
              @foreach ($layanan as $l )
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $l->nama_layanan}}</td>
                    <td>{{ $l->harga_layanan}}</td>
                    <td>{{ $l->obat->nama_obat}} - Rp.{{ $l->obat->harga_obat }}</td>
                    <td>{{ $l->keterangan}}</td>
                    <td>{{ $l->created_at}}</td>    
                    <td>
                      <a href="{{ route('layanan.edit', $l->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                      <a href="{{ route('layanan.destroy', $l->id) }}" 
                        class="btn btn-danger" onclick="event.preventDefault();
                        if (confirm('Apakah anda yakin ingin menghapus?')) {
                          document.getElementById('delete-form-{{ $l->id }}').submit();
                        }">
                        <i class="fas fa-trash"></i></a>
                        <form id="delete-form-{{ $l->id }}" action="{{ route('layanan.destroy', $l->id) }}" method="POST" style="display: none;">
                          @method('DELETE')
                          @csrf
                        </form>
                    </td>
                </tr>  
                @endforeach 
            </tbody>
        </table>  
  </div>
</section>
@endsection
