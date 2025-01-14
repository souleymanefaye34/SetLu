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
        Schema::create('collectes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('signalement_id')->constrained('signalements')->onDelete('cascade');
            $table->foreignId('collecteur_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->timestamp('date_collecte')->nullable();
            $table->enum('statut', ['terminee', 'echec'])->default('terminee');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('collectes');
    }
};
