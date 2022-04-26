<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Http\Responses\ErrorResponse;
use App\MainPageSlider;

class SliderController extends Controller
{
    public function getMainPageSlider() {
        try {
            return SliderResource::collection(MainPageSlider::all());
        } catch (Exception $e) {
            return (new ErrorResponse())->toResponse($e->getMessage());
        }
    }
}
