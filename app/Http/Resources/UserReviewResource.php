<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserReviewResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'full_name' => $this->full_name,
            'email' => $this->email,
            'rating' => $this->rating,
            'review' => $this->review,
            'created_at' => $this->created_at->format('M d, Y')
        ];
    }
}
