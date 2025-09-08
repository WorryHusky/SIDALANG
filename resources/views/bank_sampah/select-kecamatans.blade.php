<option value="" selected disabled>Pilih</option>
@foreach ($kecamatans as $item)
    <option value="{{ $item->id }}">{{ $item->nm_kecamatan }}</option>
@endforeach
