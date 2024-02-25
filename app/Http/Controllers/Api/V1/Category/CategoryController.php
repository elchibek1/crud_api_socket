<?php

namespace App\Http\Controllers\Api\V1\Category;

use App\Events\Create\CategoryCreateEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\CategoryCreateRequest;
use App\Http\Requests\Api\Category\CategoryUpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function store(CategoryCreateRequest $request): JsonResponse|CategoryResource
    {
        $validated = $request->validated();
        try {
            $category = Category::create($validated);
            broadcast(new CategoryCreateEvent($category))->toOthers();
            return CategoryResource::make($category);
        } catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage(), 'status' => 400]);
        }
    }

    public function show(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }


    public function update(CategoryUpdateRequest $request, Category $category): JsonResponse|CategoryResource
    {
        $validated = $request->validated();
        try {
            $category->update($validated);
            return CategoryResource::make($category);
        } catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage(), 'status' => 400]);
        }
    }

    public function destroy(Category $category): JsonResponse
    {
        try {
            $category->delete();
            return response()->json(['status' => 204]);
        } catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage(), 'status' => 400]);
        }
    }
}
