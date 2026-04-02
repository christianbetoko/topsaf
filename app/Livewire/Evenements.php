<?php

namespace App\Livewire;
namespace App\Livewire;
use Carbon\Carbon;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Event;
#[Title('Revivez nos événements - TOP SANTÉ FUKANG')]
class Evenements extends Component
{
     use WithPagination; // 2. Utiliser le trait
      protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $paginate=6;
         Carbon::setLocale('fr');
            $events=Event::orderBy('created_at','DESC')->where('is_active',true)->paginate($paginate);
        return view('livewire.evenements', compact('events'));
    }
}
