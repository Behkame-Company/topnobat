<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\UpdateUserlocationRequest;
use App\Http\Requests\User\Auth\UpdateUserRequest;
use App\Http\Requests\User\UpdateCoordinatesRequest;
use App\Http\Resources\User\User\UserResource;
use Illuminate\Support\Facades\Auth;

/**
 * @group User
 *
 * @subgroup Profile
 */
class UserController extends Controller
{
    /**
     * Showing The User Inforamtion
     * @authenticated
     * @response {
     *  "status": true,
     *  "data": []
     * }
     */
    public function me()
    {
        $user = Auth::user();

        $user->load('location');

        return new UserResource($user);
    }

    /**
     * Updating The User Inforamtion
     * @authenticated
     * @response {
     *  "status": true,
     *  "data": []
     * }
     */
    public function update(UpdateUserRequest $request)
    {
        $data = $request->validated();

        $user = Auth::user();

        $user->update($data);

        return new UserResource($user);
    }

    /**
     * Updating The Location Of The User
     * @authenticated
     * @response {
     *  "status": true,
     *  "data": []
     * }
     */
    public function update_location(UpdateUserlocationRequest $request)
    {
        $data = $request->validated();

        $user = Auth::user();

        $user->update([
            'location_id' => $data['location_id']
        ]);

        $user->load('location');

        return new UserResource($user);
    }

     /**
     * Updating The Coordinates Of The User
     * @authenticated
     * @response {
     *  "status": true,
     *  "data": []
     * }
     */
    public function update_coordinates(UpdateCoordinatesRequest $request)

    {
        $data = $request->validated();

        $user = Auth::user();

        $user->update([
            'latitude' => $data['user_latitude'],
            'longitude' => $data['user_longitude'],
        ]);
        
        $user->load('location');

        return new UserResource($user);
    }
}
