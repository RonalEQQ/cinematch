<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Events\MessageSent;
use Livewire\Attributes\On;

class ChatRoom extends Component
{
    public $content = '';
    protected $messages = [];

    public function mount()
    {
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = Message::with('user')->latest()->get()->toArray();
    }

    public function sendMessage()
    {
        $this->validate([
            'content' => 'required|string|min:1',
        ]);

        Message::create([
            'content' => $this->content,
            'user_id' => auth()->id(),
        ]);

        $this->content = '';

        MessageSent::dispatch();
    }

    #[On('echo:chat,MessageSent')]
    public function refreshMessages()
    {
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat-room', [
            'messages' => $this->messages,
        ]);
    }
}

