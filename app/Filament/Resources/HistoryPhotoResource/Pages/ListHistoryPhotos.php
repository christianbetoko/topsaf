<?php

namespace App\Filament\Resources\HistoryPhotoResource\Pages;

use App\Filament\Resources\HistoryPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHistoryPhotos extends ListRecords
{
    protected static string $resource = HistoryPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
