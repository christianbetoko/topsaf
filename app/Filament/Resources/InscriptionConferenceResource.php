<?php
namespace App\Filament\Resources;

use App\Filament\Resources\InscriptionConferenceResource\Pages;
use App\Models\InscriptionConference;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class InscriptionConferenceResource extends Resource
{
    protected static ?string $model = InscriptionConference::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    protected static ?string $navigationLabel = 'Inscriptions-Conférences';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Détails de l\'inscription')
                    ->description('Toutes les informations sont en lecture seule.')
                    ->schema([
                        Forms\Components\Select::make('conference_id')
                            ->relationship('conference', 'title')
                            ->label('Conférence concernée')
                            ->disabled(),

                        Forms\Components\TextInput::make('code_parrain')
                            ->label('Code Parrain')
                            ->placeholder('Aucun code utilisé')
                            ->disabled(),

                        Forms\Components\TextInput::make('prenom')->label('Prénom')->disabled(),
                        Forms\Components\TextInput::make('nom')->label('Nom')->disabled(),
                        Forms\Components\TextInput::make('postnom')->label('Postnom')->disabled(),
                        Forms\Components\TextInput::make('sexe')->label('Sexe')->disabled(),
                        
                        Forms\Components\TextInput::make('email')->label('Email')->disabled(),
                        Forms\Components\TextInput::make('telephone')->label('Téléphone')->disabled(),
                        
                        Forms\Components\Textarea::make('adresse')
                            ->label('Adresse de résidence')
                            ->disabled()
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('conference.title')
                    ->label('Conférence')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('full_name')
                    ->label('Nom Complet')
                    ->getStateUsing(fn ($record) => "{$record->prenom} {$record->nom} {$record->postnom}")
                    ->searchable(['prenom', 'nom', 'postnom']),

                Tables\Columns\TextColumn::make('email')
                    ->copyable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('telephone')
                    ->label('Tél.')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date d\'inscription')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('conference')
                    ->relationship('conference', 'title'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(), // Action de vue prioritaire
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
            'index' => Pages\ListInscriptionConferences::route('/'),
            // Note: On retire les routes 'create' et 'edit' si on veut un mode consultation pure
            'view' => Pages\ViewInscriptionConference::route('/{record}'),
        ];
    }
}