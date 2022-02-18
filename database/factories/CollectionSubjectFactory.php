<?php

namespace Database\Factories;

use App\Models\Collection;
use App\Models\Ebook;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollectionSubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'collection_id' => Collection::factory(),
            'subject_id' => Subject::factory(),
        ];
    }
}
