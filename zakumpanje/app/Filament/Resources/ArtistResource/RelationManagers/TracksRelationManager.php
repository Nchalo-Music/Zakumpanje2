<?php

namespace App\Filament\Resources\ArtistResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Artist;

class TracksRelationManager extends RelationManager
{
    protected static string $relationship = 'tracks';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\Section::make()
                ->icon('heeroicon-o-users')
                ->description('Song Details')
                ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('duration')
                            ->numeric()
                            ->required(),
                        Forms\Components\DatePicker::make('year')
                            ->required(),
                        Forms\Components\DatePicker::make('genre')
                            ->required(),
                        Forms\Components\Select::make('artist_id')
                            ->required()
                            ->preload()
                            ->options(fn(Artist $artist) => $artist->pluck('stage_name','id') )
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name'),
                                Forms\Components\TextInput::make('stage_name')
                                    ->required(),
                                Forms\Components\FileUpload::make('avatar')
                                    ->avatar(),
                            ]),
                        ]),
             Forms\Components\Section::make()
                        ->label('Attachments')
                        ->icon('hero-icon-arrow-up')
                        ->description('Attach Files')
                        ->schema([
                            Forms\Components\FileUpload::make('track')
                                ->required()
                                ->directory('tracks'),
                            Forms\Components\FileUpload::make('artwork')
                                ->required()
                                ->avatar()
                                ->directory('tracks/artworks'),
                        ])
              
             
                
                    
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('track')
                    ->searchable(),
                Tables\Columns\TextColumn::make('artwork')
                    ->searchable(),
                Tables\Columns\TextColumn::make('year')
                    ->searchable(),
                Tables\Columns\textcolumn::make('genre'),                                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
