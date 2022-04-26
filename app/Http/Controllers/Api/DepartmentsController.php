<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Http\Responses\ErrorResponse;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function departments()
    {
        try {
            return DepartmentResource::collection(Category::all());
        } catch (\Exception $e) {
            return (new ErrorResponse())->toResponse($e->getMessage());
        }

    }
}
