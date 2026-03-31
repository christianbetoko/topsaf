<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\Formation;
 use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
#[Title('Formation - TOP SANTÉ FUKANG')]
class InscriptionFormation extends Component
{
    public $slug;



    public function mount( $slug){
       
        $this->slug = $slug;
    }
public $nom;
public $prenom;
public $postnom;
public $sexe;
public $date_naissance;
public $email;
public $telephone;
public $adresse;


protected $rules=[
    'nom'=>'required|string|max:255',
    'prenom'=>'required|string|max:255',
    'postnom'=>'nullable|string|max:255',
    'sexe'=>'required|in:Masculin,Féminin',
    'date_naissance'=>'nullable|date',
    'email'=>'required|email|unique:inscription_formations,email',
    'telephone'=>'required|string|max:20|unique:inscription_formations,telephone',
    'adresse'=>'required|string|max:255',
];
public function submitForm(){
    $this->validate();
    $formation=Formation::where('slug',$this->slug)->firstOrFail();
    $formation->inscriptions()->create([
        'nom'=>$this->nom,
        'prenom'=>$this->prenom,
        'postnom'=>$this->postnom,
        'sexe'=>$this->sexe,
        'date_naissance'=>$this->date_naissance,
        'email'=>$this->email,
        'telephone'=>$this->telephone,
        'adresse'=>$this->adresse,
    ]);
   
$this->reset(['nom','prenom','postnom','sexe','date_naissance','email','telephone','adresse']);
    
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
          $formation=Formation::where('slug',$this->slug)->firstOrFail();
        return view('livewire.inscription-formation', compact('formation'));
    }
}
