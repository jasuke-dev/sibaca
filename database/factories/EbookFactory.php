<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class EbookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'isbn_issn_doi' => $this->faker->ean13(),
            'title' => $this->faker->name(),
            'publish_year' => $this->faker->year(),
            'abstract' => $this->faker->paragraph(),
            'path_cover' => $this->faker->sentence(),
            'path_file' => $this->faker->sentence(),
            'type_id' => Type::factory(),
            'language_id' => Language::factory(),
        ];
    }
}
