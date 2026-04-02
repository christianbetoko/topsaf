<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Carbon\Carbon;
use App\Models\Event;

#[Title('Événement - TOP SANTÉ FUKANG')]
class Evenement extends Component
{
    public $slug;



    public function mount( $slug){
       
        $this->slug = $slug;
    }
    public function render()
    {
           Carbon::setLocale('fr');
            $event=Event::where('slug',$this->slug)->firstOrFail();
        return view('livewire.evenement', compact('event'));
    }
}
