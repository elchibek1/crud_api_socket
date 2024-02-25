<?php

namespace App\Events\Create;

use App\Http\Resources\Passport\PassportResource;
use App\Models\Passport;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PassportCreateEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(private readonly Passport $passport)
    {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('passport_create'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'passport' => PassportResource::make($this->passport)->resolve()
        ];
    }

    public function broadcastAs(): string
    {
        return 'passport_create';
    }
}
