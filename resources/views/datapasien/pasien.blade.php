
@extends('layout.header')
@section('content')
<section class="section">
  <div class="section-header shadow">
    <h1>Data Sosial Pasien</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ url('dashboard')}}">Menu Data</a></div>
      <div class="breadcrumb-item active"><a href="{{ route('pasien.index')}}">Data Sosial Pasien</a></div>
     
    </div>
  </div>
  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif
  <a href="{{ route('pasien.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
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
            <th scope="col">NIK</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Umur</th>
            <th scope="col">No Hp</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Created At</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
            <tbody>
              @foreach ($pasien as $p )
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $p->nik}}</td>
                <td>{{ $p->nama_pasien}}</td>
                <td>{{ $p->umur}}</td>
                <td>{{ $p->no_hp}}</td>
                <td>{{ $p->alamat}}</td>
                <td>{{ $p->tanggal_lahir}}</td>
                <td>{{ $p->created_at}}</td>
                <td>
                  <a href="{{ route('pasien.detail', $p->id) }}" class="btn btn-success"><i class="fas fa-info"></i></a> - 
                  <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                  <a href="{{ route('pasien.destroy', $p->id) }}" 
                    class="btn btn-danger" onclick="event.preventDefault();
                    if (confirm('Apakah anda yakin ingin menghapus?')) {
                      document.getElementById('delete-form-{{ $p->id }}').submit();
                    }">
                    <i class="fas fa-trash"></i></a>
                    <form id="delete-form-{{ $p->id }}" action="{{ route('pasien.destroy', $p->id) }}" method="POST" style="display: none;">
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

