<?php
namespace App\Filament\Resources\TempatKursusResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\TempatKursus;

/**
 * @property TempatKursus $resource
 */
class TempatKursusTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id_tempat_kursus'=>$this->id,
            'nama_tempat_kursus'=>$this->nama_tempat_kursus,
            'deskripsi_tempat_kursus'=>$this->desktripsi_tempat_kursus,
        ];
    }
}
