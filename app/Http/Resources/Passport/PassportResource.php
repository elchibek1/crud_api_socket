<?php

namespace App\Http\Resources\Passport;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PassportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'passportNumber' => $this->resource->passportNumber,
            'user' => $this->resource->user->name
        ];
    }
}
