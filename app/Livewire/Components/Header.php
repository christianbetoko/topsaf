<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\ContactInfo;
use App\Models\Enterprise;
class Header extends Component
{
    public function render()
    {
        $contactInfo = ContactInfo::first();
        $enterprise = Enterprise::first();

        return view('livewire.components.header', compact('contactInfo', 'enterprise'   ));
    }
}
