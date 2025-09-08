@extends('auth.layouts')
@section('title')
    Edit - Jenis Sampah
@endsection

@section('content')
        <!-- row -->
        <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Jenis Sampah</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('sampah.update', ['sampah' => $data->uuid])}}" method="post">
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
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Nama Sampah</label>
                                        <input type="text" class="form-control" required placeholder="Sampah" name="nm_sampah" value="{{$data->nm_sampah}}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Kategori</label>
                                        <select class="form-control select2" name="kategori">
                                            <option value="" selected disabled>Pilih</option>
                                            <option value="Organik"  {{ $data->kategori === 'Organik' ? 'selected' : '' }}>Organik</option>
                                            <option value="NonOrganik"  {{ $data->kategori === 'NonOrganik' ? 'selected' : '' }}>NonOrganik</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="jenis_id">Jenis Sampah</label>
                                        <select class="form-control select2" name="jenis_id">
                                            <option value="" selected disabled>Pilih</option>
                                            @foreach($jenis as $jenis)
                                                <option value="{{ $jenis->id }}" {{ $jenis->id === $data->jenis_id ? 'selected' : '' }}>
                                                    {{ $jenis->jenis_sampah }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Point Sampah</label>
                                        <div class="input-group mb-3">
                                            <input type="number" min="0" class="form-control" placeholder="point" aria-label="Recipient's username" aria-describedby="basic-addon2" name="point" value="{{$data->point}}">
                                            <span class="input-group-text" id="basic-addon2">Point</span>
                                          </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea class="form-control" aria-label="With textarea" name="deskripsi">{{$data->deskripsi}}</textarea> 
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
    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>


@endsection

@endsection
