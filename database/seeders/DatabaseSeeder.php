<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Merek;
use App\Models\Produk;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'nama' => 'Mahdi',
            'nohp' => '132313',
            'iduser' => '132313',
            'alamat' => 'jalan karya jaya',
            'email' => 'mahdi@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => 1
        ]);
        User::create([
            'nama' => 'adel',
            'nohp' => '132313',
            'iduser' => '132313',
            'alamat' => 'jalan karya jaya',
            'email' => 'adel@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => 0
        ]);

        Produk::factory(20)->create();
        Category::factory(3)->create();
        Merek::factory(5)->create();
    }
}
