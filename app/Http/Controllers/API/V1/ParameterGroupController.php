<?php
namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttributeGroup as ResourcesAttributeGroup;
use App\Models\AttributeGroup;

class ParameterGroupController extends Controller {

  public function index() {
    return ResourcesAttributeGroup::collection(
      AttributeGroup::with([
          'description',
        ])->paginate()
    );
  }

}

