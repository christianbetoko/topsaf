<?php

namespace App\Livewire;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Slide;
use App\Models\Temoignage;
use App\Models\Enterprise;
use App\Models\Stat;
#[Title('Accueil - TOP SANTÉ FUKANG')]
class Home extends Component
{
    public function render()
    {
        Carbon::setLocale('fr');
         $slides = Slide::where('is_active', true)->get();
         $temoignages = Temoignage::where('is_active', true)->get();
         $stats = Stat::where('is_active', true)->get();
         $enterprise = Enterprise::first();

         
         return view('livewire.home', compact('slides', 'temoignages', 'enterprise', 'stats'));   
      
    }
}
