<?php

namespace App\Http\Controllers;

use App\Models\BankSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankSampahController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per = (($request->per) ? $request->per : 10);
        $page = (($request->page) ? $request->page-1 : 0);
        DB::statement('set @angka=0+'.$per*$page);
        $data = BankSampah::with('kota', 'kecamatan', 'provinsi')
        ->where('nm_banks', 'LIKE', '%' . $request->input('search') . '%')
        ->orderBy('id', 'asc')
        ->paginate($per, ['*', DB::raw('@angka  := @angka  + 1 AS angka')]);
        return view('bank_sampah.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsicontroller = new ProvinsiController();
        $provinsis = $provinsicontroller->get();
        $kotacontroller = new KotaController();
        $kotas = $kotacontroller->get();
        $kecamatancontroller = new KecamatanController();
        $kecamatans = $kecamatancontroller->get();
        return view('bank_sampah.create', compact(
            'provinsis', 
            'kotas', 
            'kecamatans'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->nm_kota);
        $request->validate([
            'nm_banks' => 'required|string|max:250',
            'provinsi_id' => 'required',
            'detail_lokasi' => 'required',
            'kota_id' => 'required',
            'kecamatan_id' => 'required',
        ]);


        $data = BankSampah::create([
            'nm_banks' => $request->nm_banks,
            'detail_lokasi' => $request->detail_lokasi,
            'provinsi_id' => $request->provinsi_id,
            'kota_id' => $request->kota_id,
            'kecamatan_id' => $request->kecamatan_id,
        ]);

        if($data){
            return redirect('bank_sampah')->withSuccess('Sukses Menambah Data');
        }

        return redirect()->route('bank_sampah.create')->withErrors('Sesuatu Error Terjadi');


    }

    public function edit(string $id)
    {
        $data = BankSampah::findByUuid($id);
        $provinsicontroller = new ProvinsiController();
        $provinsis = $provinsicontroller->get();
        $kotacontroller = new KotaController();
        $kotas = $kotacontroller->get();
        $kecamatancontroller = new KecamatanController();
        $kecamatans = $kecamatancontroller->get();
        return view('bank_sampah.edit', compact(
            'data', 
            'provinsis',
            'kotas',
            'kecamatans',
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nm_banks' => 'required|string|max:250',
            'provinsi_id' => 'required',
            'detail_lokasi' => 'required',
            'kota_id' => 'required',
            'kecamatan_id' => 'required',
        ]);

        $data = BankSampah::findByUuid($id);

        if($data->update([
            'nm_banks' => $request->nm_banks,
            'detail_lokasi' => $request->detail_lokasi,
            'provinsi_id' => $request->provinsi_id,
            'kota_id' => $request->kota_id,
            'kecamatan_id' => $request->kecamatan_id,
        ])){
            return redirect('bank_sampah');
        }

        return redirect()->route('bank_sampah.edit', $data)->withErrors('Sesuatu Error Terjadi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = BankSampah::findByUuid($id);

        if(!isset($data->id)){
            return redirect()->route('bank_sampah.index')->withErrors('Data Tidak Ada / Sudah Dihapus');
        }

        if($data->delete()){
            return redirect('bank_sampah')->withSuccess('Sukses Menghapus Data');;
        }
        return redirect()->route('bank_sampah.index')->withErrors('Sesuatu Error Terjadi');

    }

    public function get()
    {
        $data = BankSampah::get();

        return $data;
    }
}
