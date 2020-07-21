<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopHasTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_has_type', function (Blueprint $table) {
            $table->integer('shop_id')->unsigned();
            $table->integer('type_id')->unsigned();

            $table->unique(['shop_id', 'type_id']);
            $table->foreign('shop_id')->references('id')->on('shops')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('type_id')->references('id')->on('shops_types')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_has_type');
    }
}
