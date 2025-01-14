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
        Schema::create('utilisateur_recompenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->foreignId('recompense_id')->constrained('recompenses')->onDelete('cascade');
            $table->timestamp('echange_le')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('utilisateur_recompenses');
    }
};
