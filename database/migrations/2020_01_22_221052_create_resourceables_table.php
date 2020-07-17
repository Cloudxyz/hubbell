<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('resourceables')) {
            return;
        }

        Schema::create('resourceables', function (Blueprint $table) {
            $table->increments('id');
            $table->text('resource_id');
            $table->integer('resourceable_id')->index()->unsigned();
            $table->string('resourceable_type');

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
        Schema::dropIfExists('resourceables');
    }
}
