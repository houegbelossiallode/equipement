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
        Schema::create('informationproduits', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Le nom du produit
            $table->json('informations'); // Colonne pour stocker les informations en JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informationproduits');
    }
};