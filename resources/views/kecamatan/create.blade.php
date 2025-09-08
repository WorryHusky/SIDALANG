@extends('auth.layouts')
@section('title')
    Tambah - Kecamatan
@endsection

@section('content')
        <!-- row -->
        <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Kecamatan</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('kecamatan.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Kecamatan</label>
                                        <input type="text" class="form-control" required placeholder="Kecamatan" name="nm_kecamatan">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Kota</label>
                                        <select class="form-control select2" name="kota_id" required>
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach ($kotas as $item)
                                                <option value="{{$item->id}}">{{$item->nm_kota}}</option>
                                            @endforeach
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
        $('.select2').select2();
    </script>



@endsection

@endsection
