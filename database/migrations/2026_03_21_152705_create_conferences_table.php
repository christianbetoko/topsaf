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
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
             $table->string('title');
              $table->string('slug',191)->unique();
         $table->string('description')->nullable();
         $table->string('image')->nullable();
          $table->string('video_url')->nullable();

            $table->string('location')->nullable();
           
         
            $table->string('price')->nullable();
          
          
           
           
             
            
             
             $table->date('_date')->nullable();
           

             $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferences');
    }
};
