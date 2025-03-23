<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatTable extends Migration
{
    public function up()
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat', 50);
            $table->string('kemasan', 50);
            $table->string('harga', 50);
            $table->timestamps();
        });
    }
}