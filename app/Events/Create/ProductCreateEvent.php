<?php

namespace App\Events\Create;


use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductCreateEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(private readonly Product $product)
    {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('product_create'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'product' => ProductResource::make($this->product)->resolve()
        ];
    }

    public function broadcastAs(): string
    {
        return 'product_create';
    }
}
