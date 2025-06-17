<?php

namespace App\Http\Resources\Admin\Location;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LocationCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
