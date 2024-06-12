<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_inventaris')->unique();
            $table->string('nama_barang');
            $table->integer('id_ruang');
            $table->date('tanggal_pengadaan');
            $table->enum('kondisi', ['baik', 'rusak', 'hilang']);
            $table->enum('status', ['ada', 'dipinjam']);
            $table->integer('jumlah');
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
        Schema::dropIfExists('barangs');
    }
}
