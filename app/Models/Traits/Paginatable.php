<?php
namespace App\Models\Traits;

trait Paginatable
{
  private $pageSizeLimit=100;

  public function getPerPage()
  {
    $pageSize = request('per-page', $this->perPage);
    return min($pageSize, $this->pageSizeLimit);
  }
}
