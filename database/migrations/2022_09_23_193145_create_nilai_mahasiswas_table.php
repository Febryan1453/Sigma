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
        Schema::create('nilai_mahasiswas', function (Blueprint $table) {
            $table->string('id')->primary()->unique();
            $table->string('hasil_tugas_id')->nullable();
            $table->string('tugas_id')->nullable();
            $table->string('mahasiswa_id')->nullable();
            $table->integer('nilai')->nullable();
            $table->string('grade')->nullable();
            $table->string('jurusan')->nullable();
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
        Schema::dropIfExists('nilai_mahasiswas');
    }
};
