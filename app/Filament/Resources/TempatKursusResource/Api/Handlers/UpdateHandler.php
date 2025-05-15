<?php
namespace App\Filament\Resources\TempatKursusResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\TempatKursusResource;
use App\Filament\Resources\TempatKursusResource\Api\Requests\UpdateTempatKursusRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = TempatKursusResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update TempatKursus
     *
     * @param UpdateTempatKursusRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateTempatKursusRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}