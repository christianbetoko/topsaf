<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TemoignageResource\Pages;
use App\Models\Temoignage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class TemoignageResource extends Resource
{
    protected static ?string $model = Temoignage::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    
    protected static ?string $navigationLabel = 'Témoignages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Identité & Contenu')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nom complet')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                        $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                Forms\Components\TextInput::make('slug')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->unique(Temoignage::class, 'slug', ignoreRecord: true),

                                Forms\Components\TextInput::make('job')
                                    ->label('Profession / Titre'),

                                Forms\Components\TextInput::make('company')
                                    ->label('Entreprise'),

                                Forms\Components\Textarea::make('content')
                                    ->label('Le témoignage')
                                    ->rows(5)
                                    ->columnSpanFull(),
                            ])->columns(2),

                        Forms\Components\Section::make('Réseaux Sociaux & Liens')
                            ->description('Liens vers les profils sociaux du témoin')
                            ->schema([
                                Forms\Components\TextInput::make('website')->url()->prefix('https://'),
                                Forms\Components\TextInput::make('facebook')->url(),
                                Forms\Components\TextInput::make('linkedin')->url(),
                                Forms\Components\TextInput::make('twitter')->label('X (Twitter)')->url(),
                                Forms\Components\TextInput::make('instagram')->url(),
                                Forms\Components\TextInput::make('tiktok')->url(),
                                Forms\Components\TextInput::make('youtube')->url(),
                            ])->columns(2),
                    ])->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Statut & Image')
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Afficher en ligne')
                                    ->default(true),

                                Forms\Components\FileUpload::make('image')
                                    ->label('Photo de profil')
                                    ->image()
                                    
                                    ->imageEditor()
                                    
                                    ,
                            ]),
                    ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('job')
                    ->label('Profession')
                    ->searchable(),

                Tables\Columns\TextColumn::make('company')
                    ->label('Entreprise')
                    ->toggleable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Actif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Statut Actif'),
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
            'index' => Pages\ListTemoignages::route('/'),
            'create' => Pages\CreateTemoignage::route('/create'),
            'edit' => Pages\EditTemoignage::route('/{record}/edit'),
        ];
    }
}