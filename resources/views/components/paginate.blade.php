<div>
    <div class="card">
        <form method="get">
        <div class="card-header row">
                <div class="col-10">
                        <div class="input-group search-area">
                            <input name="search" type="text" class="form-control" placeholder="Search here..." value="{{app('request')->input('search')}}">
                            <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                        </div>
                    </div>
                    <div class="col-2">
                        <a href="{{route(Route::getCurrentRoute()->uri.'.create')}}" class="btn btn-primary">Tambah</a>
                    </div>
        </div>
    </form>
        <div class="card-body">
            <div class="table-responsive mb-3">
                <table class="table table-sm mb-0 table-striped">
                    <thead>
                        <tr>
                            {{-- <th class=" pe-3">
                                <div class="form-check custom-checkbox mx-2">
                                    <input type="checkbox" class="form-check-input" id="checkAll">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th> --}}
                            @foreach ($key as $i => $item)
                            <th
                            @if (isset($item['width']))
                                width="{{$item['width']}}"
                            @endif
                            >{{$i}}</th>
                            @endforeach
                            <th width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="customers">
                        @if (count($data['data']) == 0 )
                            <tr class="btn-reveal-trigger text-center">
                                <td colspan="{{count($key)+1}}">Tidak ada data</td>
                            </tr>
                        @endif
                        @foreach ($data['data'] as $item)

                        <tr class="btn-reveal-trigger">
                            @foreach ($key as $i => $o)
                            <td class="py-3">
                              {!! $item[$o['label']] !!}
                            </td>
                            @endforeach
                            <td class="py-2 text-end">
                                <div class="dropdown"><button class="btn btn-primary tp-btn-light sharp" type="button" data-bs-toggle="dropdown"><span class="fs--1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-0">
                                        <div class="py-2"><a class="dropdown-item"  href="{{route(Route::getCurrentRoute()->uri.'.edit', $item['uuid'])}}">Edit</a>

                                            <form action="{{ route(Route::getCurrentRoute()->uri.'.destroy', $item['uuid']) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="dropdown-item text-danger">Delete</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{-- {{dd($data['links']);}} --}}

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @foreach ($data['links'] as $item)
                    <li class="page-item {{$item['active'] ? 'active' : null}}"><a class="page-link ac" href="{{$item['url'] ? $item['url'].(app('request')->input('search') ? '&search='.app('request')->input('search') : '') : 'javascript:void(0)'}}">{!! $item['label'] !!}</a></li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</div>
