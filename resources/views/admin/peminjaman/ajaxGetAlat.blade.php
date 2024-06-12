<link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
<style type="text/css">
	.select2-selection__rendered {
		line-height: 18px !important;
	}
	.select2-container .select2-selection--single {
		height: 35px !important;
	}
	.select2-selection__arrow {
		height: 34px !important;
	}
</style>
@if($tipe == 'kendaraan')
<div class="form-group row">
	<label for="jenis" class="col-sm-2 col-form-label">Kendaraan</label>
	<div class="col-sm-10">
		<select class="form-control" name="alat" id="alat">
			<option>Silahkan Pilih Kendaraan</option>
			@foreach($kendaraan as $k)
			<option value="{{ Crypt::encryptString($k->id) }}">{{ $k->kode_kendaraan }}</option>
			@endforeach
		</select>
	</div>
</div>
<script src="{{ asset('vendors/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript">
	$("#alat").select2({
		tags: true,
		width: 'resolve',
	});
</script>
@elseif($tipe == 'ruangan')
<div class="form-group row">
	<label for="nama_organisasi" class="col-sm-2 col-form-label">Nama Ruangan</label>
	<div class="col-sm-10">
		<select class="form-control" name="alat" id="ruangan">
			<option>Silahkan Pilih Ruangan</option>
			@foreach($ruangan as $r)
			@if(($r->tipe == 'ruangan' && $dt->tipe == 'ruangan') && (!in_array($r->id_reff, $dt->id_reff)))
			<option value="{{ Crypt::encryptString($r->id) }}">{{ $r->nama_ruang }} - {{ $r->lokasi }}</option>
			@else
			<option value="{{ Crypt::encryptString($r->id) }}">{{ $r->nama_ruang }} - {{ $r->lokasi }}</option>
			@endif
			@endforeach
		</select>
	</div>
</div>
<script src="{{ asset('vendors/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript">
	$("#ruangan").select2({
		tags: true,
		width: 'resolve',
	});
</script>
@elseif($tipe == 'barang')
<div class="form-group row">
	<label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
	<div class="col-sm-10">
		<select class="form-control" name="alat" id="barang" onchange="cekBarang(this.value)">
			<option>Silahkan Pilih Barang</option>
			@foreach($barang as $r)
			@if(($r->tipe == 'barang' && $dt->tipe == 'barang') && (!in_array($r->id_reff, $dt->id_reff)))
			<option value="{{ Crypt::encryptString($r->id) }}">{{ $r->no_inventaris }} - {{ $r->nama_barang }}</option>
			@else
			<option value="{{ Crypt::encryptString($r->id) }}">{{ $r->no_inventaris }} - {{ $r->nama_barang }}</option>
			@endif
			@endforeach
		</select>
	</div>
</div>
<div class="jumlahBrg"></div>
<script src="{{ asset('vendors/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript">
	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	function cekBarang(val) {
    
	    var dt = new FormData();

	    dt.append('id', val);
	    dt.append('tanggal_pinjam', $('#tanggal_pinjam').val());
	    dt.append('jam_pinjam', $('#jam_pinjam').val());
	    dt.append('tanggal_kembali', $('#tanggal_kembali').val());
	    dt.append('jam_kembali', $('#jam_kembali').val());

	    $.ajax({
	      type:'POST',
	      url:'{{ route('admin.peminjam.cekbarang') }}',
	      processData: false,
	      contentType: false,
	      data:dt,
	      success:function(data){
	        $('.jumlahBrg').html(data);
	      }
	   	});
	}

	$("#barang").select2({
		tags: true,
		width: 'resolve',
	});
</script>
@else

Silahkan Pilih Tipe Alat Terlebih Dahulu
@endif