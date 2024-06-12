<link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" />

@if ($tipe == 'kendaraan')
    <div class="form-group row">
        <label for="jenis" class="col-sm-4 col-form-label">Kendaraan</label>
        <div class="col-sm-8">
            <select class="form-control" name="alat" id="alat">
                <option>Silahkan Pilih Kendaraan</option>
                @foreach ($kendaraan as $k)
                    <option value="{{ $k->id }}">{{ $k->kode_kendaraan }}</option>
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
        <label for="nama_organisasi" class="col-sm-4 col-form-label">Nama Ruangan</label>
        <div class="col-sm-8">
            <select class="form-control" name="alat" id="ruangan">
                <option>Silahkan Pilih Ruangan</option>
                @foreach ($ruangan as $r)
                    @if ($r->tipe == 'ruangan' && $dt->tipe == 'ruangan' && !in_array($r->id_reff, $dt->id_reff))
                        <option value="{{ $r->id }}">{{ $r->nama_ruang }} -
                            {{ $r->getGedung->nama_gedung }}</option>
                    @else
                        <option value="{{ $r->id }}">{{ $r->nama_ruang }} -
                            {{ $r->getGedung->nama_gedung }}</option>
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
        <label for="nama_barang" class="col-sm-4 col-form-label">Nama Barang</label>
        <div class="col-sm-8">
            <select class="form-control" name="alat" id="barang">
                <option>Silahkan Pilih Barang</option>
                @if ($cache == 1)
                    @foreach ($barang as $r)
                        <option value="{{ $r->id_barang }}">{{ $r->no_inventaris }} -
                            {{ $r->nama_barang }}</option>
                    @endforeach
                @else
                    @foreach ($barang as $r)
                        @if ($r->tipe == 'barang' && $dt->tipe == 'barang' && !in_array($r->id_reff, $dt->id_reff))
                            <option value="{{ $r->id_barang }}">{{ $r->no_inventaris }} -
                                {{ $r->nama_barang }}</option>
                        @else
                            <option value="{{ $r->id_barang }}">{{ $r->no_inventaris }} -
                                {{ $r->nama_barang }}</option>
                        @endif
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <script src="{{ asset('vendors/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $("#barang").select2({
            tags: true,
            width: 'resolve',
        });
    </script>
@else
    Silahkan Pilih Tipe Alat Terlebih Dahulu
@endif