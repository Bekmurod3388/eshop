<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Country extends JsonResource {

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
      'alpha_2' => $this->alpha_2,
      'alpha_3' => $this->alpha_3,
      'name' => $this->whenLoaded('description', function() {
        return $this->description->name;
      }),
    ];
  }

}
