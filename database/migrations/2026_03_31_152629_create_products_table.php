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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
           // La solution est ici :
        $table->foreignId('category_product_id')
              ->constrained('category_products') // Lie automatiquement à la table category_products
              ->onDelete('cascade'); // Supprime les produits si la catégorie est supprimée
            $table->string('slug',191)->unique();
            $table->json('images')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('devise', 3);
            $table->integer('stock')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
