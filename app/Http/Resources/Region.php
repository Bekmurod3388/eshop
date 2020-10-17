<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Region extends JsonResource {

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
      'country_id' => $this->country_id,
      'zip_code' => $this->zip_code,
      'name' => $this->whenLoaded('description', function() {
        return $this->description->name;
      }),
      'district' => $this->whenLoaded('district', function() {
        return $this->district->description->name;
      }),
    ];
  }

}
