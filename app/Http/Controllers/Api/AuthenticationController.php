<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\UserLoginException;
use App\Http\Controllers\Controller;
use App\Http\Responses\ErrorResponse;
use App\Http\Responses\SuccessResponse;
use App\User;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function signUp(Request $request)
    {
        try {

            $user = User::where('email','=',$request->email_address)->first();
            if($user){
                return (new SuccessResponse())->toResponse('A User already exists with this email, Please Sign In', [
                    'redirect_to_login' => true,
                    'user' => $user
                ]);
            }
            else{

                $user = new User();
                $user->password = Hash::make($request->password);
                $user->email = $request['email_address'];
                $user->name = $request['full_name'];
                $user->api_token = Str::random(60);
                $user->save();
            }
            if ($user) {
                Auth::loginUsingId($user->id, TRUE);
            }
            return (new SuccessResponse())->toResponse('User Created Successfully', [
                'redirect_to_login' => false,
                'user' => $user
            ]);
        } catch (Exception $e) {

            return (new ErrorResponse())->toResponse($e->getMessage());

        }
    }

    public function logIn(Request $request)
    {
        try {
            $user = User::where('email', '=', $request->email)->first();
            if(! $user){
                throw new UserLoginException('Invalid User Email Or Password');
            }
            if (!Hash::check(request('password'), $user->password)) {
                throw new UserLoginException('Invalid User Email Or Password');
            }
            return (new SuccessResponse())->toResponse('Login Successfull', [
                'redirect_to_login' => false,
                'user' => $user
            ]);
        } catch (UserLoginException $e) {
            return (new ErrorResponse())->toResponse($e->getMessage());
        } catch (Exception $e) {
            return (new ErrorResponse())->toResponse($e->getMessage());
        }
    }
}
