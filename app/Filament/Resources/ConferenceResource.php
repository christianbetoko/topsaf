<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ConferenceResource\Pages;
use App\Models\Conference;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ConferenceResource extends Resource
{
    protected static ?string $model = Conference::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';
    
    protected static ?string $navigationLabel = 'Conférences';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // SECTION 1 : INFORMATIONS PRINCIPALES
                Forms\Components\Section::make('Informations Générales')
                    ->description('Définissez le titre et le contenu de la conférence')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Titre')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('slug')
                            ->label('URL (Slug)')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(191)
                            ->unique(Conference::class, 'slug', ignoreRecord: true),

                        // Utilisation du Textarea pour la description
                        Forms\Components\Textarea::make('description')
                            ->label('Description détaillée')
                            ->rows(6)
                            ->placeholder('Saisissez ici le programme ou le résumé de la conférence...')
                            ->columnSpanFull(),
                    ])->columns(2),

                // SECTION 2 : MÉDIAS ET LIEU
                Forms\Components\Section::make('Médias & Localisation')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Image de couverture')
                            ->image()
                           
                            ->imageEditor(),

                        Forms\Components\TextInput::make('video_url')
                            ->label('Lien Vidéo (YouTube/Vimeo)')
                            ->url()
                            ->placeholder('https://www.youtube.com/watch?v=...'),

                        Forms\Components\TextInput::make('location')
                            ->label('Lieu / Emplacement')
                            ->placeholder('Ex: Salle de conférence, Kinshasa')
                            ->columnSpanFull(),
                    ])->columns(2),

                // SECTION 3 : PARAMÈTRES
                Forms\Components\Section::make('Logistique & Visibilité')
                    ->schema([
                        Forms\Components\DatePicker::make('_date')
                            ->label('Date prévue')
                            ->native(false)
                            ->displayFormat('d/m/Y'),

                        Forms\Components\TextInput::make('price')
                            ->label('Tarif / Prix')
                            ->placeholder('Ex: 50 USD ou Gratuit'),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Publié en ligne')
                            ->default(true)
                            ->inline(false),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Aperçu')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('_date')
                    ->label('Date')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('location')
                    ->label('Lieu')
                    ->limit(30)
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Statut')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
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
            'index' => Pages\ListConferences::route('/'),
            'create' => Pages\CreateConference::route('/create'),
            'edit' => Pages\EditConference::route('/{record}/edit'),
        ];
    }
}