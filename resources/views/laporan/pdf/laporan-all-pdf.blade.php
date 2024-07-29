<center>
    <h4>LAPORAN TRANSAKSI</h4>
</center>
<br><br>
<table 
      class="table table-bordered border"
      id="dataTable"
      width="100%"
      cellspacing="0">
     
       <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Keluhan</th>
            <th scope="col">Lama Rawat</th>
            <th scope="col">Obat Tambahan</th>
            <th scope="col">Layanan</th>
            <th scope="col">Total Bayar</th>
            <th scope="col">Uang Bayar</th>
            <th scope="col">Uang Kembali</th>
            <th scope="col">Created At</th>
          
        </tr>
        </thead>
            <tbody>
              @foreach ($transaksi as $t) 
              <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $t->pasien->nik }}</td>
                  <td>{{ $t->pasien->nama_pasien }}</td>
                  <td>{{ $t->keluhan }}</td>
                  <td>{{ $t->rawat->nama_rawat }} - {{ $t->rawat->harga_rawat }}</td>
                  <td>{{ $t->obat->nama_obat }} - {{ $t->obat->harga_obat }}</td>
                  <td>{{ $t->layanan->nama_layanan }} - {{ $t->layanan->harga_layanan }} - {{ $t->layanan->obat->nama_obat }} - {{ $t->layanan->obat->harga_obat }}</td>
                  <td>{{ $t->total_bayar }}</td>
                  <td>{{ $t->uang_bayar }}</td>
                  <td>{{ $t->uang_kembali }}</td>
                  <td>{{ $t->created_at }}</td>
                </tr>   
                @endforeach
            </tbody>
        </table>  