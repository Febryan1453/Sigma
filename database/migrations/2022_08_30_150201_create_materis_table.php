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
        Schema::create('materis', function (Blueprint $table) {
            $table->string('id')->primary()->unique();
            $table->string('dosen')->nullable();
            $table->string('nama_materi')->nullable();
            $table->string('rincian_materi')->nullable();
            $table->string('tgl_materi')->nullable();
            $table->string('link_materi')->nullable();
            $table->string('jurusan')->nullable();
            $table->text('hasil')->nullable();
            $table->text('hambatan')->nullable();
            $table->text('solusi')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('materis');
    }
};
