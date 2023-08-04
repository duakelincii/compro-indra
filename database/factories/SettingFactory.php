<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_web' => $this->faker->text(10),
            'alamat' => $this->faker->address(),
            'logo' => $this->faker->text(),
            'meta_keyword' => $this->faker->text(),
            'meta_desc' => $this->faker->text(),
            'desc' => $this->faker->text(),
        ];
    }
}
