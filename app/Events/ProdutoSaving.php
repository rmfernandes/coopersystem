<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Models\Produto;

class ProdutoSaving
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $produto;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Produto $produto
     * 
     * @return void
     */
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('produto-saving');
    }
}
