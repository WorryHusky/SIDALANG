<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SampahController extends Controller
{
    public function index(Request $request)
    {
        $per = (($request->per) ? $request->per : 10);
        $page = (($request->page) ? $request->page-1 : 0);
        DB::statement('set @angka=0+'.$per*$page);
        $data = Sampah::with('jenis')
            ->where('nm_sampah', 'LIKE', '%' . $request->input('search') . '%')
            ->orderBy('id', 'asc')
            ->paginate($per, ['*', DB::raw('@angka  := @angka  + 1 AS angka')]);

        return view('sampah.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jeniscontroller = new JenisSampahController();
        $jenis = $jeniscontroller->get();
        return view('sampah.create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nm_sampah' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'point' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg',
            'jenis_id' => 'required',
        ]);

        $name = 'Sampah'.time().'.'.request()->file->getClientOriginalExtension();
        request()->file->move(public_path('images/sampah'), $name);

        $request->merge(
            [
                'photo' => $name
            ]);

        $data = Sampah::create([
            'nm_sampah' => $request->nm_sampah,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'point' => $request->point,
            'photo' => $request->photo,
            'jenis_id' => $request->jenis_id,
        ]);

        if($data){
            return redirect('sampah')->withSuccess('Sukses Menambah Data');
        }

        return redirect()->route('sampah.create')->withErrors('Sesuatu Error Terjadi');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Sampah::findByUuid($id);
        $jeniscontroller = new JenisSampahController();
        $jenis = $jeniscontroller->get();

        return view('sampah.edit', compact('data', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nm_sampah' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'point' => 'required',
            'file' => 'nullable|mimes:png,jpg,jpeg',
            'jenis_id' => 'required',
        ]);

        $data = Sampah::findByUuid($id);

        if(isset($request->file)){
            $name = 'Sampah'.time().'.'.request()->file->getClientOriginalExtension();
            request()->file->move(public_path('images/sampah'), $name);

            $request->merge(
                [
                    'photo' => $name
                ]);
        }

        if($data->update($request->all())){
            return redirect('sampah');
        }

        return redirect()->route('sampah.edit', $data)->withErrors('Sesuatu Error Terjadi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Sampah::findByUuid($id);

        if(!isset($data->id)){
            return redirect()->route('sampah.index')->withErrors('Data Tidak Ada / Sudah Dihapus');
        }

        if($data->delete()){
            return redirect('sampah')->withSuccess('Sukses Menghapus Data');;
        }
        return redirect()->route('sampah.index')->withErrors('Sesuatu Error Terjadi');

    }
}
