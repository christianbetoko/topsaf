<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Carbon\Carbon;
use App\Models\Enterprise;
 use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
#[Title('Contact - TOP SANTÉ FUKANG')]
class Contact extends Component
{

        public $name;
    public $email;
    public $subject;
    public $message;
    public function submitForm()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

       

        // Reset form fields
        $this->reset(['name', 'email', 'subject', 'message']);
          LivewireAlert::title('Message envoyé avec succès')
        ->success()
        ->withOptions([
            'background' => '#E8F5E9', // Couleur de fond vert très clair (exemple)
            'confirmButtonColor' => '#6F00FF', // Couleur du bouton de confirmation (vert, exemple)
            'color' => '#2600FF',
             'customClass' => [
                'popup' => 'custom-success-popup', // Classe pour le conteneur principal de l'alerte
                'icon' => 'custom-success-icon',   // Classe pour l'icône de succès elle-même
            ],
             // Couleur du texte du titre et du message (vert foncé, exemple)
        ])

        ->show();
    }
    public function render()
    {
            Carbon::setLocale('fr');
            $enterprise = Enterprise::first();
        return view('livewire.contact', compact('enterprise'));
    }
}
