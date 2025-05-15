<?php

namespace App\Filament\Resources\TempatKursusResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\TempatKursusResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\TempatKursusResource\Api\Transformers\TempatKursusTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = TempatKursusResource::class;


    /**
     * Show TempatKursus
     *
     * @param Request $request
     * @return TempatKursusTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');
        
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new TempatKursusTransformer($query);
    }
}
