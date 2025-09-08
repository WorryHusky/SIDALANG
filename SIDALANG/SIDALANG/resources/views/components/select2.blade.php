<div>
    {{-- {{dd($value)}} --}}
    <select class="form-control" id="{{$id}}" required name="{{$name}}" value="{{$value}}">
        @if(!isset($value))
        <option value="" selected disabled>Pilih</option>
        @endif
        {{$slot}}
    </select>
</div>
@section('js')
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/dlabnav-init.js') }}"></script>


    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>


    <script>
        $("#{{$id}}").select2().on('change', function(){
            console.log($("#{{$id}}").val());
        });
    </script>

@endsection
