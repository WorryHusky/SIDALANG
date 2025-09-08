@extends('auth.layouts')
@section('title')
    Edit - Kecamtan
@endsection

@section('content')
        <!-- row -->
        <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Kecamtan</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('kecamatan.update',  $data->uuid)}}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Kecamatan</label>
                                        <input type="text" class="form-control" required placeholder="Kecamatan" name="nm_kecamatan" value="{{$data->nm_kecamatan}}">
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
