<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AuthorCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AuthorCollection::factory(5)->create();
    }
}
