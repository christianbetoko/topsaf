<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InscriptionFormationResource\Pages;
use App\Models\InscriptionFormation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\ViewAction;

class InscriptionFormationResource extends Resource
{
    protected static ?string $model = InscriptionFormation::class;
    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $modelLabel = 'Inscriptions-Formations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Détails de l\'inscription')
                    ->schema([
                        Forms\Components\TextInput::make('prenom'),
                        Forms\Components\TextInput::make('nom'),
                        Forms\Components\TextInput::make('postnom'),
                        Forms\Components\TextInput::make('sexe'),
                        Forms\Components\DatePicker::make('date_naissance'),
                        Forms\Components\TextInput::make('email'),
                        Forms\Components\TextInput::make('telephone'),
                        Forms\Components\TextInput::make('adresse')->columnSpanFull(),
                        Forms\Components\Select::make('formation_id')
                            ->relationship('formation', 'title') // Modifié ici : title
                            ->preload()
                            ->searchable(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')
                    ->label('Nom Complet')
                    ->formatStateUsing(fn ($record) => "{$record->prenom} {$record->nom} {$record->postnom}")
                    ->searchable(['prenom', 'nom', 'postnom']),
                Tables\Columns\TextColumn::make('formation.title') // Modifié ici : title
                    ->label('Formation')
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Inscrit le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('formation')
                    ->relationship('formation', 'title'), // Modifié ici : title
            ])
            ->actions([
                ViewAction::make(),
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
            'index' => Pages\ListInscriptionFormations::route('/'),
            'view' => Pages\ViewInscriptionFormation::route('/{record}'),
        ];
    }
}