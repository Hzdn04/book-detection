<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElements(['male', 'female'])[0];
        $date = $this->faker->dateTimeBetween('+1 week', '+1 month');

        return [
            'id' => rand(1000,1000000),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'jenis_kelamin' => $gender,
            'tempat_lahir' => 'malang',
            'tanggal_lahir' => $date,
            'jurusan' => 'Teknik Informatika',
            'level' => 'admin',
            'remember_token' => Str::random(10),
        ];
    }
}
