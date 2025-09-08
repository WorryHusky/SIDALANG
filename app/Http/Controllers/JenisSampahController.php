<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisSampahController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per = (($request->per) ? $request->per : 10);
        $page = (($request->page) ? $request->page-1 : 0);
        DB::statement('set @angka=0+'.$per*$page);
        $data = JenisSampah::where(function($q) use ($request) {
            $q->where('jenis_sampah', 'LIKE', '%'.$request->search.'%');
        })->orderBy('id','asc')->paginate($per, ['*', DB::raw('@angka  := @angka  + 1 AS angka')]);

        return view('jenis_sampah.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_sampah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_sampah' => 'required|string|max:250',
        ]);

        $data = JenisSampah::create([
            'jenis_sampah' => $request->jenis_sampah,
        ]);

        if($data){
            return redirect()->route('jenis_sampah.index')->withSuccess('Sukses Menambah data');
        }

        return view('jenis_sampah.create')->with('error', 'Sesuatu Error Terjadi');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = JenisSampah::get();

        return $data;
    }
    public function get()
    {
        $data = JenisSampah::get();

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = JenisSampah::findByUuid($id);

        return view('jenis_sampah.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_sampah' => 'required|string|max:250',
        ]);

        $data = JenisSampah::findByUuid($id);


        if($data->update([
            'jenis_sampah' => $request->jenis_sampah,
        ])){
            return redirect()->route('jenis_sampah.index')->withSuccess('Sukses Mengubah data');
        }

        return redirect()->route('jenis_sampah.edit', $data)->withErrors('Sesuatu Error Terjadi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = JenisSampah::findByUuid($id);

        if(!isset($data->id)){
            return redirect()->route('jenis_sampah.index')->withErrors('Data Tidak Ada / Sudah Dihapus');
        }
        if($data->delete()){
            return redirect()->route('jenis_sampah.index')->withSuccess('Sukses Menghapus Data');
        }

        return redirect()->route('jenis_sampah.index')->withErrors('Sesuatu Error Terjadi');
    }
}
