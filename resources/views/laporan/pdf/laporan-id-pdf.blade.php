<form action="{{ route('transaksi.pdfId', $transaksi->id)}}" method="get">
<h4>LAPORAN PASIEN</h4>
<br>
<br>
<p>NIK :<span> {{ $transaksi->pasien->nik }}</span></p>
<p>Nama Pasien :<span> {{ $transaksi->pasien->nama_pasien }}</span></p>
<p>Keluhan :<span> {{ $transaksi->keluhan }}</span></p>
<p>Lama Rawat :<span> {{ $transaksi->rawat->nama_rawat }}</span></p>
<p>Obat Tambahan :<span> {{ $transaksi->obat->nama_obat }}</span></p>
<p>Layanan :<span> {{ $transaksi->layanan->nama_layanan }}</span></p>
<p>Total Bayar :<span> {{ $transaksi->total_bayar }}</span></p>
<p>Uang Bayar :<span> {{ $transaksi->uang_bayar }}</span></p>
<p>Uang Kembali :<span> {{ $transaksi->uang_kembali }}</span></p>
</form>