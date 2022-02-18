<?php

namespace Database\Factories;

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
            'ebook_id' => Ebook::factory(),
            'subject_id' => Subject::factory(),
        ];
    }
}
