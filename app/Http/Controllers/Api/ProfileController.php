<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\updateProfileRequest;
use App\Http\Responses\ErrorResponse;
use App\Http\Responses\SuccessResponse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function updateProfile(updateProfileRequest $request)
    {
        try {

            $user = User::find($request->user_id);

            if ($request->filled('current_password') )
            {
                if(! Hash::check($request->current_password, $user->password)) {
                    throw new  \Exception('Your password is incorrect');
                    return false;
                }
                if (Hash::check($request->password, $user->password)) {
                    throw new  \Exception('You cannot set your current password as a new password');
                    return false;
                }
            }

            $user->password = Hash::make($request->password);
            $user->name = $request->first_name . ' ' . $request->last_name;
//            $user->phone_number = $request->phone_number;
            $user->save();
            return (new SuccessResponse())->toResponse('User Updated Successfully', [
                'redirect_to_login' => false,
                'user' => $user
            ]);
        } catch (\Exception $e) {
            return (new ErrorResponse())->toResponse($e->getMessage());
        }

    }
}
