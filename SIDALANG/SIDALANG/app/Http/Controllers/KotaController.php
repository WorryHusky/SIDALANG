<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per = (($request->per) ? $request->per : 10);
        $page = (($request->page) ? $request->page-1 : 0);
        DB::statement('set @angka=0+'.$per*$page);
        $data = Kota::where(function($q) use ($request) {
            $q->where('nm_kota', 'LIKE', '%'.$request->search.'%');
        })->join('provinsis', 'kotas.provinsi_id', '=', 'provinsis.id')->orderBy('kotas.id','asc')->paginate($per, ['kotas.*', 'provinsis.nm_provinsi', DB::raw('@angka  := @angka  + 1 AS angka')]);

        return view('kota.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsicontroller = new ProvinsiController();
        $provinsis = $provinsicontroller->get();
        return view('kota.create', compact('provinsis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->nm_kota);
        $request->validate([
            'nm_kota' => 'required|string|max:250',
            'provinsi_id' => 'required',
        ]);


        $data = Kota::create([
            'nm_kota' => $request->nm_kota,
            'provinsi_id' => $request->provinsi_id,
        ]);

        if($data){
            return redirect('kota')->withSuccess('Sukses Menambah Data');
        }

        return redirect()->route('kota.create')->withErrors('Sesuatu Error Terjadi');


    }

    public function show(string $id)
    {
        $data = Kota::get();

        return $data;
    }
    public function get()
    {
        $data = Kota::get();

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kota::findByUuid($id);
        $provinsicontroller = new ProvinsiController();
        $provinsis = $provinsicontroller->get();

        return view('kota.edit', compact('data', 'provinsis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nm_kota' => 'required|string|max:250',
            'provinsi_id' => 'required',
        ]);

        $data = Kota::findByUuid($id);


        if($data->update([
            'nm_kota' => $request->nm_kota,
            'provinsi_id' => $request->provinsi_id,
        ])){
            return redirect('kota');
        }

        return redirect()->route('kota.edit', $data)->withErrors('Sesuatu Error Terjadi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kota::findByUuid($id);

        if(!isset($data->id)){
            return redirect()->route('kota.index')->withErrors('Data Tidak Ada / Sudah Dihapus');
        }

        if($data->delete()){
            return redirect('kota')->withSuccess('Sukses Menghapus Data');;
        }
        return redirect()->route('kota.index')->withErrors('Sesuatu Error Terjadi');

    }
}
