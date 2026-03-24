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
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
             $table->string('name')->nullable();
                $table->string('about')->nullable();
            $table->string('slogan')->nullable();
            $table->longText('description')->nullable();
            $table->longText('historique')->nullable();
               $table->string('mission')->nullable();
            $table->string('vision')->nullable();
              $table->string('logo')->nullable();
            $table->string('logo_sans_fond')->nullable();
            $table->string('logo2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enterprises');
    }
};
