<?php

namespace App\Http\Responses;

use Illuminate\Http\Response;

class SuccessResponse extends Response
{
    public function toResponse($message, $data = [])
    {
        $response = array_merge(['message' => $message], $data);
        return response()->json($response, Response::HTTP_OK);
    }
}
