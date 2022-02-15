<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();
            $table->string('isbn_issn_doi')->unique();
            $table->string('title');
            $table->string('publish_year');
            $table->text('abstract');
            $table->string('path_cover');
            $table->string('path_file');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('author_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('author_id')->references('id')->on('authors');
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
        Schema::dropIfExists('ebooks');
    }
}
