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
        Schema::create('item', function (Blueprint $table) {
            $table->id("itemid");
            $table->integer("itemcategoryid")->references('itemcategoryid')->on('item_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string("itemname");
            $table->string("itemdescription");
            $table->integer("brutoprice");
            $table->integer("nettoprice");
            $table->integer("itemquantity");
            $table->string("itempicture");
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
        Schema::dropIfExists('item');
    }
};
