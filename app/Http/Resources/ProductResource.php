<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'country' => $this->country,
            'model_no' => $this->model_no,
            'manufactured_year' => date('Y', strtotime($this->manufactured_year)),
            'start_date' => $this->start_date,
            'usage' => $this->usage,
            'detail' => $this->description,
            'image' => env('APP_URL').'/img/qr-image/'.json_decode($this->image)[0],
        ];
    }
}
