<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\CategoryProduct;
use Livewire\Component;
use Livewire\WithPagination;

class Produits extends Component
{
    use WithPagination;

    public $activeCategory = '*'; // Filtre par défaut (Tous)

    /**
     * Change la catégorie active et réinitialise la pagination
     */
    public function setCategory($slug)
    {
        $this->activeCategory = $slug;
        $this->resetPage();
    }

    public function render()
    {
        $categories = CategoryProduct::all();

        $products = Product::query()
            ->where('is_active', true)
            ->when($this->activeCategory !== '*', function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->where('slug', $this->activeCategory);
                });
            })
            ->latest()
            ->get(); // On utilise get() ici car votre template semble utiliser une grille JS (CubePortfolio)

        return view('livewire.produits', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}