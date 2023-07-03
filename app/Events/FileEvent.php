<?php

namespace App\Events;

use App\Models\File;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FileEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public File $file)
    {
    }

    public function broadcastWith(): array
    {
        return [
            'html' => view('partials.toast-file-download', ['file' => $this->file])->render(),
        ];
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('upload-file')
        ];
    }
}
