<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_negara');
            $table->string('jumlah_positif');
            $table->string('jumlah_sembuh');
            $table->string('jumlah_meninggal');
            $table->date('tanggal');
            $table->timestamps();
            $table->foreign('id_negara')->references('id')
            ->on('dunias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasuses');
    }
}
