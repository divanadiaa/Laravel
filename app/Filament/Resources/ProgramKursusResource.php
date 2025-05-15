<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramKursusResource\Pages;
use App\Models\ProgramKursus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProgramKursusResource extends Resource
{
    protected static ?string $model = ProgramKursus::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    
    protected static ?string $navigationLabel = 'Program Kursus';
    
    protected static ?string $navigationGroup = 'Manajemen Kursus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_program')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('durasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('range_biaya')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('id_tempat_kursus')
                    ->relationship('tempatKursus', 'nama_tempat_kursus')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_program')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_program')
                    ->searchable(),
                Tables\Columns\TextColumn::make('durasi'),
                Tables\Columns\TextColumn::make('range_biaya'),
                Tables\Columns\TextColumn::make('tempatKursus.nama_tempat_kursus')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y')
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
            'index' => Pages\ListProgramKursuses::route('/'),
            'create' => Pages\CreateProgramKursus::route('/create'),
            'edit' => Pages\EditProgramKursus::route('/{record}/edit'),
        ];
    }
}