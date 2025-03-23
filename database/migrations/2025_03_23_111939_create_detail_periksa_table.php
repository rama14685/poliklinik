<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPeriksaTable extends Migration
{
    public function up()
    {
        Schema::create('detail_periksa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_periksa')->constrined()->onDelete('cascade');
            $table->foreignId('id_obat')->constrined()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_periksa');
    }
}