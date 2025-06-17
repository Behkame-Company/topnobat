<?php

namespace App\Http\Resources\Admin\Doctor;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DoctorCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
