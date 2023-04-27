<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

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
            'type' => $this->category->name,
            'model_no' => $this->model_no ?? '',
            'country' => $this->country ?? '',
            'company_name' => $this->company_name ?? '',
            'manufactured_year' => $this->manufactured_year ? date('Y', strtotime($this->manufactured_year)) : '',
            'start_date' => $this->start_date ? Carbon::parse($this->start_date)->format('d M Y') : '',
            'usage' => $this->usage ?? '',
            'detail' => $this->description ?? '',
            'publish' => $this->publish ?? '',
            'qr_name' => $this->qr_name ?? '',
            'qr_img' => $this->qr_img != '' ? env('APP_URL').'/storage/qr-img/'.$this->qr_img : '',
            'images' => $prefixedImages,
            'logo' => env('APP_URL').'/img/logo/'.generalSetting('logo'),
            'title' => generalSetting('title'),
        ];
    }
}
