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
            $table->string('inventory_code')->nullable();
            $table->string('isbn_issn_doi')->unique()->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('abstract')->nullable();
            $table->string('classification')->nullable();
            $table->string('title_code')->nullable();
            $table->string('author_code')->nullable();
            $table->string('volume')->nullable();
            $table->string('edition')->nullable();
            $table->string('collation')->nullable();
            $table->string('year_of_procurement')->nullable();
            $table->string('publish_year')->nullable();
            $table->string('publish_city')->nullable();
            $table->string('price')->nullable();
            $table->string('path_cover')->nullable();
            $table->string('path_file')->nullable();
            $table->foreignId('type_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();
            $table->foreignId('language_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();
            $table->foreignId('publisher_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();
            $table->foreignId('procurement_id')
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
