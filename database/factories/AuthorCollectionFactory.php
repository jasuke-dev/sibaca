<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorCollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => Subject::factory(),
            'collection_id' => Collection::factory(),
        ];
    }
}
