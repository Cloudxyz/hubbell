<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('resources')) {
            return;
        }

        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_section')->nullable();
            $table->string('slug')->nullable();
            $table->string('extension')->nullable();
            $table->string('file_original_name')->nullable();
            $table->string('file_name')->nullable();
            $table->text('file_path')->nullable();
            $table->text('file_url')->nullable();
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')
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
        Schema::dropIfExists('resources');
    }
}
