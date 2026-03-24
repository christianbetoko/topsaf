<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnterpriseResource\Pages;
use App\Models\Enterprise;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class EnterpriseResource extends Resource
{
    protected static ?string $model = Enterprise::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    
    protected static ?string $navigationLabel = 'Entreprise';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section 1 : Informations Générales
                Section::make('Identité de l\'entreprise')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom de l\'entreprise')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('slogan')
                            ->label('Slogan')
                            ->maxLength(255),
                        TextInput::make('about')
                            ->label('En bref (About)')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])->columns(2),

                // Section 2 : Vision & Mission
                Section::make('Stratégie')
                    ->schema([
                        TextInput::make('mission')
                            ->label('Notre Mission'),
                        TextInput::make('vision')
                            ->label('Notre Vision'),
                    ])->columns(2),

                // Section 3 : Contenu Riche
                Section::make('Détails')
                    ->schema([
                        RichEditor::make('description')
                            ->label('Description détaillée')
                            ->columnSpanFull(),
                        RichEditor::make('historique')
                            ->label('Historique de l\'entreprise')
                            ->columnSpanFull(),
                    ]),

                // Section 4 : Médias (Logos)
                Section::make('Identité Visuelle')
                    ->description('Téléchargez les différentes versions du logo.')
                    ->schema([
                        FileUpload::make('logo')
                            ->label('Logo Principal')
                            ->image()
                            ,
                        FileUpload::make('logo_sans_fond')
                            ->label('Logo (Fond transparent)')
                            ->image()
                            ,
                        FileUpload::make('logo2')
                            ->label('Logo Secondaire')
                            ->image()
                            ,
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular(),
                
                TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slogan')
                    ->label('Slogan')
                    ->limit(30)
                    ->toggleable(),

                TextColumn::make('mission')
                    ->label('Mission')
                    ->limit(20)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Date de création')
                    ->dateTime('d/m/Y')
                    ->sortable(),
            ])
            ->filters([])
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
            'index' => Pages\ListEnterprises::route('/'),
            'create' => Pages\CreateEnterprise::route('/create'),
            'edit' => Pages\EditEnterprise::route('/{record}/edit'),
        ];
    }
}