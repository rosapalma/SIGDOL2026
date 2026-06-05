<x-app-layout>
@section('title','SIGDOL')


  {{-- <x-slot name="page">
      </x-slot> --}}

        <x-message/>
        <x-message-error/>
       <div class="div-center flex-container" style="display: flex; justify-content: center; align-items: center; gap: 40px;">
            <img src="{{asset('images/Modals/constancia.png')}}" title="Solicitar constancia de trabajo" data-bs-toggle="modal" data-bs-target="#ConstModal" class="img-modal" style="width: 320px; height: auto; cursor: pointer;">
            
            <img src="{{asset('images/Modals/recibo.png')}}" title="Solicitar Recibo de pago" data-bs-toggle="modal" data-bs-target="#RecPagModal" class="img-modal" style="width: 320px; height: auto; cursor: pointer;">
        </div>

        

</x-app-layout>
@include("Solicitar.const-trabaj")
@include("Solicitar.recibo-pago")