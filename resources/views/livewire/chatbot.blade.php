<div class="container mt-5">
    <div class="card" style="width: 400px; position: absolute; right: 20px;">
        <div class="card-header">
            <h4>ChatBot de Consultas</h4>
        </div>
        <div class="card-body" style="height: 300px; overflow-y: scroll;">
            @foreach ($messages as $message)
                <div class="mb-2">
                    <strong>{{ $message['type'] == 'user' ? 'Tú' : 'Bot' }}:</strong>
                    <p class="border p-2 {{ $message['type'] == 'user' ? 'bg-light' : 'bg-info text-white' }}">{{ $message['text'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <input type="text" wire:model="input" class="form-control" placeholder="Escribe tu consulta..." />
            <button wire:click="send" class="btn btn-primary mt-2">Enviar</button>
        </div>
    </div>
</div>
