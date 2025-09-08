<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per = (($request->per) ? $request->per : 10);
        $page = (($request->page) ? $request->page-1 : 0);
        DB::statement('set @angka=0+'.$per*$page);
        $data = User::with('bank_sampah')->where(function($q) use ($request) {
            $q->where('name', 'LIKE', '%'.$request->search.'%');
            $q->orWhere('email', 'LIKE', '%'.$request->search.'%');
        })->orderBy('id','asc')->paginate($per, ['*', DB::raw('@angka  := @angka  + 1 AS angka')]);

        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usercontroller = new UserController();
        $users = $usercontroller->get();
        $provinsicontroller = new ProvinsiController();
        $provinsis = $provinsicontroller->get();
        $kotacontroller = new KotaController();
        $kotas = $kotacontroller->get();
        $kecamatancontroller = new KecamatanController();
        $kecamatans = $kecamatancontroller->get();
        $banksampahcontroller = new BankSampahController();
        $banksampahs = $banksampahcontroller->get();
        return view('user.create', compact(
            'users',
            'provinsis', 
            'kotas', 
            'kecamatans',
            'banksampahs',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'file' => 'required|mimes:png,jpg,jpeg',
            'role' => 'required',
            'point' => 'required',
            'bank_id' => 'required',
            'provinsi_id' => 'required',
            'kota_id' => 'required',
            'kecamatan_id' => 'required',
        ]);

        $name = 'User'.time().'.'.request()->file->getClientOriginalExtension();
        request()->file->move(public_path('images/avatar'), $name);

        $request->merge(
            [
                'photo' => $name
            ]);

            // return $request;

            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'photo' => $request->foto,
                'role' => $request->role,
                'point' => $request->point,
                'bank_id' => $request->bank_id,
                'provinsi_id' => $request->provinsi_id,
                'kota_id' => $request->kota_id,
                'kecamatan_id' => $request->kecamatan_id,
                'password' => Hash::make($request->password),
                'api_token' => hash('sha256', Str::random(60))

            ]);
            if($data){
                return redirect('user');
            }

            return redirect('user.create')->withErrors( 'Sesuatu Error Terjadi');


        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            $data = User::get();

            return $data;
        }
    public function get()
    {
        $data = User::get();

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findByUuid($id);
        $usercontroller = new UserController();
        $users = $usercontroller->get();
        $provinsicontroller = new ProvinsiController();
        $provinsis = $provinsicontroller->get();
        $kotacontroller = new KotaController();
        $kotas = $kotacontroller->get();
        $kecamatancontroller = new KecamatanController();
        $kecamatans = $kecamatancontroller->get();
        $banksampahcontroller = new BankSampahController();
        $banksampahs = $banksampahcontroller->get();
        return view('user.edit', compact(
            'data', 
            'users',
            'provinsis',
            'kotas',
            'kecamatans',
            'banksampahs',

        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250',
            'file' => 'nullable|mimes:png,jpg,jpeg',
            'role' => 'required',
            'point' => 'required',
            'bank_id' => 'required',
            'provinsi_id' => 'required',
            'kota_id' => 'required',
            'kecamatan_id' => 'required',
        ]);

        $data = User::findByUuid($id);

        if(isset($request->file)){
            $name = 'User'.time().'.'.request()->file->getClientOriginalExtension();
            request()->file->move(public_path('images/avatar'), $name);

            $request->merge(
                [
                    'photo' => $name
                ]);
        }

        if($data->update($request->all())){
            return redirect('user');
        }

        return redirect()->route('user.edit', $data)->withErrors('Sesuatu Error Terjadi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findByUuid($id);

        if(!isset($data->id)){
            return redirect()->route('user.index')->withErrors('Data Tidak Ada / Sudah Dihapus');
        }

        if($data->delete()){
            return redirect('user')->withSuccess('Sukses Menghapus Data');;
        }

        return redirect()->route('user.index')->withErrors('Sesuatu Error Terjadi');
    }
}
