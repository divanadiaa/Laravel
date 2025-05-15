<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookmarkResource\Pages;
use App\Models\Bookmark;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BookmarkResource extends Resource
{
    protected static ?string $model = Bookmark::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    
    protected static ?string $navigationLabel = 'Bookmark';
    
    protected static ?string $navigationGroup = 'Aktivitas Pengguna';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_pengguna')
                    ->relationship('pengguna', 'nama')
                    ->required(),
                Forms\Components\Select::make('id_tempat_kursus')
                    ->relationship('tempatKursus', 'nama_tempat_kursus')
                    ->required(),
                Forms\Components\DateTimePicker::make('created_at')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_bookmark')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pengguna.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tempatKursus.nama_tempat_kursus')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookmarks::route('/'),
            'create' => Pages\CreateBookmark::route('/create'),
            'edit' => Pages\EditBookmark::route('/{record}/edit'),
        ];
    }
}