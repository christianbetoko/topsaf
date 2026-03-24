<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistoryPhotoResource\Pages;
use App\Models\HistoryPhoto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;

class HistoryPhotoResource extends Resource
{
    protected static ?string $model = HistoryPhoto::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';
    
    protected static ?string $navigationLabel = 'Photos Historiques';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Détails de la Photo')
                    ->description('Informations sur l\'événement ou l\'époque de la photo.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Titre / Époque')
                            ->placeholder('Ex: Inauguration du siège social')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Description')
                            ->placeholder('Racontez l\'histoire derrière cette image...')
                            ->rows(3)
                            ->maxLength(255),
                            
                        Toggle::make('is_active')
                            ->label('Afficher dans l\'historique')
                            ->default(true),
                    ])->columnSpan(2),

                Section::make('Média')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Photo historique')
                            ->image()
                          
                            ->imageEditor() // Permet de recadrer l'image directement
                            ->required(),
                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Photo')
                    ->square(),

                TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->label('Description')
                    ->limit(50)
                    ->toggleable(),

                ToggleColumn::make('is_active')
                    ->label('Actif'),

                TextColumn::make('created_at')
                    ->label('Date d\'ajout')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Statut de visibilité'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHistoryPhotos::route('/'),
            'create' => Pages\CreateHistoryPhoto::route('/create'),
            'edit' => Pages\EditHistoryPhoto::route('/{record}/edit'),
        ];
    }
}