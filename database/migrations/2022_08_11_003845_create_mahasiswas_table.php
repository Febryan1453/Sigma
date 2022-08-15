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
        Schema::create('mahasiswas', function (Blueprint $table) {
            // $table->id();
            // $table->integer('user_id')->unique();
            $table->string('id')->primary()->unique();
            $table->string('user_id')->unique();
            $table->string('nim')->unique()->nullable();
            $table->string('name');
            $table->string('tempat_lahir')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('jurusan');
            $table->string('gender');
            $table->string('telp')->nullable();
            $table->string('photo')->nullable();
            $table->text('alasan')->nullable();
            $table->integer('isready')->default(0);
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
        Schema::dropIfExists('mahasiswas');
    }
};
