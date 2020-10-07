<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('fakultas');
            $table->string('topik');
            $table->text('deskripsi');
            $table->string('narasumber');
            $table->dateTime('jadwal');
            $table->string('pic');
            $table->timestamp('batas_pendaftaran');
            $table->integer('kuota');
            $table->timestamps();
        });

        Schema::create('user_webinar', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('webinar_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->unique(['webinar_id', 'user_id']);

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('webinar_id')->references('id')->on('webinars')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinars');
    }
}
