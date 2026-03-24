<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialResource\Pages;
use App\Models\Social;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\IconColumn;

class SocialResource extends Resource
{
    protected static ?string $model = Social::class;

    protected static ?string $navigationIcon = 'heroicon-o-share';
    
    protected static ?string $navigationLabel = 'Réseaux Sociaux';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Lien de Réseau Social')
                    ->description('Configurez vos liens vers les plateformes sociales.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom de la plateforme')
                            ->placeholder('Ex: Facebook, LinkedIn, X')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('url')
                            ->label('URL du profil')
                            ->url() // Valide que c'est un lien correct
                            ->placeholder('https://...')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('icon')
                            ->label('Classe de l\'icône')
                            ->placeholder('Ex: fab fa-facebook ou heroicon-o-user')
                            ->helperText('Utilisez des classes FontAwesome ou Heroicons selon votre front-end.')
                            ->maxLength(255),

                        Toggle::make('is_active')
                            ->label('Activer le lien')
                            ->default(true)
                            ->inline(false),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nom')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('url')
                    ->label('Lien URL')
                    ->limit(30)
                    ->copyable(),

                TextColumn::make('icon')
                    ->label('Icône')
                    ->badge()
                    ->color('gray'),

                ToggleColumn::make('is_active')
                    ->label('Statut (Actif)'),

                TextColumn::make('created_at')
                    ->label('Ajouté le')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Filtrer par statut')
                    ->placeholder('Tous')
                    ->trueLabel('Actifs uniquement')
                    ->falseLabel('Inactifs uniquement'),
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
            'index' => Pages\ListSocials::route('/'),
            'create' => Pages\CreateSocial::route('/create'),
            'edit' => Pages\EditSocial::route('/{record}/edit'),
        ];
    }
}