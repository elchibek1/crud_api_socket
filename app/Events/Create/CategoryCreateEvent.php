<?php

namespace App\Events\Create;

use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CategoryCreateEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(private readonly Category $category)
    {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('category_create'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'category' => CategoryResource::make($this->category)->resolve()
        ];
    }

    public function broadcastAs(): string
    {
        return 'category_create';
    }

}
