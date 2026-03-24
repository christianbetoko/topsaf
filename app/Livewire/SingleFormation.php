<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\Formation;
#[Title('Formation - TOP SANTÉ FUKANG')]
class SingleFormation extends Component
{
     
    public $slug;



    public function mount( $slug){
       
        $this->slug = $slug;
    }
    public function render()
    {
           Carbon::setLocale('fr');
            $formation=Formation::where('slug',$this->slug)->firstOrFail();
        return view('livewire.formation', compact('formation'));
    }
}
