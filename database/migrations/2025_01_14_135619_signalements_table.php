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
        Schema::create('signalements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('photo_url')->nullable();
            $table->enum('categorie', ['plastique', 'organique', 'general', 'encombrants'])->default('general');
            $table->enum('statut', ['en_attente', 'en_cours', 'collecte'])->default('en_attente');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('signalements');
    }
};
