<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BukuKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BukuKategori::factory(10)->create();

    }
}
