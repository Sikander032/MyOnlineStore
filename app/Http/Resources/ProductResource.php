<?php

namespace App\Http\Resources;

use App\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'price' => $this->price,
            'rating' => $this->rating,
            'category_name' => $this->category->name,
            'on_sale' => $this->on_sale,
            'discounted_price' => $this->discounted_price,
            'images' => ProductImageResource::collection($this->images),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'rating' => $this->getTotalRating($this->id),
        ];
    }

    private function getTotalRating($id)
    {
        $product = Product::find($id);
        $ratings = $product->productReviews()->avg('rating');
        return [
            'overall_rating' => round($ratings, 1),
            'total_reviews' => $product->productReviews()->count()
        ];
    }

}
