@extends('auth.layouts')
@section('title')
    Edit - Provinsi
@endsection

@section('content')
        <!-- row -->
        <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Provinsi</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('provinsi.update', ['provinsi' => $data->uuid])}}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" required placeholder="Provinsi" name="nm_provinsi" value="{{$data->nm_provinsi}}">
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
	<script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>

    <script src="{{ asset('js/custom.min.js') }}"></script>
	<script src="{{ asset('js/dlabnav-init.js') }}"></script>

@endsection

@endsection
