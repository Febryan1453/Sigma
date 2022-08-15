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
        Schema::create('hasil_tugas', function (Blueprint $table) {
            // $table->id();
            // $table->integer('tugas_id')->nullable();
            // $table->integer('mahasiswa_id')->nullable();
            $table->string('id')->primary()->unique();
            $table->string('tugas_id')->nullable();
            $table->string('mahasiswa_id')->nullable();
            $table->string('link_tugas');
            $table->text('kendala');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('hasil_tugas');
    }
};
