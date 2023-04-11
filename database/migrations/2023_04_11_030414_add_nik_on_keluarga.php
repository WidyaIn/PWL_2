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
        Schema::dropIfExists('keluarga');
        Schema::create('keluarga', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 10)->unique();
            $table->string('nama', 50);
            $table->string('kota_kelahiran', 25);
            $table->string('status', 25);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
