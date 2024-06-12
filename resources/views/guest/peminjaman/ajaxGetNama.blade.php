<link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" />

@if ($tipe == 'pegawai')
    <div class="form-group row">
        <label for="jenis" class="col-sm-4 col-form-label">Pegawai / Dosen</label>
        <div class="col-sm-8">
            <select class="form-control" name="nama" id="nama">
                <option>Silahkan Pilih Nama</option>
                @foreach ($data as $d)
                    <option value="{{ $d->NIDN }} - {{ ucwords(strtolower($d->nama)) }}">{{ $d->NIDN }} - {{ ucwords(strtolower($d->nama)) }}</option>
                @endforeach
            </select>
        </div>
    </div>
@elseif($tipe == 'mahasiswa')
    <div class="form-group row">
        <label for="nama_barang" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
        <div class="col-sm-8">
            <select class="form-control" name="nama" id="nama">
                <option>Silahkan Pilih Mahasiswa</option>
                @foreach ($data as $d)
                    <option value="{{ $d->nipd }} - {{ $d->nm_pd }}">{{ $d->nipd }} - {{ $d->nm_pd }}</option>
                @endforeach
            </select>
        </div>
    </div>
@else
    <div class="form-group row">
        <label for="nama" class="col-sm-4 col-form-label">Nama Penanggung Jawab</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nama" name="nama"
                placeholder="Nama Peminjam">
        </div>
    </div>
@endif
<script src="{{ asset('vendors/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript">
    $("#nama").select2({
        tags: true,
        width: 'resolve',
    });
</script>