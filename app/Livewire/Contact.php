<?php
namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Enterprise;
use App\Models\ContactMessage;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Contact - TOP SANTÉ FUKANG')]
class Contact extends Component
{
    public $name, $email, $subject, $message;

    public function submitForm()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // 1. Enregistrement en base de données
        $contact = ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        // 2. Envoi du mail à l'administrateur
        // Remplacez par votre adresse mail de réception
        try {
            Mail::to('contact@topsante-fukang.com')->send(new ContactMessageMail($contact));
        } catch (\Exception $e) {
            // Optionnel : logger l'erreur si le serveur mail échoue
        }

        $this->reset(['name', 'email', 'subject', 'message']);

        LivewireAlert::title('Message envoyé avec succès')
            ->success()
            ->withOptions([
                'background' => '#E8F5E9',
                'confirmButtonColor' => '#6F00FF',
                'color' => '#2600FF',
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