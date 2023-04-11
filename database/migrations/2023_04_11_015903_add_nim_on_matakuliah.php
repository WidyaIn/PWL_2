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
        Schema::dropIfExists('matakuliah');
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 10)->unique();
            $table->string('nama_mahasiswa', 50)->nullable();
            $table->string('kelas', 6)->nullable();
            $table->string('matakuliah', 200)->nullable();

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
