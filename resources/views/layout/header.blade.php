<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>KLINIK TIIN HOLISTIC CARE | {{ $title }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->username}} - {{ Auth::user()->role }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
             
              <a href="" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
            
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout')}}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"><img src="{{ asset('assets/img/icon.jpg')}} " width="35%" alt=""></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><img src="{{ asset('assets/img/icon.jpg')}} " width="35%" alt=""></a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class=active><a class="nav-link" href="{{ url('dashboard')}}"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
            
            <li class="menu-header">Menu</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Menu Data</span></a>
              <ul class="dropdown-menu">
                @if (Auth::user()->role == 'resepsionis')
                <li><a class="nav-link" href="{{ route('pasien.index')}}">Data Sosial Pasien</a></li>
                <li><a class="nav-link" href="{{ route('rawat.index')}}">Data Rawat</a></li>
                <li><a class="nav-link" href="{{ url('transaksi')}}">Data Transaksi</a></li>
                <li><a class="nav-link" href="{{ url('laporan')}}">Data Laporan Transaksi</a></li>
                @endif

                @if (Auth::user()->role == 'layanan')
                <li><a class="nav-link" href="{{ route('layanan.index')}}">Data Layanan</a></li>
                <li><a class="nav-link" href="{{ route('obat.index')}}">Data Obat</a></li>
                @endif

                @if (Auth::user()->role == 'apoteker')
                <li><a class="nav-link" href="{{ route('obat.index')}}">Data Obat</a></li>
                @endif

                @if (Auth::user()->role == 'owner')
                <li><a class="nav-link" href="{{ route('users.index')}}">Data Users</a></li>
                <li><a class="nav-link" href="{{ route('pasien.index')}}">Data Sosial Pasien</a></li>
                <li><a class="nav-link" href="{{ route('layanan.index')}}">Data Layanan</a></li>
                <li><a class="nav-link" href="{{ route('obat.index')}}">Data Obat</a></li>
                <li><a class="nav-link" href="{{ route('rawat.index')}}">Data Rawat</a></li>
                <li><a class="nav-link" href="{{ url('transaksi')}}">Data Transaksi</a></li>
                <li><a class="nav-link" href="{{ url('laporan')}}">Data Laporan Transaksi</a></li>
                @endif
              </ul>
            </li>
           
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-stethoscope"></i> <span>Rekap</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('kb')}}">KB</a></li>
                <li><a class="nav-link" href="{{ url('imunisasi')}}">Imunisasi</a></li>
              </ul>
            </li>
                        <li><a class="nav-link" href="{{ route('log.index')}}"><i class="fas fa-history"></i> <span>Log Activity</span></a></li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('logout')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          </div>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2024 <div class="bullet"></div> Design By <a href="">Egi Renaldi</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
  
  <!-- DataTables JS -->
  <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>

  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function () {
        let table = $('#myTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
        });

        // Initialize FixedColumns
        new $.fn.dataTable.FixedColumns(table, {
            leftColumns: 1, // Number of columns to be fixed on the left
            heightMatch: 'auto' // Auto adjust the height of the fixed columns
        });
    });
  </script>
</body>
</html>
