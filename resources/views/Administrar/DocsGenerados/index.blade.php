<div class="display-5 text-success text-center">
    <input type="radio" wire:model.live="list" value="1"  >&nbsp;Constancia(s) de trabajo
    <input type="radio" wire:model.live="list" value="2" style="margin-left: 5%;" >&nbsp;Recibo(s) de Pago
</div><br><br>
<div>
    @include('Administrar.DocsGenerados.filtrar')
</div>
    <div class="justify-content-center">        
        <div class="container-borde">
            @if($list == 1)
                @include('Administrar.DocsGenerados.ConstGen')
            @elseif($list == 2)
                @include('Administrar.DocsGenerados.RecibGen')
            @endif
           <x-icon-impress/>
        </div> 
         <br><br>
    </div>
