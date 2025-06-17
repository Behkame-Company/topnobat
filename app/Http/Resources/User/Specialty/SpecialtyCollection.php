<?php

namespace App\Http\Resources\User\Specialty;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SpecialtyCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
