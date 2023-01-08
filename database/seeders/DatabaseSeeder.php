<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\{User, Barang, BarangKeluar, BarangMasuk, Note};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create();

        User::factory()->create([
          'username' => 'adminGaUtama',
          'email' => 'adminGaUtama@gmail.com',
          'nickname' => 'Admin GaUtama',
          'password' => Hash::make(222),
        ]);

        User::factory()->create([
          'username' => 'icall',
          'email' => 'icall@gmail.com',
          'nickname' => 'Icall',
          'password' => Hash::make(333),
        ]);

        Barang::factory(30)->create();

        BarangKeluar::factory(20)->create();
        BarangMasuk::factory(20)->create();
        
        Note::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
