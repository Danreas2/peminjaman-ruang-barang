@if($tipe == 'pegawai')
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
<div class="form-group row">
	<label for="jenis" class="col-sm-2 col-form-label">Karyawan</label>
	<div class="col-sm-10">
		<select class="form-control" name="karyawan" id="karyawan">
			<option>Silahkan Pilih Karyawan</option>
			@foreach($karyawan as $k)
			<option value="{{ Crypt::encryptString($k->id) }}">{{ $k->nip }} - {{ $k->nama_karyawan }}</option>
			@endforeach
		</select>
	</div>
</div>
<script src="{{ asset('vendors/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript">
	$("#karyawan").select2({
	   tags: true,
	   width: 'resolve',
	});
</script>
@elseif($tipe == 'umum')
<div class="form-group row">
	<label for="nama_organisasi" class="col-sm-2 col-form-label">Nama Organisasi</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="nama_organisasi" name="nama_organisasi" placeholder="Nama Organisasi" value="@if($mode == 'edit') {{ $data->nama_organisasi }} @endif">
	</div>
</div>
<div class="form-group row">
	<label for="email" class="col-sm-2 col-form-label">Email</label>
	<div class="col-sm-10">
		<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="@if($mode == 'edit') {{ $data->email }} @endif">
	</div>
</div>
@else
Silahkan Pilih Tipe Peminjam Terlebih Dahulu
@endif