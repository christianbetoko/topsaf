<?php
namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationLabel = 'Événements';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Détails de l\'événement')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Titre')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug / URL')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(191)
                            ->unique(Event::class, 'slug', ignoreRecord: true),

                        Forms\Components\RichEditor::make('description')
                            ->label('Description')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Médias')
                    ->schema([
                        Forms\Components\FileUpload::make('images')
                            ->label('Galerie Photos')
                            ->multiple() // Permet de stocker plusieurs images dans le JSON
                            ->image()
                            ->reorderable() // Permet de changer l'ordre des images
                            ->appendFiles() // Permet d'ajouter de nouvelles images aux anciennes
                           
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('video_url')
                            ->label('URL Vidéo (YouTube/Vimeo)')
                            ->url()
                            ->placeholder('https://www.youtube.com/watch?v=...')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Paramètres')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Actif / Visible')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->toggleable(isToggledHiddenByDefault: true),

                // Affiche le nombre d'images dans la galerie
                Tables\Columns\TextColumn::make('images')
                    ->label('Photos')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) . ' image(s)' : '0 image'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Statut')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Filtrer par statut'),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}