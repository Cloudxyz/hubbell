<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('imageables')) {
            return;
        }

        Schema::create('imageables', function (Blueprint $table) {
            $table->increments('id');
            $table->text('image_id');
            $table->integer('imageable_id')->index()->unsigned();
            $table->string('imageable_type');

            $table->timestamps = false;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imageables');
    }
}
