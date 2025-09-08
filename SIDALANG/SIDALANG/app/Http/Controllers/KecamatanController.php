<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per = (($request->per) ? $request->per : 10);
        $page = (($request->page) ? $request->page-1 : 0);
        DB::statement('set @angka=0+'.$per*$page);
        $data = Kecamatan::with('kota')
        ->where('nm_kecamatan', 'LIKE', '%' . $request->input('search') . '%')
        ->orderBy('id', 'asc')
        ->paginate($per, ['*', DB::raw('@angka  := @angka  + 1 AS angka')]);
        return view('kecamatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kotacontroller = new KotaController();
        $kotas = $kotacontroller->get();
        return view('kecamatan.create', compact('kotas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->nm_kota);
        $request->validate([
            'nm_kecamatan' => 'required|string|max:250',
            'kota_id' => 'required',
        ]);


        $data = Kecamatan::create([
            'nm_kecamatan' => $request->nm_kecamatan,
            'kota_id' => $request->kota_id,
        ]);

        if($data){
            return redirect('kecamatan')->withSuccess('Sukses Menambah Data');
        }

        return redirect()->route('kecamatan.create')->withErrors('Sesuatu Error Terjadi');


    }

    public function edit(string $id)
    {
        $data = Kecamatan::findByUuid($id);
        $kotacontroller = new KotaController();
        $kotas = $kotacontroller->get();

        return view('kecamatan.edit', compact('data', 'kotas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nm_kecamatan' => 'required|string|max:250',
            'kota_id' => 'required',
        ]);

        $data = Kecamatan::findByUuid($id);


        if($data->update([
            'nm_kecamatan' => $request->nm_kecamatan,
            'kota_id' => $request->kota_id,
        ])){
            return redirect('kecamatan');
        }

        return redirect()->route('kecamatan.edit', $data)->withErrors('Sesuatu Error Terjadi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kecamatan::findByUuid($id);

        if(!isset($data->id)){
            return redirect()->route('kecamatan.index')->withErrors('Data Tidak Ada / Sudah Dihapus');
        }

        if($data->delete()){
            return redirect('kecamatan')->withSuccess('Sukses Menghapus Data');;
        }
        return redirect()->route('kecamatan.index')->withErrors('Sesuatu Error Terjadi');

    }

    public function show(string $id)
    {
        $data = Kecamatan::get();

        return $data;
    }
    public function get()
    {
        $data = Kecamatan::get();

        return $data;
    }
}
