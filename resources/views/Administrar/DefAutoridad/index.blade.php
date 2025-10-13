<div class="container-borde-form">

     <x-title>ASIGNAR RESPONSABLE</x-title><br><br>
    <div class=" text-nowrap display-6 text-center title title-color">
        @if($vacio)                
            NO HAS RESPONSABLE (AUTORIDAD) ASIGNADO               
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
