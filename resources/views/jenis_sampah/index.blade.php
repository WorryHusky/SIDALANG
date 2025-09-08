@extends('auth.layouts')
@section('title')
    Jenis Sampah
@endsection

@section('content')
        <!-- row -->
        <div class="container-fluid">
            @php
                $key = ['No' => ['label'=>'angka', 'width'=>50], 'Jenis Sampah' => ['label' => 'jenis_sampah']];
            @endphp
            <x-paginate :data="$data" :key="$key"></x-paginate>
        </div>




</div>

@section('js')

    <script src="{{ asset('js/custom.min.js') }}"></script>
	<script src="{{ asset('js/dlabnav-init.js') }}"></script>

@endsection

@endsection
