<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per = (($request->per) ? $request->per : 10);
        $page = (($request->page) ? $request->page-1 : 0);
        DB::statement('set @angka=0+'.$per*$page);
        $data = Provinsi::where(function($q) use ($request) {
            $q->where('nm_provinsi', 'LIKE', '%'.$request->search.'%');
        })->orderBy('id','asc')->paginate($per, ['*', DB::raw('@angka  := @angka  + 1 AS angka')]);

        return view('provinsi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nm_provinsi' => 'required|string|max:250',
        ]);

        $data = Provinsi::create([
            'nm_provinsi' => $request->nm_provinsi,
        ]);

        if($data){
            return redirect()->route('provinsi.index')->withSuccess('Sukses Menambah data');
        }

        return view('provinsi.create')->with('error', 'Sesuatu Error Terjadi');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Provinsi::get();

        return $data;
    }
    public function get()
    {
        $data = Provinsi::get();

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Provinsi::findByUuid($id);

        return view('provinsi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nm_provinsi' => 'required|string|max:250',
        ]);

        $data = Provinsi::findByUuid($id);


        if($data->update([
            'nm_provinsi' => $request->nm_provinsi,
        ])){
            return redirect()->route('provinsi.index')->withSuccess('Sukses Mengubah data');
        }

        return redirect()->route('provinsi.edit', $data)->withErrors('Sesuatu Error Terjadi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Provinsi::findByUuid($id);

        if(!isset($data->id)){
            return redirect()->route('provinsi.index')->withErrors('Data Tidak Ada / Sudah Dihapus');
        }
        if($data->delete()){
            return redirect()->route('provinsi.index')->withSuccess('Sukses Menghapus Data');
        }

        return redirect()->route('provinsi.index')->withErrors('Sesuatu Error Terjadi');
    }
}
