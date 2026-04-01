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
        Schema::create('inscription_conferences', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->string('postnom');
            $table->string('sexe');
           
            $table->string('email',191)->unique();
            $table->string('telephone',191)->unique();
            $table->string('adresse');
            $table->string('code_parrain')->nullable();
            $table->foreignId('conference_id')->constrained()->onDelete('cascade');
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscription_conferences');
    }
};
