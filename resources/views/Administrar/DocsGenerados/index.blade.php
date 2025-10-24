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
                  <div class="flex">
                    <div>
                        @if($conts->count())  
                           {{ $conts->links() }}  
                        @endif  
                    </div> 
                    <div style="margin-left: 40%;"> 
                         @if($conts->count() > 0)  
                           
                            <a target="_blank" href="{{asset('Constancias-Recibos.pdf')}}" wire:click="ExporConsul" >
                            <img src="{{ asset('images/ICONS/impress.png')}}"   width="50";  title="ver|imprimir"  style="cursor: pointer;">
                        </a>
                        @endif  
                    </div>
                </div>

            @elseif($list == 2)
                @include('Administrar.DocsGenerados.RecibGen')
                <div class="flex">
                    <div>
                        @if($recibs->count())  
                           {{ $recibs->links() }}  
                        @endif  
                    </div> 
                    <div style="margin-left: 40%;"> 
                         @if($recibs->count() > 0)  
                           
                            <a target="_blank" href="{{asset('Constancias-Recibos.pdf')}}" wire:click="ExporConsul" >
                            <img src="{{ asset('images/ICONS/impress.png')}}"   width="50";  title="ver|imprimir"  style="cursor: pointer;">
                        </a>
                        @endif  
                    </div>
                </div>
            @endif
            
         

                
        
        </div> 
         <br><br>
    </div>
