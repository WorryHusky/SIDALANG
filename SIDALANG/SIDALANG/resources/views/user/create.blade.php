@extends('auth.layouts')

@section('title')
    Tambah Pengguna
@endsection


@section('content')
        <!-- row -->
        <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah User</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('user.store')}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-label fs-3 fw-bold">Profile</div>
                                    <div class="mb-3 col-md-12">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Photo</span>
                                            <div class="form-file shadow-sm">
                                                <input type="file" name="file" accept="image/png, image/jpeg" class="form-file-input form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control shadow-sm" required placeholder="Nama" name="name">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control shadow-sm" required placeholder="Email" name="email">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Point</label>
                                        <input type="number" class="form-control shadow-sm" required placeholder="Point" name="point">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Role</label>
                                        <select class="form-control shadow-sm select2" name="role" required>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div><hr>
                                    <div class="form-label fs-3 fw-bold">Bank Sampah</div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Bank Sampah</label>
                                        <select class="form-control shadow-sm select2" name="role" required>
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach ($banksampahs as $item)
                                                <option value="{{$item->id}}">{{$item->nm_banks}}</option>
                                            @endforeach
                                        </select>
                                    </div><hr>
                                    <div class="form-label fs-3 fw-bold">Alamat</div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Provinsi</label>
                                        <select class="form-control shadow-sm select2" name="provinsi_id" required>
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach ($provinsis as $item)
                                                <option value="{{$item->id}}">{{$item->nm_provinsi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Kota</label>
                                        <select class="form-control shadow-sm select2" name="kota_id" required>
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach ($kotas as $item)
                                                <option value="{{$item->id}}">{{$item->nm_kota}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Kecamatan</label>
                                        <select class="form-control shadow-sm select2" name="kecamatan_id" required>
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach ($kecamatans as $item)
                                                <option value="{{$item->id}}">{{$item->nm_kecamatan}}</option>
                                            @endforeach
                                        </select>
                                    </div><hr>
                                    <div class="form-label fs-3 fw-bold">Password</div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control shadow-sm" required placeholder="Password" name="password">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Re-Password</label>
                                        <input type="password" class="form-control shadow-sm" required placeholder="Password" name="password_confirmation">
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

    <script src="{{ asset('js/custom.min.js') }}"></script>
	<script src="{{ asset('js/dlabnav-init.js') }}"></script>

@endsection

@endsection
