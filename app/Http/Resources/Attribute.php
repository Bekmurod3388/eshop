<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed status
 * @property mixed sort_order
 */
class Attribute extends JsonResource {

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
      'name' => $this->whenLoaded('description', function(){
        return $this->description->name;
      }),
      'sort_order' => $this->sort_order,
      'status' => $this->status
    ];
  }

}
