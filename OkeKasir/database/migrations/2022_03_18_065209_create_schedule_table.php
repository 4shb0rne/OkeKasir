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
        Schema::create('schedule', function (Blueprint $table) {
            $table->id("scheduleid");
            $table->integer("userid")->references('users')->on('transaction_header')->onUpdate('cascade')->onDelete('cascade');
            $table->string("scheduleTitle");
            $table->string("scheduledescription");
            $table->date("scheduledate");
            $table->string("schedulestatus");
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
        Schema::dropIfExists('schedule');
    }
};
