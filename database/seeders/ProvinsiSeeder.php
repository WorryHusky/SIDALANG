<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provinsis')->delete();

        $data = [

            ['id' => 1, 'nm_provinsi' => 'Aceh'],
            ['id' => 2, 'nm_provinsi' => 'Sumatera Utara'],
            ['id' => 3, 'nm_provinsi' => 'Sumatera Barat'],
            ['id' => 4, 'nm_provinsi' => 'Riau'],
            ['id' => 5, 'nm_provinsi' => 'Jambi'],
            ['id' => 6, 'nm_provinsi' => 'Sumatera Selatan'],
            ['id' => 7, 'nm_provinsi' => 'Bengkulu'],	
            ['id' => 8, 'nm_provinsi' => 'Lampung'],
            ['id' => 9, 'nm_provinsi' => 'Kepulauan Bangka Belitung'],
            ['id' => 10, 'nm_provinsi' => 'Kepulauan Riau'],
            ['id' => 11, 'nm_provinsi' => 'DKI Jakarta'],
            ['id' => 12, 'nm_provinsi' => 'Jawa Barat'],
            ['id' => 13, 'nm_provinsi' => 'Jawa Tengah'],
            ['id' => 14, 'nm_provinsi' => 'DI Yogyakarta'],
            ['id' => 15, 'nm_provinsi' => 'Jawa Timur'],
            ['id' => 16, 'nm_provinsi' => 'Banten'],
            ['id' => 17, 'nm_provinsi' => 'Bali'],
            ['id' => 18, 'nm_provinsi' => 'Nusa Tenggara Barat'],
            ['id' => 19, 'nm_provinsi' => 'Nusa Tenggara Timur'],
            ['id' => 20, 'nm_provinsi' => 'Kalimantan Barat'],
            ['id' => 21, 'nm_provinsi' => 'Kalimantan Tengah'],
            ['id' => 22, 'nm_provinsi' => 'Kalimantan Selatan'],
            ['id' => 23, 'nm_provinsi' => 'Kalimantan Timur'],
            ['id' => 24, 'nm_provinsi' => 'Kalimantan Utara'],
            ['id' => 25, 'nm_provinsi' => 'Sulawesi Utara'],
            ['id' => 26, 'nm_provinsi' => 'Sulawesi Tengah'],
            ['id' => 27, 'nm_provinsi' => 'Sulawesi Selatan'],
            ['id' => 28, 'nm_provinsi' => 'Sulawesi Tenggara'],
            ['id' => 29, 'nm_provinsi' => 'Gorontalo'],
            ['id' => 30, 'nm_provinsi' => 'Sulawesi Barat'],
            ['id' => 31, 'nm_provinsi' => 'Maluku'],
            ['id' => 32, 'nm_provinsi' => 'Maluku Utara'],
            ['id' => 33, 'nm_provinsi' => 'Papua Barat'],
            ['id' => 34, 'nm_provinsi' => 'Papua'],
        ];

        foreach ($data as $value) {
            Provinsi::create($value);
        }
    }
}
