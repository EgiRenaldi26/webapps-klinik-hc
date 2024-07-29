
@extends('layout.header')
@section('content')
<section class="section">
  <div class="section-header shadow">
    <h1>Data Users</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ url('dashboard')}}">Menu Data</a></div>
      <div class="breadcrumb-item active"><a href="{{ route('users.index')}}">Data Users</a></div>
     
    </div>
  </div>
  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif
  <a href="{{ route('users.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
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
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Username</th>
            <th scope="col">Role</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
            <tbody>
              @foreach ($users as $u)
              <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $u->nama }}</td>
                  <td>{{ $u->username }}</td>
                  <td>{{ $u->role }}</td>
                  <td>{{ $u->created_at }}</td>
                  <td>
                    <a href="{{ route('users.changepassword', $u->id) }}" class="btn btn-success"><i class="fas fa-lock"></i></a>
                    <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                    <a href="{{ route('users.destroy', $u->id) }}" 
                      class="btn btn-danger" onclick="event.preventDefault();
                      if (confirm('Apakah anda yakin ingin menghapus?')) {
                        document.getElementById('delete-form-{{ $u->id }}').submit();
                      }">
                      <i class="fas fa-trash"></i></a>
                      <form id="delete-form-{{ $u->id }}" action="{{ route('users.destroy', $u->id) }}" method="POST" style="display: none;">
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
