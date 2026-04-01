<?php

namespace App\Livewire;

namespace App\Livewire;
use Livewire\Attributes\Title;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\Conference;
 use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
#[Title('Inscription - Conférence - TOP SANTÉ FUKANG')]

class InscriptionConference extends Component
{
    public $slug;



    public function mount( $slug){
       
        $this->slug = $slug;
    }

    public $prenom;
    public $nom;
    public $postnom;
    public $sexe;
    public $email;
    public $telephone;
    public $adresse;
    public $code_parrain;

    protected $rules=[
    'nom'=>'required|string|max:255',
    'prenom'=>'required|string|max:255',
    'postnom'=>'nullable|string|max:255',
    'sexe'=>'required|in:Masculin,Féminin',
    
    'email'=>'required|email|unique:inscription_formations,email',
    'telephone'=>'required|string|max:20|unique:inscription_formations,telephone',
    'adresse'=>'required|string|max:255',
    'code_parrain'=>'nullable|string|max:255',
];
public function submitForm(){
    $this->validate();
    $conference=Conference::where('slug',$this->slug)->firstOrFail();
    $conference->inscriptions()->create([
        'prenom'=>$this->prenom,
        'nom'=>$this->nom,
        'postnom'=>$this->postnom,
        'sexe'=>$this->sexe,
        'email'=>$this->email,
        'telephone'=>$this->telephone,
        'adresse'=>$this->adresse,
        'code_parrain'=>$this->code_parrain,
    ]);
    $this->reset(['prenom','nom','postnom','sexe','email','telephone','adresse','code_parrain']);
    LivewireAlert::title('Informations envoyés avec succès')
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
          $conference=Conference::where('slug',$this->slug)->firstOrFail();
        return view('livewire.inscription-conference', compact('conference'));
    }
}
