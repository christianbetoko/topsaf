<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\Conference;
#[Title('Conférence - TOP SANTÉ FUKANG')]
class SingleConference extends Component
{
     public $slug;



    public function mount( $slug){
       
        $this->slug = $slug;
    }
    public function render()
    {
        Carbon::setLocale('fr');
            $conference=Conference::where('slug',$this->slug)->firstOrFail();
        return view('livewire.single-conference', compact('conference'));
    }
}
