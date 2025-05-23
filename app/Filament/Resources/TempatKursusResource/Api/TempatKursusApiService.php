<?php
namespace App\Filament\Resources\TempatKursusResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\TempatKursusResource;
use Illuminate\Routing\Router;


class TempatKursusApiService extends ApiService
{
    protected static string | null $resource = TempatKursusResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
