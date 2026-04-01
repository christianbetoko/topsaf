<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Conference;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
#[Title('Conférences et BBS - TOP SANTÉ FUKANG')]

class Conferences extends Component
{
     use WithPagination; // 2. Utiliser le trait
      protected $paginationTheme = 'bootstrap';
    public function render()
    {
         $paginate=4;
            Carbon::setLocale('fr');
           $conferences = Conference::where('is_active', true)
            ->where('_date', '>=', now()->toDateString()) // Filtre : Date aujourd'hui ou dans le futur
            ->orderBy('_date', 'ASC') // ASC pour voir la conférence la plus proche en premier
            ->paginate($paginate);
        return view('livewire.conferences', compact('conferences'));
    }
}
