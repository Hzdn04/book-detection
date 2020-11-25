<?php

namespace Database\Factories;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Buku::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_kategori' => $this->faker->numberBetween(1,5),
            'kode_barcode' => $this->faker->numberBetween(100000, 100500),
            'nama_buku' => $this->faker->sentence(3),
            'tempat_terbit' => $this->faker->address,
            'penerbit' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'penulis' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'tahun_terbit' => 2020,
            'editor' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'total_halaman' => $this->faker->numberBetween(100, 500),
            'tempat_buku' => 'RAK 1 No 38',
            'buku_tersedia' => '10',
            'gambar' => 'gambar.jpg',
        ];
    }
}
