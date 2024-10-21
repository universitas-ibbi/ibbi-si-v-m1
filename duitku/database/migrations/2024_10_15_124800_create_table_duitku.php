<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_duitku', function (Blueprint $table) {
            $table->id();
            $table->string("keteragan");
            $table->integer("type");
            $table->decimal("nominal", 15, 2);
            $table->date("tanggal");
            $table->timestamps();
        });
    }

    "INSERT INTO TBLUSER(NIM,NAMA) VALUES('123','JOKO')";

    "SELECT FROM TBLUNSER WHERE NIM=123"

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_duitku');
    }
};
