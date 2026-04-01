<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    
    protected static ?string $navigationLabel = 'Messages de contact';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Détails du Message')
                    ->description('Contenu envoyé via le formulaire de contact.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nom de l\'expéditeur')
                            ->disabled(),

                        Forms\Components\TextInput::make('email')
                            ->label('Adresse Email')
                            ->email()
                            ->disabled(),

                        Forms\Components\TextInput::make('subject')
                            ->label('Sujet')
                            ->columnSpanFull()
                            ->disabled(),

                        Forms\Components\Textarea::make('message')
                            ->label('Message')
                            ->rows(8)
                            ->columnSpanFull()
                            ->disabled(),
                            
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Reçu le')
                            ->content(fn ($record): string => $record->created_at->format('d/m/Y à H:i')),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Expéditeur')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->copyable() // Permet de copier l'email pour répondre rapidement
                    ->searchable(),

                Tables\Columns\TextColumn::make('subject')
                    ->label('Sujet')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date de réception')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc') // Les plus récents en premier
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(), // On n'affiche que l'action "Voir"
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
            'index' => Pages\ListContactMessages::route('/'),
            'view' => Pages\ViewContactMessage::route('/{record}'),
            // On retire volontairement 'create' et 'edit'
        ];
    }
}