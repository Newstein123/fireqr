<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   
        $images = json_decode($this->image);
        $prefixedImages = [];
        foreach ($images as $image) {
            $prefixedImages[] = env('APP_URL').'/img/fire_vehicles/' . $image;
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'model_no' => $this->model_no,
            'country' => $this->country,
            'manufactured_year' => date('Y', strtotime($this->manufactured_year)),
            'start_date' => $this->start_date,
            'usage' => $this->usage,
            'detail' => $this->description,
            'publish' => $this->publish,
            'qr_name' => $this->qr_name,
            'qr_img' => $this->qr_img != '' ? env('APP_URL').'/storage/qr-img/'.$this->qr_img : '',
            'images' => $prefixedImages,
        ];
    }
}
