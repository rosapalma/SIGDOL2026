<div class="container" style="padding-top:2%">
    <div class="row justify-content-center">
        <div class="container-fond">
            <small class=" text-nowrap display-5 text-center title title-color">
                @if($vacio)                
                    No hay autoridad (jefe) asignado               
                @else
                    <?php echo $searchNom['name'].' '.$searchNom['last_name']; ?>
                @endif
            </small>
            <div align="center">
                <img src="{{ asset('images/ICONS/actualizar.png')}}"  wire:click="Update" title="Cambiar" style="cursor: pointer; width: 15%">
            </div>
            

            @if (session('mensaje'))
                <div class="alert alert-success">
                    {{ session('mensaje') }}
                </div>
            @endif

            @if ($UpdJefe)
                @include('Administrar.DefAutoridad.update')
            @endif


		</div>
    </div>
</div>
