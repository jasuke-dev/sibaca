<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Ebook::factory(5)->create();
    }
}
