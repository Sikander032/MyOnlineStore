<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserReviewResource;
use App\Http\Responses\ErrorResponse;
use App\Http\Responses\SuccessResponse;
use App\Product;
use Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function fetchReviews(Request $request)
    {
        try {
            $product = Product::with('productReviews')->where('id','=', $request->product_id)->first();
            $query = $product->productReviews()
                ->when($request->filled('sort_by') && $request->sort_by == 'oldest', function ($q) {
                    $q->orderBy('id', 'Asc');
                })
                ->when($request->filled('sort_by') && $request->sort_by == 'latest', function ($q) {
                    $q->orderBy('id', 'Desc');
                })
                ->when($request->filled('sort_by') && $request->sort_by == 'low-rating', function ($q) {
                    $q->orderBy('rating', 'Asc');
                })
                ->when($request->filled('sort_by') && $request->sort_by == 'high-rating', function ($q) {
                    $q->orderBy('rating', 'Desc');
                });
            return
                UserReviewResource::collection($query->paginate(6, ['*'], 'page', null));
        } catch (Exception $exception) {
            (new ErrorResponse())->toResponse($exception->getMessage());
        }

    }

    public function createReview(Request $request)
    {
        try {
            $product = Product::findOrFail($request->product_id);
            $review = $product->productReviews()->updateOrCreate(
                $request->review
            );
            if ($review) {
                return (new SuccessResponse())->toResponse('', [
                    'review' => new UserReviewResource($review),
                ]);
            }
        } catch (Exception $e) {
            (new ErrorResponse())->toResponse($e->getMessage());
        }
    }
}
