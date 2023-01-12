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
        Schema::create('shelters', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode');
            $table->string('alamat')->nullable();
            $table->char('gmaps', 255)->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id');
            $table->string('image')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('shelters');
    }
};
