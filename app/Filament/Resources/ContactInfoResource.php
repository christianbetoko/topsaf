<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactInfoResource\Pages;
use App\Models\ContactInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;

class ContactInfoResource extends Resource
{
    protected static ?string $model = ContactInfo::class;

    // Icône qui apparaîtra dans le menu latéral
    protected static ?string $navigationIcon = 'heroicon-o-identification';
    
    // Libellé dans le menu
    protected static ?string $navigationLabel = 'Infos de Contact';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Coordonnées')
                    ->description('Remplissez les informations de contact ci-dessous.')
                    ->schema([
                        TextInput::make('address')
                            ->label('Adresse physique')
                            ->placeholder('Ex: 123 Rue de l\'Exemple, Paris')
                            ->maxLength(255),

                        TextInput::make('phone')
                            ->label('Numéro de téléphone')
                            ->tel() // Optimise le clavier sur mobile
                            ->placeholder('+33 6 00 00 00 00'),

                        TextInput::make('email')
                            ->label('Adresse Email')
                            ->email() // Validation format email
                            ->placeholder('contact@exemple.com')
                            ->maxLength(255),
                    ])
                    ->columns(2), // Organise en 2 colonnes sur grand écran
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('address')
                    ->label('Adresse')
                    ->searchable()
                    ->limit(50),

                TextColumn::make('phone')
                    ->label('Téléphone')
                    ->copyable() // Permet de copier d'un clic
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->icon('heroicon-m-envelope')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Ajoute des filtres ici si nécessaire
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactInfos::route('/'),
            'create' => Pages\CreateContactInfo::route('/create'),
            'edit' => Pages\EditContactInfo::route('/{record}/edit'),
        ];
    }
}