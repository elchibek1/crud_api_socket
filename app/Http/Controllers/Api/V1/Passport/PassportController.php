<?php

namespace App\Http\Controllers\Api\V1\Passport;

use App\Events\Create\PassportCreateEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Passport\PassportCreateRequest;
use App\Http\Requests\Api\Passport\PassportUpdateRequest;
use App\Http\Resources\Passport\PassportResource;
use App\Models\Passport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class PassportController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        $passports = Passport::all();
        return PassportResource::collection($passports);
    }

    public function store(PassportCreateRequest $request): PassportResource|JsonResponse
    {
        $validated = $request->validated();
        try {
            $passport = Passport::create($validated);
            broadcast(new PassportCreateEvent($passport))->toOthers();
            return PassportResource::make($passport);
        } catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage(), 'status' => 400]);
        }
    }

    public function show(Passport $passport): PassportResource
    {
        return new PassportResource($passport);
    }


    public function update(PassportUpdateRequest $request, Passport $passport): PassportResource|JsonResponse
    {
        $validated = $request->validated();
        try {
            $passport->update($validated);
            return PassportResource::make($passport);
        } catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage(), 'status' => 400]);
        }
    }

    public function destroy(Passport $passport): JsonResponse
    {
        try {
            $passport->delete();
            return response()->json(['status' => 204]);
        } catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage(), 'status' => 400]);
        }
    }
}
