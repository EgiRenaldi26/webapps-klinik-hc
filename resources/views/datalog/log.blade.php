@extends('layout.header')
@section('content')
@extends('layout.header')
@section('content')
<section class="section">
  <div class="section-header shadow">
    <h1>Log Activity</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ url('dashboard')}}">Menu Data</a></div>
      <div class="breadcrumb-item active"><a href="#">Log Activity</a></div>
     
    </div>
  </div>
  <div class="table-responsive">
    <table 
      class="table table-bordered"
      id="myTable"
      width="100%"
      cellspacing="0">
       <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Users</th>
            <th scope="col">Activity</th>
            <th scope="col">Tanggal</th>
        
        </tr>
        </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Egi Renaldi</td>
                    <td>Menambahkan User</td>
                    <td>17 Juli 2024</td>
                    
                </tr>   
            </tbody>
            <tbody>
                <tr>
                    <th scope="row">2</th>
                    <td>Egi Renaldi</td>
                    <td>Mengedit User</td>
                    <td>17 Juli 2024</td>
                    
                </tr>   
            </tbody>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Renaldi</td>
                    <td>Menambahkan User</td>
                    <td>17 Juli 2024</td>
                    
                </tr>   
            </tbody>
        </table>  
  </div>
</section>
@endsection
@endsection