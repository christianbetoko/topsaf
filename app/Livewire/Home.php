<?php

namespace App\Livewire;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Slide;
#[Title('Accueil - TOP SANTÉ FUKANG')]
class Home extends Component
{
    public function render()
    {
        Carbon::setLocale('fr');
         $slides = Slide::where('is_active', true)->get();
         
         return view('livewire.home', compact('slides'));   
      
    }
}
