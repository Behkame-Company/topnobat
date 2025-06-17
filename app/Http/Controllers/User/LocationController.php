<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\Location\LocationCollection;
use App\Models\Location;
/**
 * @group User
 *
 * @subgroup Index
 */
class LocationController extends Controller
{

     /**
     * Getting The Locations
     * @authenticated
     * @response {
     *  "status": true,
     *  "data": []
     * }
     */
    public function get_locations()
    {
        $locations = Location::query()
            ->orderByRaw("CONVERT(city USING utf8mb4) COLLATE utf8mb4_persian_ci ASC")
            ->get();

        return new LocationCollection($locations);
    }
}
