
@extends('layout.header')
@section('content')
<section class="section">
  <div class="section-header shadow">
    <h1>Data Rawat</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ url('dashboard')}}">Menu Data</a></div>
      <div class="breadcrumb-item active"><a href="{{ route('rawat.index')}}">Data Rawat</a></div>
     
    </div>
  </div>
  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif
  <a href="{{ route('rawat.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
  <br><br>
  <div class="table-responsive">
    <table 
      class="table table-bordered"
      id="myTable"
      width="100%"
      cellspacing="0">
       <thead>

        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Rawat</th>
            <th scope="col">Harga Rawat</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
            <tbody>
              @foreach ($rawat as $r) 
              <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $r->nama_rawat}}</td>
                  <td>{{ $r->harga_rawat}}</td>
                  <td>{{ $r->keterangan}}</td>
                  <td>{{ $r->created_at}}</td>
                  <td>
                    <a href="{{ route('rawat.edit', $r->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                    <a href="{{ route('rawat.destroy', $r->id) }}" 
                      class="btn btn-danger" onclick="event.preventDefault();
                      if (confirm('Apakah anda yakin ingin menghapus?')) {
                        document.getElementById('delete-form-{{ $r->id }}').submit();
                      }">
                      <i class="fas fa-trash"></i></a>
                      <form id="delete-form-{{ $r->id }}" action="{{ route('rawat.destroy', $r->id) }}" method="POST" style="display: none;">
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
