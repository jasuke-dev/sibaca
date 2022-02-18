<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CollectionSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CollectionSubject::factory(5)->create();
    }
}
