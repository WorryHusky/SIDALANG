<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Faskes;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function laporan(Request $request)
    {

        $request->validate([
            'kota_id' => 'required',
        ]);


        $data = Faskes::with('kuota.vaksin')->where('kota_id', $request->kota_id)->get();
        $data->map(function ($q) {
            $q->aksi = '<button class="btn btn-primary d-sm-inline-block d-none btn-sm" >lihat kuota<i class="las la-signal ms-3 scale5"></i></button>';
            $q->tipe = AppHelper::type($q->tipe);
            return $q;
        });
        return $data;
    }
}
