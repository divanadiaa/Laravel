<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TempatKursusResource\Pages;
use App\Filament\Resources\TempatKursusResource\Api\Transformers\TempatKursusTransformer;
use App\Models\TempatKursus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TempatKursusResource extends Resource
{
    protected static ?string $model = TempatKursus::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    
    protected static ?string $navigationLabel = 'Tempat Kursus';
    
    protected static ?string $navigationGroup = 'Manajemen Kursus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('gambar')
                    ->image()
                    ->directory('tempat-kursus')
                    ->visibility('public')
                    ->imagePreviewHeight('250')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('nama_tempat_kursus')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi_tempat_kursus')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('lokasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('maps')
                    ->maxLength(255)
                    ->placeholder('Link Google Maps'),
                Forms\Components\TextInput::make('kontak_kursus')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->circular(),
                Tables\Columns\TextColumn::make('nama_tempat_kursus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kontak_kursus'),
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
            'index' => Pages\ListTempatKursuses::route('/'),
            'create' => Pages\CreateTempatKursus::route('/create'),
            'edit' => Pages\EditTempatKursus::route('/{record}/edit'),
        ];
    }

    public static function getApiTransformer(){
        return TempatKursusTransformer::class;
    }
}