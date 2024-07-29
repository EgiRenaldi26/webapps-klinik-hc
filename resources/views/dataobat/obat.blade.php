
@extends('layout.header')
@section('content')
<section class="section">
  <div class="section-header shadow">
    <h1>Data Obat</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ url('dashboard')}}">Menu Data</a></div>
      <div class="breadcrumb-item active"><a href="{{ route('obat.index')}}">Data Obat</a></div>
    </div>
  </div>
  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif
        <a href="{{ route('obat.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
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
            <th scope="col">Nama Obat</th>
            <th scope="col">Harga Obat</th>
            <th scope="col">Stok</th>
            <th scope="col">Dosis</th>
            <th scope="col">Fungsi</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
            <tbody>
              @foreach ($obat as $o)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $o->nama_obat }}</td>
                <td>{{ $o->harga_obat}}</td>
                <td>{{ $o->stok }}</td>
                <td>{{ $o->dosis }}</td>
                <td>{{ $o->fungsi }}</td>
                <td>{{ $o->created_at}}</td>
                <td>
                  <a href="{{ route('obat.edit', $o->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                  <a href="{{ route('obat.destroy', $o->id) }}" 
                    class="btn btn-danger" onclick="event.preventDefault();
                    if (confirm('Apakah anda yakin ingin menghapus?')) {
                      document.getElementById('delete-form-{{ $o->id }}').submit();
                    }">
                    <i class="fas fa-trash"></i></a>
                    <form id="delete-form-{{ $o->id }}" action="{{ route('obat.destroy', $o->id) }}" method="POST" style="display: none;">
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
