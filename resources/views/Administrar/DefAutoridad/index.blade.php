    <div>
        <div class="container-fond">
            <div class=" text-nowrap display-6 text-center title title-color">
                @if($vacio)                
                    NO HAS RESPONSABLE (AUTORIDAD) ASIGNADO               
                @else
                <label class="display-6">Actual</label><BR>
                    <?php echo $searchNom['full_name']; ?>
                @endif
            </div><br><br>
                @include('Administrar.DefAutoridad.update')
        </div>
            

            @if (session('mensaje'))
                <div class="alert alert-success">
                    {{ session('mensaje') }}
                </div>
            @endif


		</div>
    </div>
