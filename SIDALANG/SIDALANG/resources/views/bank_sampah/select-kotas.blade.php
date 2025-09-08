<option value="" selected disabled>Pilih</option>
@foreach ($kotas as $item)
    <option value="{{ $item->id }}">{{ $item->nm_kota }}</option>
@endforeach
