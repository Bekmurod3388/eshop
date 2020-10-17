<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'id' => $this->id,
            'image' => $this->image,
            'name' => $this->whenLoaded('description', function() {
				return $this->description->name;
			}),
            'description' => $this->whenLoaded('description', function(){
                return $this->description->description;
            }),
            'model' => $this->model,
            'stock' => $this->stock,
            'stock_status' => $this->whenLoaded('stockStatus', function(){
                return $this->stockStatus->name;
            }),
            'image' => $this->image,
            'manufacturer' => $this->whenLoaded('manufacturer', function(){
                return $this->manufacturer->name;
            }),
            'price' => $this->price,
            'weight' => $this->weight,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'minimum' => $this->minimum,
            'viewed' => $this->viewed,
            'sort_order' => $this->sort_order,
            'status' => $this->status
        ];
    }
}
