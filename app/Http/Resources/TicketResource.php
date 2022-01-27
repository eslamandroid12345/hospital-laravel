<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'phone' => $this->phone,
            'patient_address' => $this->patient_address,
            'operation' => $this->operation,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
             'user' =>  $this->user->name,


        ];
    }
}
