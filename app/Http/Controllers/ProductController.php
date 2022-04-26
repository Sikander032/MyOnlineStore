<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductResource;
use App\Http\Responses\ErrorResponse;
use App\Http\Responses\SuccessResponse;
use App\Product;
use Exception;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $perPage = 12;
            $query = Product::query()
                ->when($request->filled('sort_by') && $request->sort_by == 'ascendingPrice', function ($q) {
                    $q->orderBy('price', 'Asc');
                })
                ->when($request->filled('sort_by') && $request->sort_by == 'descendingPrice', function ($q) {
                    $q->orderBy('price', 'Desc');
                })
                ->when($request->filled('sort_by') && $request->sort_by == 'a-z', function ($q) {
                    $q->orderBy('name', 'Asc');
                })
                ->when($request->filled('sort_by') && $request->sort_by == 'z-a', function ($q) {
                    $q->orderBy('name', 'Desc');
                })
                ->when($request->filled('department_id'), function ($q) use ($request) {
                    $q->whereHas('category', function ($q) use ($request) {
                        $q->where('id', '=', $request->department_id);
                    });
                })
                ->when($request->filled('search'), function ($query) use ($request) {
                    $keyword = $request->search;
                    $query->where(function ($query) use ($keyword) {
                        $query->where('products.name', 'like', $keyword)
                            ->orwhereHas('category', function($q) use ($keyword){
                                $q->where('name', 'like', $keyword);
                            });
                    });
                });
            $products = $query->paginate($perPage, ['*'], 'page', $request->page);

            $productResource = ProductResource::collection($products);
            $productsResponse = [
                'current_page' => $products->currentPage(),
                'data' => [],
                'from' => $products->firstItem(),
                'to' => $products->lastItem(),
                'total' => $products->total(),
                'per_page' => $products->perPage(),
                'last_page' => $products->lastPage(),
                'has_more' => $products->hasMorePages()
            ];

            if ($request->has('trending_products')) {
                $productResource = ProductResource::collection(Product::where('on_trending', '1')->get());
            }

            return (new SuccessResponse())->toResponse('', [
                'products' => $productResource,
                'pagination' => $productsResponse,
                'products_count'=>Product::count()
            ]);
        } catch (Exception $e) {
            return (new ErrorResponse())->toResponse($e->getMessage());
        }
    }

    public function productDetail(Request  $request)
    {
        try {
           return new ProductDetailResource(Product::findOrFail($request->product_id));
        } catch (Exception $e) {
            return (new ErrorResponse())->toResponse($e->getMessage());
        }
    }
}
