<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('slug', 50)->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('has_products')->nullable();
            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('categories')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('categories');
    }
}
