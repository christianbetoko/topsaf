<?php

namespace App\Filament\Resources\HistoryPhotoResource\Pages;

use App\Filament\Resources\HistoryPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHistoryPhoto extends EditRecord
{
    protected static string $resource = HistoryPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
