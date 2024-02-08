<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrackResource\Pages;
use App\Filament\Resources\TrackResource\RelationManagers;
use App\Models\Track;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Artist;

class TrackResource extends Resource
{
    protected static ?string $model = Track::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            // ->schema([
            //     Forms\Components\TextInput::make('name')
            //         ->required()
            //         ->maxLength(255),
            //     Forms\Components\FileUpload::make('track')
            //         ->required()
            //         ->directory('tracks'),
            //     Forms\Components\FileUpload::make('artwork')
            //         ->required()
            //         ->avatar()
            //         ->directory('tracks/artworks'),
            //     Forms\Components\DatePicker::make('year')
            //         ->required(),
            //     Forms\Components\TextInput::make('duration')
            //         ->required(),
            //     Forms\Components\Select::make('artist_id')
            //         ->required()
            //         ->relationship('artist','id')
            //         ->createOptionForm([
            //             Forms\Components\TextInput::make('name'),
            //             Forms\Components\TextInput::make('stage_name')
            //                 ->required(),
            //             Forms\Components\FileUpload::make('avatar')
            //                 ->avatar(),
            //         ]),

            // ]);
            ->schema([
                Forms\Components\Section::make()
                 ->description('Song Details')
                 ->schema([
                         Forms\Components\TextInput::make('name')
                             ->required()
                             ->maxLength(255),
                         Forms\Components\TextInput::make('duration')
                            ->numeric()
                            ->required(),
                         Forms\Components\DatePicker::make('year')
                             ->label('year of release')
                             ->required(),
                         Forms\Components\Card::make()
                             ->schema([
                                Forms\Components\TextInput::make('genre')
                                ->maxLength(255)
                                ->required(),
                                Forms\Components\Select::make('artist_id')
                                    ->required()
                                    ->preload()
                                    ->options(fn( Artist $artist) => $artist->pluck('stage_name','id'))
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name'),
                                        Forms\Components\TextInput::make('stage_name')
                                            ->required(),
                                        Forms\Components\FileUpload::make('avatar')
                                            ->avatar(),
                                    ]),
                                ])->columns(2)->columnSpanFull(),            
                         ])->columns(3),
              Forms\Components\Section::make()
                         ->label('Attachments')
                         ->icon('heroicon-o-arrow-up')
                         ->description('Attach Files')
                         ->schema([
                            Forms\Components\FileUpload::make('artwork')
                            ->required()
                            ->avatar()
                            ->directory('tracks/artworks'),

                             Forms\Components\FileUpload::make('track')
                                 ->required()
                                 ->directory('tracks'),
                        
                         ])->columns(2)
               
              
                 
                     
             ]);



    }

    public static function table(Table $table): Table
    {
        return $table
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
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ArtistRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTracks::route('/'),
            'create' => Pages\CreateTrack::route('/create'),
            'view' => Pages\ViewTrack::route('/{record}'),
            'edit' => Pages\EditTrack::route('/{record}/edit'),
        ];
    }
}
