<div style="text-align: center">
<br><br>
    <button class="btn btn-primary" wire:click="increment">+</button>
    <h1>{{ $count }}</h1>
    
    <div class="display-6">
        <input type="radio" wire:model="list" value="1"  wire:click="eventlist">&nbsp;&nbsp;Constancia(s) de trabajo
        <input type="radio" wire:model="list" value="2" wire:click="eventlist" style="margin-left: 10%;" >&nbsp;&nbsp;Recibo(s) de Pago
    </div>
    <h1>{{ $list }}</h1>
    <div>
        <input type="text" wire:model.live="message">
        {{ $message }}
    </div>
<div>
    <h4>Search</h4>
    <input type="text" wire:model.live="search">
    <h1>array: {{ $pers }}</h1>
    <ul>
        @foreach ($pers as $per)
            <li wire:key="{{ $per->id }}">{{ $per->name }}</li>
        @endforeach
    </ul>
</div>


</div>