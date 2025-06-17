<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\TokenRequest;
use App\Http\Requests\User\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


/**
 * @group User
 *
 * @subgroup Auth
 */
class AuthController extends Controller
{
    /**
     * Login
     *
     * @unauthenticated
     *
     * @response {
     *  "status": true,
     *  "data": []
     * }
     */
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $user = User::query()->where('phone_number', $data['phone_number'])->first();

        if (!$user) {

            return  $this->bad_request('کاربری با این شماره تلفن یافت نشد');
        }

        if ($user['otp_token'] != $data['otp_token']) {

            return $this->bad_request('کد وارد شده اشتباه است');
        }

        $token = Auth::login($user);

        $user->update([
            'otp_token' => null
        ]);

        return $this->ok([
            'message' => 'با موفقیت وارد شدید',
            'token' => $token,
        ]);
    }
    /**
     * Getting OTP Token
     * 
     * @unauthenticated

     * 
     * @response {
     * 'message sent':'enter the code'
     * }
     */


    public function otp_token(TokenRequest $request)
    {
        $data = $request->validated();

        // $token = random_int(1000, 9999);
        $otp_token = '1234';

        $user = User::query()->where('phone_number', $data['phone_number'])->first();

        if (!$user) {

            $user = User::query()->create([
                'phone_number' => $data['phone_number']
            ]);
        }

        $user->update([
            'otp_token' => $otp_token
        ]);

        //TODO: implement sms functionality

        // exp: $user->notify(new SendAuthTokenNotification($token));

        return $this->ok([
            'message' => 'رمز یکبار مصرف را وارد کنید'
        ]);
    }
}
