<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JenisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jenis' => $this->faker->word(),
        ];
    }
}
