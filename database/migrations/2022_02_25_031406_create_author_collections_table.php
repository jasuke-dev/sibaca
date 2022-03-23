<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_collections', function (Blueprint $table) {
            $table->id();
            $table  ->foreignId('author_id')
                    ->nullable()
                    ->constrained()
                    ->nullOnDelete();
            $table  ->foreignUuid('collection_id')
                    ->nullable()
                    ->constrained()
                    ->cascadeOnDelete();
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
        Schema::dropIfExists('author_collections');
    }
}
