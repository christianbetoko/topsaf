<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Enterprise;
use Livewire\Attributes\Title;
#[Title('À propos - TOP SANTÉ FUKANG')]
class Apropos extends Component
{
    public function render()
    {
        $enterprise = Enterprise::first();
        return view('livewire.apropos', compact('enterprise'));
    
    }
}
