<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'id'              => $this->id,
            'ktp'             => $this->ktp,
            'name'            => $this->name,
            'sold_to_party'   => $this->sold_to_party,
            'ship_to_id'      => $this->ship_to_id,
            'phone_number'    => $this->phone_number,
            'city'            => $this->city,
            'virtual_account' => $this->virtual_account,
            'info_scc'        => $this->info_scc,
            'npwp'            => $this->npwp,
            'sales'           => UserResource::make($this->sales)
        ];
    }
}
