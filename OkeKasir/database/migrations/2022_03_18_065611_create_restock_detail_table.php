<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restock_details', function (Blueprint $table) {
            $table->id();
            // ->references('id')->on('restock_header')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('restock_id')->references('id')->on('restock_headers');
            $table->integer("itemid")->references('id')->on('items');
            $table->integer("restockquantity");
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
        Schema::dropIfExists('restock_detail');
    }
};
