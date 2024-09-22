<div class="display-5 text-center" style="margin-top:0">
    <input type="radio" wire:model.live="list" value="1"  >&nbsp;Constancia(s) de trabajo
    <input type="radio" wire:model.live="list" value="2" style="margin-left: 5%;" >&nbsp;Recibo(s) de Pago
</div>
<div class="container">
    @include('Administrar.DocsGenerados.filtrar')
    <div class="justify-content-center" >        
        <div class="container-fond">
            @if($list == 1)
                @include('Administrar.DocsGenerados.ConstGen')
            @elseif($list == 2)
                @include('Administrar.DocsGenerados.RecibGen')
            @endif
            <div style="float: right;">
                <a target="_blank" href="{{asset('Constancias-Recibos.pdf')}}"  class="display-6 " wire:click="ExporConsul" >
                    <img src="{{ asset('images/ICONS/impress.png')}}"   width="50";  title="ver|imprimir"  style="cursor: pointer; ">
                </a>
            </div>
        </div>  <br><br>
    </div>
</div>