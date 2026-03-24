<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Formation;
use Livewire\WithPagination;
use Filament\Forms\Form;
#[Title('Formations - TOP SANTÉ FUKANG')]
class Formations extends Component
{
     use WithPagination; // 2. Utiliser le trait
      protected $paginationTheme = 'bootstrap';
    public function render()
    {
         $paginate=4;
         Carbon::setLocale('fr');
         $formations=Formation::orderBy('title','ASC')->where('is_active',true)->paginate($paginate);
        return view('livewire.formations',compact('formations'));
    }
}
