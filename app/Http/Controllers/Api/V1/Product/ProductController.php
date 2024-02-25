<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Events\Create\ProductCreateEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\ProductCreateRequest;
use App\Http\Requests\Api\Product\ProductUpdateRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function store(ProductCreateRequest $request): JsonResponse|ProductResource
    {
        $validated = $request->validated();
        try {
            $product = Product::create($validated);
            broadcast(new ProductCreateEvent($product))->toOthers();
            return ProductResource::make($product);
        } catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage(), 'status' => 400]);
        }
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }


    public function update(ProductUpdateRequest $request, Product $product): JsonResponse|ProductResource
    {
        $validated = $request->validated();
        try {
            $product->update($validated);
            return ProductResource::make($product);
        } catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage(), 'status' => 400]);
        }
    }

    public function destroy(Product $product): JsonResponse
    {
        try {
            $product->delete();
            return response()->json(['status' => 204]);
        } catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage(), 'status' => 400]);
        }
    }
}
