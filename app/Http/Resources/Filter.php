<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Filter extends JsonResource
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
            'name' => $this->whenLoaded('description', function() {
				return $this->description->name;
			}),
            'filter_group_id' => $this->filter_group_id,
            'sort_order' => $this->sort_order
        ];
    }
}
