<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
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
            'id'          => $this->id,
            'sn_unit'     => $this->sn_unit,
            'model_unit'  => $this->model_unit,
            'desc'        => $this->desc,
            'no_unit'     => $this->no_unit,
            'lokasi_unit' => $this->lokasi_unit,
            'kota'        => $this->kota,
            'smu'         => $this->smu,
            'old_smu'     => $this->old_smu,
        ];
    }
}
