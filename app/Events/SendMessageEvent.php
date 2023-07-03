<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Message $message, public ?string $file)
    {
    }

    public function broadcastWith(): array
    {
        return [
            'message' => $this->message->content,
            'created_at' => $this->message->created_at->diffForHumans(),
            'user' => [
                'id' => $this->message->user->id,
                'name' => $this->message->user->name,
            ],
            'file' => $this->file,
            'html' => [
                'author' => view('partials.message', ['message' => $this->message, 'other' => false, 'file' => $this->file])->render(),
                'other' => view('partials.message', ['message' => $this->message, 'other' => true, 'file' => $this->file])->render(),
            ]
        ];
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel.1')
        ];
    }
}
