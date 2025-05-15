<?php
namespace App\Filament\Resources\TempatKursusResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\TempatKursusResource;
use App\Filament\Resources\TempatKursusResource\Api\Requests\CreateTempatKursusRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = TempatKursusResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create TempatKursus
     *
     * @param CreateTempatKursusRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateTempatKursusRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}