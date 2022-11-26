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
            $table->boolean('kelamin');
            $table->date('oop');
            $table->string('warna');
            $table->string('jenis');
            $table->string('genetika')->nullable();
            $table->string('fenotype')->nullable();
            $table->string('indukan_betina');
            $table->string('indukan_jantan');
            $table->string('gambar')->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('shelter_id');
            $table->index('shelter_id');
            $table->boolean('adopsi');
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
        Schema::dropIfExists('sugargliders');
    }
};
