@extends('layout.header')
@section('content')
<section class="section">
  <div class="section-header shadow">
    <h1>Dashboard</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ url('dashboard')}}">Dashboard</a></div>
     
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 shadow shadow">
            <div class="card-icon bg-primary">
                <i class="fas fa-user"></i> <!-- Ikon pengguna -->
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Data Users</h4>
                </div>
                <div class="card-body">
                    {{ $users }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 shadow">
            <div class="card-icon bg-danger">
                <i class="fas fa-procedures"></i> <!-- Ikon pasien -->
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Data Pasien</h4>
                </div>
                <div class="card-body">
                    {{ $pasien }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 shadow">
            <div class="card-icon bg-warning">
                <i class="fas fa-file-invoice-dollar"></i> <!-- Ikon transaksi -->
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Data Transaksi</h4>
                </div>
                <div class="card-body">
                    {{ $transaksi }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 shadow">
            <div class="card-icon bg-success">
                <i class="fas fa-concierge-bell"></i> <!-- Ikon layanan -->
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Data Layanan</h4>
                </div>
                <div class="card-body">
                    {{ $layanan }}
                </div>
            </div>
        </div>
    </div>                  
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 shadow shadow">
            <div class="card-icon bg-primary">
                <i class="fas fa-briefcase-medical"></i> <!-- Ikon pengguna -->
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Data Obat</h4>
                </div>
                <div class="card-body">
                    {{ $obat }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 shadow">
            <div class="card-icon bg-danger">
                <i class="fas fa-stethoscope"></i> <!-- Ikon pasien -->
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Data Rawat</h4>
                </div>
                <div class="card-body">
                    {{ $rawat }}
                </div>
            </div>
        </div>
    </div>             
</div>
<div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>Sales Bar Chart</h4>
        </div>
        <div class="card-body">
            <canvas id="myBarChart" height="182"></canvas>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <canvas id="myLineChart" height="182"></canvas>
                <div class="statistic-details mt-sm-4">
                    <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                        <div class="detail-value">Rp.{{ $dailySales }}</div>
                        <div class="detail-name">Today's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                        <div class="detail-value">Rp.{{ $monthlySales }}</div>
                        <div class="detail-name">This Month's Sales</div>
                    </div>
                    <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 9%</span>
                        <div class="detail-value">Rp.{{ $yearlySales }}</div>
                        <div class="detail-name">This Year's Sales</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctxLine = document.getElementById('myLineChart').getContext('2d');

    var ctxBar = document.getElementById('myBarChart').getContext('2d');
    var myBarChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Daily Sales', 'Monthly Sales', 'Yearly Sales'],
            datasets: [{
                label: 'Total Sales',
                data: [{{ $dailySales }}, {{ $monthlySales }}, {{ $yearlySales }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</section>
@endsection