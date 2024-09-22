<x-app-layout>
@section('title','SIGDOL')


  {{-- <x-slot name="page">
      </x-slot> --}}

<div class="container ">
  <div class="row justify-content-center" >
    <div class="col-md-8">
      <div class="card">

        @if ((Auth::user()->privilege==3))
          <div align="center">
            <img src="{{asset('images/SIGDOL/Sistema de gestión.png')}}"  class="logo-view-home"  style="">
          </div>
        @endif
        <x-message/>
        <x-message-error/>
        <div class="solicitar justify-content-center flex-container" >
          <!-- MODAL CONSTANCIA DE TRABAJO-->
          <img src="{{asset('images/Modals/constancia.png')}}"   title="Solicitar constancia de trabajo" data-bs-toggle="modal" data-bs-target="#ConstModal" class="img-modal">
          &nbsp;&nbsp;&nbsp;
          <!-- MODAL RECIBO DE PAGO -->
          <img src="{{asset('images/Modals/calcular.png')}}" title="Solicitar Recibo de pago" data-bs-toggle="modal" data-bs-target="#RecPagModal" class="img-modal">
        </div>
        
      </div><br><br>
    </div>
  </div>
</div>


</x-app-layout>
@include("Solicitar.const-trabaj")
@include("Solicitar.recibo-pago")

