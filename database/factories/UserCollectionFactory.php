<?php

namespace Database\Factories;

use App\Models\Collection;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserCollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'collection_id' => Collection::all()->random()->id,
            'created_at' => $this->faker->dateTimeBetween('-10 months','-2 months'),
        ];
    }
}
