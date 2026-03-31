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
        Schema::create('inscription_formations', function (Blueprint $table) {
            $table->id();
          
            $table->string('prenom');
            $table->string('nom');
            $table->string('postnom');
            $table->string('sexe');
            $table->date('date_naissance')->nullable();
            $table->string('email',191)->unique();
            $table->string('telephone',191)->unique();
            $table->string('adresse');
            $table->foreignId('formation_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscription_formations');
    }
};
