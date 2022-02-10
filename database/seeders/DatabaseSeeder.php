<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();
        \App\Models\Type::factory(100)->create();
        \App\Models\Language::factory(100)->create();
        \App\Models\Subject::factory(100)->create();
    }
}
