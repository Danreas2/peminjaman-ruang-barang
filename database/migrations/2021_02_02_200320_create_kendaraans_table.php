<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_kendaraan');
            $table->enum('jenis', ['motor', 'mobil']);
            $table->enum('kondisi', ['baik', 'rusak']);
            $table->enum('ada', ['ada', 'dipinjam', 'diperbaiki']);
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
        Schema::dropIfExists('kendaraans');
    }
}
