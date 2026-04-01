<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Carbon\Carbon;
use App\Models\Product;

#[Title('Produit - TOP SANTÉ FUKANG')]
class Produit extends Component
{
     public $slug;



    public function mount( $slug){
       
        $this->slug = $slug;
    }
    public function render()
    {
        Carbon::setLocale('fr');
            $produit=Product::where('slug',$this->slug)->firstOrFail();
        return view('livewire.produit', compact('produit'));
    }
}
