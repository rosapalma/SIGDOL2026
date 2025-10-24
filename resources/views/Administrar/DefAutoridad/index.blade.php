<div class="">

     <x-title>ASIGNAR RESPONSABLE</x-title><br><br>
    <div class="display-6 text-center title title-color">
         <div class="box">  
        @if($vacio)    
            <p class="" style="">NO HAY AUTORIDAD ASIGNADO(A)</p>          
        @else
            <label class="display-6">Actual</label><BR>
            <p><?php echo $searchNom['full_name']; ?></p>
        @endif
    </div>
    </div><br>
                @include('Administrar.DefAutoridad.update')

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
</div>
