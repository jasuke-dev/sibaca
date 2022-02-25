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
        \App\Models\Publisher::factory(5)->create();
        \App\Models\User::factory(5)->create();
        \App\Models\Type::factory(5)->create();
        \App\Models\Language::factory(5)->create();
        // \App\Models\Procurement::factory(5)->create();
        // \App\Models\Author::factory(5)->create();           
        // \App\Models\Subject::factory(5)->create();
        // \App\Models\UserCollection::factory(5)->create(); 
    }
}
