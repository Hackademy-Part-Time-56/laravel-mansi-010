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
        //name, stringa
        //pages, intero
        //year, intero
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); //obbligatorio
            $table->integer('pages'); //obbligatorio
            $table->integer('year')->nullable(); // facolativo perche specificato

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
