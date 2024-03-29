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
        Schema::create('sugargliders', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->boolean('kelamin')->nullable();
            $table->date('oop')->nullable();
            $table->string('warna')->nullable();
            $table->string('jenis')->nullable();
            $table->string('genetika')->nullable();
            $table->text('fenotype')->nullable();
            $table->string('indukan_betina')->nullable();
            $table->string('indukan_jantan')->nullable();
            $table->string('gambar')->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id');
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
        Schema::dropIfExists('sugargliders');
    }
};
