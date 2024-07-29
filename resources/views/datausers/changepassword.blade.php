
@extends('layout.header')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Ganti Password</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Menu Data</a></div>
        <div class="breadcrumb-item"><a href="#">Data Users</a></div>
        <div class="breadcrumb-item">Ganti Password</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="shadow col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="{{ route('users.change', $users->id)}}">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" id="username" value="{{ $users->username}}" readonly>
              </div>
              <div class="form-group">
                <label for="password">Password Baru</label>
                <input name="password_new" type="password" class="form-control" id="password" value="" required>
              </div>
              <div class="form-group">
                <label for="password_confirm">Password Confirm</label>
                <input name="password_confirm" type="password" class="form-control" id="password_confirm" value="" required>
              </div>
             
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
             
          </div>
      </div>
    </div>
  </section>
@endsection