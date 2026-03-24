<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Social;
use App\Models\ContactInfo;
use App\Models\Enterprise;
class Footer extends Component
{
    public function render()
    {
        $socials = Social::where('is_active', true)->get();
        $contactInfo = ContactInfo::first();
        $enterprise = Enterprise::first();
        return view('livewire.components.footer', compact('socials', 'contactInfo', 'enterprise'));
    }
}
