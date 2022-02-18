<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('isbn_issn_doi')->unique();
            $table->string('title');
            $table->string('publish_year');
            $table->text('abstract');
            $table->string('path_cover');
            $table->string('path_file');
            $table->foreignId('type_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();
            $table->foreignId('language_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();
            $table->foreignId('author_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
