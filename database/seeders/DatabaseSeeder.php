<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Faskes;
use App\Models\FaskesVaksin;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\User;
use App\Models\Vaksin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::statement("SET foreign_key_checks=0");
        Kota::truncate();
        Provinsi::truncate();
        User::truncate();
        DB::statement("SET foreign_key_checks=1");


        $this->call(UserSeeder::class);
        $this->call(ProvinsiSeeder::class);
        $this->call(KotaSeeder::class);
        $this->call(KecamatanSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin',
        //     'level' => 'admin',
        //     'password' => bcrypt('admin'),
        // ]);
    }
}
