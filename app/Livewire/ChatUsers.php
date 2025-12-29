<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

// app/Livewire/ChatUsers.php
class ChatUsers extends Component
{
    public function render()
    {
        return view('livewire.chat-users', [
            'users' => User::where('id', '!=', auth()->id())->get()
        ]);
    }
}

