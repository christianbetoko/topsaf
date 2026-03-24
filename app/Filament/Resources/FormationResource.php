<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormationResource\Pages;
use App\Models\Formation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class FormationResource extends Resource
{
    protected static ?string $model = Formation::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    
    protected static ?string $navigationLabel = 'Formations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Informations Générales')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Titre de la formation')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                        $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                Forms\Components\TextInput::make('slug')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->unique(Formation::class, 'slug', ignoreRecord: true),

                                Forms\Components\TextInput::make('code')
                                    ->label('Code Formation')
                                    ->placeholder('Ex: FOR-2024-001')
                                    ->required(),

                                Forms\Components\Textarea::make('description')
                                    ->label('Description courte')
                                    ->columnSpanFull(),
                            ])->columns(2),

                        Forms\Components\Section::make('Médias')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->label('Image de la formation')
                                    ,
                                Forms\Components\TextInput::make('video_url')
                                    ->label('Lien Vidéo (YouTube/Vimeo)')
                                    ->url(),
                            ]),
                    ])->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Logistique & Prix')
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Ouverte aux inscriptions')
                                    ->default(true),
                                Forms\Components\TextInput::make('price')
                                    ->label('Prix')
                                    ->placeholder('Ex: 500 €'),
                                Forms\Components\TextInput::make('duration')
                                    ->label('Durée')
                                    ->placeholder('Ex: 3 jours / 21h'),
                                Forms\Components\TextInput::make('instructor')
                                    ->label('Formateur'),
                                Forms\Components\TextInput::make('location')
                                    ->label('Lieu'),
                            ]),

                        Forms\Components\Section::make('Calendrier')
                            ->schema([
                                Forms\Components\DatePicker::make('start_date')
                                    ->label('Date de début'),
                                Forms\Components\DatePicker::make('end_date')
                                    ->label('Date de fin'),
                            ]),
                    ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Aperçu'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Formation')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->label('Code')
                    ->badge()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('price')
                    ->label('Prix'),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Début')
                    ->date('d/m/Y')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
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
            'index' => Pages\ListFormations::route('/'),
            'create' => Pages\CreateFormation::route('/create'),
            'edit' => Pages\EditFormation::route('/{record}/edit'),
        ];
    }
}