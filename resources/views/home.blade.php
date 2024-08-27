<x-app-layout>
@section('title','SIGDOL')

  {{-- <x-slot name="page">
      </x-slot> --}}

<div class="container " style="background-color: rgba(0, 0, 0, 0.2); margin-top:1%;">
    <div class="row justify-content-center" >
        <div class="col-md-8" style="background-color: rgba(0, 0, 0, 0.2);">
          <div class="card">
            @if ((Auth::user()->privilege==3))
                <img src="{{asset('images/SIGDOL/Sistema de gestión.png')}}" style="width: 30%; margin-left:35%; margin-top:3%;">
            @endif
            <x-message/>
            <x-message-error/>
            <div class="solicitar justify-content-center flex-container" >
              <!-- MODAL CONSTANCIA DE TRABAJO-->
              <img src="{{asset('images/Modals/constancia.png')}}"   title="Solicitar constancia de trabajo" data-bs-toggle="modal" data-bs-target="#ConstModal" title="Solicitar constancia de trabajo">
              &nbsp;&nbsp;&nbsp;
              <!-- MODAL RECIBO DE PAGO -->
              <img src="{{asset('images/Modals/calcular.png')}}" title="Solicitar Recibo de pago" data-bs-toggle="modal" data-bs-target="#RecPagModal">
            </div>
          </div>
        </div>
    </div>
</div>


</x-app-layout>
@include("Solicitar.const-trabaj")
@include("Solicitar.recibo-pago")

