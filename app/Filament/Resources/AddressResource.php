<?php
namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Models\Address;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    
    protected static ?string $navigationLabel = 'Adresses & Points de vente';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Informations de Localisation')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nom du lieu')
                                    ->required()
                                    ->placeholder('Ex: Siège Social / Boutique Gombe')
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('address')
                                    ->label('Adresse physique')
                                    ->placeholder('N°, Avenue, Quartier...'),

                                Forms\Components\TextInput::make('city')
                                    ->label('Ville')
                                    ->placeholder('Ex: Kinshasa'),

                                Forms\Components\TextInput::make('country')
                                    ->label('Pays')
                                    ->default('RDC')
                                    ->placeholder('Ex: République Démocratique du Congo'),
                            ])->columns(2),

                        Forms\Components\Section::make('Coordonnées GPS')
                            ->description('Utile pour l\'affichage sur une carte (Google Maps)')
                            ->schema([
                                Forms\Components\TextInput::make('latitude')
                                    ->label('Latitude')
                                    
                                    ,

                                Forms\Components\TextInput::make('longitude')
                                    ->label('Longitude')
                                    
                                   ,
                            ])->columns(2),
                    ])->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Statut & Image')
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Adresse active')
                                    ->default(true),

                                Forms\Components\FileUpload::make('image')
                                    ->label('Photo du lieu')
                                    ->image()
                                    
                                    ->imageEditor(),
                            ]),
                    ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Photo'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('city')
                    ->label('Ville')
                    ->searchable(),

                Tables\Columns\TextColumn::make('address')
                    ->label('Adresse')
                    ->limit(30),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Actif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Statut actif'),
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
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }
}