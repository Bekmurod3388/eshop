<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class District extends JsonResource {

  /**
   * Transform the resource into an array.
   *
   * @param Request $request
   *
   * @return array
   */
  public function toArray($request) {
    return [
      'id' => $this->id,
      'region_id' => $this->region_id,
      'name' => $this->whenLoaded('description', function() {
        return $this->description->name;
      }),
    ];
  }

}
