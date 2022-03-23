<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_subjects', function (Blueprint $table) {
            $table  ->id();
            $table  ->foreignUuid('collection_id')
                    ->nullable()
                    ->constrained()
                    ->cascadeOnDelete();
            $table  ->foreignId('subject_id')
                    ->nullable()
                    ->constrained()
                    ->nullOnDelete();
            $table  ->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_subject');
    }
}
