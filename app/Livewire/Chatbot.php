<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;


class Chatbot extends Component
{
    public $input = '';
    public $messages = [];

    public function send()
    {
        $this->messages[] = ['text' => $this->input, 'type' => 'user'];
        
        // Lógica para buscar productos en la base de datos
        if ($this->input) {
            $productos = Producto::where('nombre', 'like', '%' . $this->input . '%')->get();
            if ($productos->isNotEmpty()) {
                foreach ($productos as $producto) {
                    $this->messages[] = [
                        'text' => "Producto: {$producto->nombre}, Precio: {$producto->getPrecioFormattedAttribute()}, Stock: {$producto->stock}",
                        'type' => 'bot'
                    ];
                }
            } else {
                $this->messages[] = ['text' => 'No se encontraron productos.', 'type' => 'bot'];
            }
        }

        $this->input = '';
    }

    public function render()
    {
        return view('livewire.chatbot');
    }
}
