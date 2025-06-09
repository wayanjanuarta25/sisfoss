<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('personels', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('pangkat');
            $table->string('nrp')->unique();
            $table->string('matra');
            $table->string('corps');
            $table->date('tmt_tni');
            $table->date('tmt_jabatan');
            $table->string('jabatan');
            $table->string('satuan_pelaksana');
            $table->string('foto')->nullable(); // path ke foto
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personels');
    }
};
