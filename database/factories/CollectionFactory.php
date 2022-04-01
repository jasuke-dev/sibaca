<?php

namespace Database\Factories;

use App\Models\Type;
use App\Models\Author;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollectionFactory extends Factory
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
            'path_cover' => 'public/files/covers/0xjpWzngfZdaIZVb3dPqvHK3bXIxDpQN6Dd91V2z.png',
            'path_file' => 'public/files/ebooks/aXtMu0H3juK2aJOsXmCMG1JKes8KfLrTQvIed7DB.pdf',
            'type_id' => Type::factory(),
            'language_code' => Language::factory(),
        ];
    }
}
