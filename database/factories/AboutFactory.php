<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'logo' => $this->faker->text(),
            'desc' => $this->faker->text(1000),
            'visi' => $this->faker->text(1000),
            'misi' => $this->faker->text(1000),
        ];
    }
}
