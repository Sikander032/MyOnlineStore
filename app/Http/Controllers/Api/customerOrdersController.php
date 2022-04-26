<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\People\Therapist\AdminTherapistProfileDetailResource;
use App\Http\Resources\CustomerOrdersResource;
use App\Http\Responses\ErrorResponse;
use App\User;
use Illuminate\Http\Request;

class customerOrdersController extends Controller
{
    public function customerOrders(Request $request)
    {
        try {
            $user = User::find($request->user_id);
            return CustomerOrdersResource::collection($user->orders);
        } catch (Exception $e) {
            return (new ErrorResponse())->toResponse($e->getMessage());
        }

    }
}
