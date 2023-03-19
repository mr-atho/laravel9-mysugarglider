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
        Schema::create('adoption_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('adoption_id');
            $table->foreign('adoption_id')->references('id')->on('adoptions')->onDelete('cascade');
            $table->integer('harga')->nullable();;
            $table->integer('status');
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->index('user_id');
            $table->unsignedBigInteger('shelter_id');
            $table->index('shelter_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adoption_requests');
    }
};
