<?php

namespace App\Filament\Resources\InscriptionConferenceResource\Pages;

use App\Filament\Resources\InscriptionConferenceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInscriptionConference extends EditRecord
{
    protected static string $resource = InscriptionConferenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
