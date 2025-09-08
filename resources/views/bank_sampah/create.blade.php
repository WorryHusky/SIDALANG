@extends('auth.layouts')
@section('title')
    Tambah - Bank Sampah
@endsection

@section('content')
        <!-- row -->
        <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Bank Sampah</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('bank_sampah.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Nama Bank Sampah</label>
                                        <input type="text" class="form-control" required placeholder="Bank Sampah" name="nm_banks">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Detail Lokasi</label>
                                        <input type="text" class="form-control" required placeholder="Detail Lokasi" name="detail_lokasi">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Provisnsi</label>
                                        <select id="select-provinsi" class="form-control select2" name="provinsi_id" required>
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach ($provinsis as $item)
                                                <option value="{{$item->id}}">{{$item->nm_provinsi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Kota</label>
                                        <select id="select-kota" class="form-control select2" name="kota_id" required>
                                            <option value="" selected disabled>Pilih</option>
                                            {{-- @foreach ($kotas as $item)
                                                <option value="{{$item->id}}">{{$item->nm_kota}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Kecamatan</label>
                                        <select id="select-kecamatan" class="form-control select2" name="kecamatan_id" required>
                                            <option value="" selected disabled>Pilih</option>
                                            {{-- @foreach ($kecamatans as $item)
                                                <option value="{{$item->id}}">{{$item->nm_kecamatan}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="button" onclick="history.back()" class="btn btn-danger">Kembali</button>

                            </form>
                        </div>
                    </div>
                </div>

        </div>
    <!--**********************************
        Content body end
    ***********************************-->


</div>

@section('js')
    	<!-- Dashboard 1 -->
	<script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
	<script src="{{ asset('js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>

    <script>
        $('#select-provinsi').on('change', (event) => {
            console.log(event);
            $.ajax(`/data/${event.target.value}/kota`).then((data) => {
                $('#select-kota').html(data)
            })
        });

        $('#select-kota').on('change', (event) => {
            console.log(event);
            $.ajax(`/data/${event.target.value}/kecamatan`).then((data) => {
                $(`#select-kecamatan`).html(data)
            })
        });
    </script>



@endsection

@endsection
