@extends('auth.layouts')
@section('title')
    Edit - Bank Sampah
@endsection

@section('content')
        <!-- row -->
        <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Bank Sampah</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('bank_sampah.update',  $data->uuid)}}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Nama Bank Sampah</label>
                                        <input type="text" class="form-control" required placeholder="Bank Sampah" name="nm_banks" value="{{$data->nm_banks}}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Detail Lokasi</label>
                                        <input type="text" class="form-control" required placeholder="Detail Lokasi" name="detail_lokasi" value="{{$data->detail_lokasi}}>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Provisnsi</label>
                                        <select class="form-control select2" name="provinsi_id" required>
                                            @foreach ($provinsis as $item)
                                                <option value="{{$item->id}}" 
                                                @if ($item->id == $data->provinsi_id) selected
                                                @endif
                                                >{{$item->nm_provinsi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Kota</label>
                                        <select class="form-control select2" name="kota_id" required>
                                            @foreach ($kotas as $item)
                                                <option value="{{$item->id}}" 
                                                @if ($item->id == $data->kota_id) selected
                                                @endif
                                                >{{$item->nm_kota}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">kecamatan</label>
                                        <select class="form-control select2" name="kecamatan_id" required>
                                            @foreach ($kecamatans as $item)
                                                <option value="{{$item->id}}" 
                                                @if ($item->id == $data->kecamatan_id) selected
                                                @endif
                                                >{{$item->nm_kecamatan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
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

    <script src="{{ asset('js/custom.min.js') }}"></script>
	<script src="{{ asset('js/dlabnav-init.js') }}"></script>

    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>

    <script>
        $('.select2').select2();
    </script>



@endsection

@endsection
