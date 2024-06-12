<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Peminjaman KOMINFO</h5>
		<h6>Tanggal {{ date('d-m-Y', strtotime($awal)) }} - {{ date('d-m-Y', strtotime($akhir)) }}</h6>
			</center>

			<table class='table table-bordered'>
				<thead>
					<tr>
						<th>No</th>
						<th>Peminjam</th>
						<th>Tanggal Pinjam</th>
						<th>Rencana Pengembalian</th>
						<th>Tipe Peminjaman</th>
						<th>Item Yang Dipinjam</th>
					</tr>
				</thead>
				<tbody>
					@php $i=1 @endphp
					@foreach($data as $d)
					<tr>
						<td>{{ $i++ }}</td>
						<td>
							@if($d->level == 'umum')
							{{ $d->nama_organisasi }} - {{ $d->email }}
							@else
							{{ $d->getKaryawan->nip }} - {{ $d->getKaryawan->nama_karyawan }}
							@endif
						</td>
						<td>{{ date('d-m-Y', strtotime($d->rencana_pinjam)) }}, {{ $d->jam_pinjam }}</td>
						<td>{{ date('d-m-Y', strtotime($d->rencana_kembali)) }}, {{ $d->jam_selesai }}</td>
						<td>{{ ucwords($d->tipe) }}</td>
						<td>
							@if($d->tipe == 'kendaraan')
							{{ $d->getKendaraan->kode_kendaraan }}
							@elseif($d->tipe == 'ruangan')
							{{ $d->getRuangan->nama_ruang }}
							@elseif($d->tipe == 'barang')
							{{ $d->getBarang->nama_barang }}
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</body>
		</html>