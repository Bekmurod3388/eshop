<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
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
            'top' => $this->top,
            'sort_order' => $this->sort_order,
            'status' => $this->status,
            'items' => self::collection($this->whenLoaded('items'))
        ];
    }
}
