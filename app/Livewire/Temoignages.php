<?php

namespace App\Livewire;
use Carbon\Carbon;
use App\Models\Temoignage;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
#[Title('Témoignages - TOP SANTÉ FUKANG')]
class Temoignages extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
         $paginate=6;
         Carbon::setLocale('fr');
         $temoignages = Temoignage::where('is_active', true)->paginate($paginate);
        return view('livewire.temoignages', compact('temoignages'));
    }
}
