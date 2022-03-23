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
        Schema::create('restock_detail', function (Blueprint $table) {
            $table->id("restockid")->references('restockid')->on('restock_header')->onUpdate('cascade')->onDelete('cascade');;
            $table->integer("itemid");
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