<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\Enterprise;
use App\Models\HistoryPhoto;
#[Title('Historique - TOP SANTÉ FUKANG')]
class History extends Component
{
    public function render()
    {
         Carbon::setLocale('fr');
        $enterprise = Enterprise::first();
        $historyPhotos = HistoryPhoto::orderBy('created_at', 'asc')->where('is_active', true)->get();
        return view('livewire.history', compact('enterprise', 'historyPhotos'));
    }
}
