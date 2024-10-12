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
        Schema::table('reponses', function (Blueprint $table) {
            $table->dropForeign(['champ_id']);
            $table->dropColumn('champ_id');
            $table->dropColumn('valeur');
            $table->json('valeurs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reponses', function (Blueprint $table) {
            Schema::dropIfExists('branch_id');
        });
    }
};