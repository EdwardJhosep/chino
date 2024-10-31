<?php

namespace App\Livewire;

use Livewire\Component;

class Chatbot extends Component
{
    public $count = 0;
    public function  gaa(){
        $this->count++;
    }
    public function render()
    {
        return view('livewire.chatbot');
    }
}
