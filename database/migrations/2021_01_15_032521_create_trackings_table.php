<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_rw');
            $table->integer('jumlah_positif');
            $table->integer('jumlah_sembuh');
            $table->integer('jumlah_meninggal');
            $table->date('tanggal');
            $table->timestamps();
            $table->foreign('id_rw')->references('id')
            ->on('rws')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trackings');
    }
}
