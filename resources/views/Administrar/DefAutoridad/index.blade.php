<div class="row container-borde-form overflow-auto">

     <x-title>ASIGNAR RESPONSABLE</x-title><br><br>
    <div class=" text-nowrap display-6 text-center title title-color">
        @if($vacio)    
            <p class="" style="width: 20%;">NO HAY AUTORIDAD ASIGNADO(A)</p>          
        @else
            <label class="display-6">Actual</label><BR>
            <?php echo $searchNom['full_name']; ?>
        @endif
    </div><br>
                @include('Administrar.DefAutoridad.update')

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
</div>
