<x-app-layout>

  {{-- <x-slot name="page">
      </x-slot> --}}

<div class="container" style="background-color: rgba(0, 0, 0, 0.2); margin-top:1%;">
    <div class="row justify-content-center" >
        <div class="col-md-8" style="background-color: rgba(0, 0, 0, 0.2);">
            <div class="card">
            @if ((Auth::user()->privilege==3))
                <img src="{{asset('images/SIGDOL/Sistema de gestión.png')}}" style="width: 30%; margin-left:35%; margin-top:3%;">
            @endif
                    @if (session('mensaje')) <!--Data actualizada -->
                      <div class="alert alert-success">
                      {{ session('mensaje') }}
                      </div>
                    @endif
                
                  @if (session('error'))
                    <div style="margin-top: 2%" class="alert alert-danger">
                      {{ session('error') }}
                    </div>
                  @endif
              <div class="solicitar" >
                <!-- MODAL CONSTANCIA DE TRABAJO-->
                <img src="{{asset('images/Modals/constancia.png')}}" class="solcicitar-img" width="50%"  title="Solicitar constancia de trabajo" data-bs-toggle="modal" data-bs-target="#ConstModal" title="Solicitar constancia de trabajo">
                &nbsp;&nbsp;&nbsp;
                <!-- MODAL RECIBO DE PAGO -->
                <img src="{{asset('images/Modals/calcular.png')}}"  class="solcicitar-img" width= "50%" title="Solicitar Recibo de pago" data-bs-toggle="modal" data-bs-target="#RecPagModal">
              </div>



            </div>
        </div>
    </div>


</div>

@include("Solicitar.const-trabaj")



@include("Solicitar.recibo-pago")






</x-app-layout>
