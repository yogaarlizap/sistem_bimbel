<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class SiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kelas = ['TK', 'SD', 'SMP', 'SMA'];
        return [
            "nama" => $this->faker->name(),
            "alamat" => $this->faker->address(),
            "no_telpon" => $this->faker->phoneNumber(),
            "email" => $this->faker->email(),
            "nama_orang_tua" => $this->faker->name(),
            "no_telpon_ortu" => $this->faker->phoneNumber(),
            "kelas" => Arr::random($kelas),
        ];
    }
}
