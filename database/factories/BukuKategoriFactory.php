<?php

namespace Database\Factories;

use App\Models\BukuKategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuKategoriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BukuKategori::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_kategori' => $this->faker->sentence(3)
        ];
    }
}
