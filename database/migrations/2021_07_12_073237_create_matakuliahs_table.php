<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatakuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('matakuliahs');
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->id();
            $table->string("nama_matkul");
            $table->integer("sks");
            $table->unsignedBigInteger("pengajar");            
            $table->timestamps();
            $table->foreign("pengajar")->references("kode_dosen")->on("dosens");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matakuliahs');
    }
}
