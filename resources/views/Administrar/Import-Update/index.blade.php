<x-app-layout>
@section('title','Cargar|Actualizar Datos')

<div class="container ">
    <div class="row justify-content-center" >
        <div class="col-md-8">
            <div class="card">
            {{-- guia de imports --}}
                <div class="display-5 text-center">vease Guía para importar datos desde Excel<br>
                    <a target="_blank" href="{{asset('Guia para importar Excel.pdf')}}">
                        <span class="text-primary">clic aquí</span>
                    </a>
                </div>
                <x-message/>
                <div class="solicitar justify-content-center flex-container" >
             
                    <img src="{{asset('images/view-adm/ImpPers.png')}}"  data-bs-toggle="modal" data-bs-target="#UpDataModalPers" title="Importar Registros" class="img-modal" >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="{{asset('images/view-adm/ImpNom.png')}}"  data-bs-toggle="modal" data-bs-target="#ImportNominaExcel" title="Importar Registros" class="img-modal" >
                
                </div>

            </div><br><br>
        </div>
    </div>
</div>


</x-app-layout>

    <!-- MODAL UPDATE-DATA -->
@include("Administrar.Import-Update.update-data-pers")
@include("Administrar.Import-Update.import-data-nominaExcel")
