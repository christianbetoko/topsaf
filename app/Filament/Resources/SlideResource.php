<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideResource\Pages;
use App\Models\Slide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;

class SlideResource extends Resource
{
    protected static ?string $model = Slide::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    
    protected static ?string $navigationLabel = 'Slideshow';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Contenu du Slide')
                    ->description('Informations textuelles affichées sur l\'image.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Titre du Slide')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Description courte')
                            ->rows(3)
                            ->maxLength(255),
                    ])->columnSpan(2),

                Section::make('Statut')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Visible sur le site')
                            ->default(true)
                            ->inline(false),
                    ])->columnSpan(1),

                Section::make('Médias')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image de fond')
                            ->image(),
                        
                        TextInput::make('video_url')
                            ->label('URL Vidéo (Optionnel)')
                            ->url()
                            ->placeholder('Ex: https://youtube.com/...'),
                    ])->columnSpan(2),

                Section::make('Bouton d\'action (CTA)')
                    ->schema([
                        TextInput::make('text_button')
                            ->label('Texte du bouton')
                            ->placeholder('Ex: En savoir plus'),
                        
                        TextInput::make('url')
                            ->label('Lien du bouton')
                            ->url()
                            ->placeholder('https://...'),
                    ])->columns(2)->columnSpanFull(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Aperçu'),

                TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('text_button')
                    ->label('Bouton')
                    ->badge()
                    ->color('gray'),

                ToggleColumn::make('is_active')
                    ->label('Actif'),

                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Visibilité'),
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
            'index' => Pages\ListSlides::route('/'),
            'create' => Pages\CreateSlide::route('/create'),
            'edit' => Pages\EditSlide::route('/{record}/edit'),
        ];
    }
}