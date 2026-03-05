<x-app-layout>
@section('title','Cargar|Actualizar Datos')

    <x-title style="margin-top: 2%;">
        CARGAR | ACTUALIZAR REGISTROS
    </x-title>               
                <x-message/>
                <div class="justify-content-center"  style="display: flex; margin-left:20%; margin-right: 20%;" >
                    <!-- PERSONAL -->
                    <div  class="card row" align="center"> 
                        <div class="col-md-8 fs-1 display-7" align="center" >
                        <img src="{{asset('images/Modals/ImpPers.png')}}" data-bs-toggle="modal" data-bs-target="#UpDataModalPers" title="Importar Registros" class="img-modal"> <span class="h5">IMPORTAR REGISTRO DE PERSONAL</span>

                         <x-sub-title >
                            VER GUIA PARA IMPORTAR DATOS DESDE EXCEL
                            <a target="_blank" href="{{asset('Guia para importar Excel.pdf')}}">
                                <span class="text-primary">clic aquí</span>
                            </a>
                         </x-sub-title>
                        </div>
                    </div>
                    <div> 
                          @livewire('delet-nomina-componet')
                    <!-- NOMINA -->
                    <div class="card row" align="center" style="margin-left: 10%">
                        <div class="col-md-8 fs-1 display-7" >
                            <img src="{{asset('images/Modals/ImpNom.png')}}"  data-bs-toggle="modal" data-bs-target="#ImportNominaExcel" title="Importar Registros" class="img-modal">
                            <span class="h5">IMPORTAR NOMINA DE EMPLEADOS</span>
                            <x-sub-title >
                                VER GUIA PARA IMPORTAR DATOS DESDE EXCEL
                                 <a target="_blank" href="{{asset('Guia para importar Excel.pdf')}}">
                                <span class="text-primary">clic aquí</span>
                            </a>
                           </x-sub-title>
                           
                        </div>
                    </div>
                </div>      

</x-app-layout>

    <!-- MODAL UPDATE-DATA -->
@include("Administrar.Import-Update.update-data-pers")
@include("Administrar.Import-Update.import-data-nominaExcel")
