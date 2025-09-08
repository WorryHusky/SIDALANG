@extends('auth.layouts')

@section('title')
    Edit Pengguna
@endsection


@section('content')
        <!-- row -->
        <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit User</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('user.update', $data->uuid)}}" method="post"  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Photo</span>
                                            <div class="form-file">
                                                <input type="file" name="file" accept="image/png, image/jpeg" class="form-file-input form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" required placeholder="Nama" name="name" value="{{$data->name}}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" required placeholder="Email" name="email" value="{{$data->email}}">
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

    <script src="{{ asset('js/custom.min.js') }}"></script>
	<script src="{{ asset('js/dlabnav-init.js') }}"></script>

@endsection

@endsection
