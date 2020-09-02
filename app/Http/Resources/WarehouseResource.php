<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WarehouseResource extends JsonResource
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
            'men'      => UserResource::make($this->warehouse),
            'od'       => $this->od,
            'so'       => $this->so,
            'date_gi'  => $this->date_gi,
            'cust_recv'=> $this->cust_recv,
            'status'   => $this->status,
        ];
    }
}
