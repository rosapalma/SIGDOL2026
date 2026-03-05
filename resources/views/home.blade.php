<x-app-layout>
@section('title','SIGDOL')


  {{-- <x-slot name="page">
      </x-slot> --}}


        
        <x-message/>
        <x-message-error/>
        <div class="justify-content-center flex-container" >
          <!-- MODAL CONSTANCIA DE TRABAJO-->
          <img src="{{asset('images/Modals/constancia.png')}}"  title="Solicitar constancia de trabajo" data-bs-toggle="modal" data-bs-target="#ConstModal"  class="img-modal" >
          <!-- MODAL RECIBO DE PAGO -->
          <img src="{{asset('images/Modals/recibo.png')}}" title="Solicitar Recibo de pago" data-bs-toggle="modal" data-bs-target="#RecPagModal"style="margin-left: 10%"  class="img-modal">
        </div>
        

</x-app-layout>
@include("Solicitar.const-trabaj")
@include("Solicitar.recibo-pago")

