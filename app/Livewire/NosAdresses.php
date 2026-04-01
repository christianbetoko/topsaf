<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Carbon\Carbon;
use App\Models\Address;
#[Title('Nos adresses - TOP SANTÉ FUKANG')]
class NosAdresses extends Component
{
    public function render()
    {
         Carbon::setLocale('fr');
         $addresses = Address::where('is_active', true)->get();
        return view('livewire.nos-adresses', compact('addresses'));
    }
}
