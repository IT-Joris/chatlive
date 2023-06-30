<?php

namespace App\Http\Livewire;

use App\Events\SendMessageEvent;
use App\Models\Message;
use Livewire\Component;

class Chat extends Component
{
    public string $newMessage;
    public $messages;

    public function sendMessage(): void
    {

        $message = auth()->user()->messages()->create([
            'content' => $this->newMessage,
            'channel_id' => 1
        ]);

        event(new SendMessageEvent($message));
        unset($this->newMessage);

    }

    public function mount()
    {
        $this->messages = Message::where('channel_id', 1)->get();
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
