@section('title','Docs. Generados')
    <div class="container">
        <div class="justify-content-center" >

        
            <div class="display-6">
                <input type="radio" wire:model.live="list" value="1"  >&nbsp;Constancia(s) de trabajo
                <input type="radio" wire:model.live="list" value="2" style="margin-left: 5%;" >&nbsp;Recibo(s) de Pago
            </div>
            <div class="container-fond">
            {{-- background-color: rgba(242, 245, 241, 0.863); padding:40px --}}
                @include('Administrar.DocsGenerados.filtrar')

                @if($list == 1)
                    @include('Administrar.DocsGenerados.ConstGen')
                @elseif($list == 2)
                    @include('Administrar.DocsGenerados.RecibGen')
                @endif
                <div style="float: right;">
                    <a target="_blank" href="{{asset('Constancias-Recibos.pdf')}}"  class="display-6 " wire:click="ExporConsul" >
                        <img src="{{ asset('images/ICONS/impress.png')}}"   width="50";  title="ver|imprimir"  style="cursor: pointer; ">
                        {{-- <button type="button"  wire:click="ExporConsul" style="color:black"  class="btn btn-info display-6"> --}}
                    </a>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
