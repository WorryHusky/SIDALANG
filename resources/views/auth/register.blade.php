@extends('auth.layouts')
@section('title')
    Daftar
@endsection


@section('content')

<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <form action="{{ route('store') }}" method="post">
                        @csrf
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <a href="index.html"><img src="images/logosidalang.png" width="150" height="50" alt=""></a>
                                </div>
                                
                                <h4 class="text-center mb-4">Daftar Akun</h4>
                                <form action="index.html">
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Nama Panjang</strong></label>
                                        <input type="text" class="form-control" placeholder="Nama" name="name"  value="{{ old('name')}}">
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Email</strong></label>
                                        <input type="email" class="form-control" name="email" placeholder="hello@example.com" value="{{ old('email')}}">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Password</strong></label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Konfirmasi Password</strong></label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="konfirmasi password">
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p>Sudah Punya Akun? <a class="text-primary" href="page-login.html">Masuk</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@section('js')

    <script src="{{ asset('js/custom.min.js') }}"></script>
	<script src="{{ asset('js/dlabnav-init.js') }}"></script>

@endsection


@endsection
