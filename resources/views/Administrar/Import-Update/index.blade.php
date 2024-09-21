<x-app-layout>
@section('title','Carga|Actualiz. de Datos')

<div class="container ">
{{-- guia de imports --}}
                <div class="display-5 text-center">vease Guía para importar datos desde Excel<br>
                    <a target="_blank" href="{{asset('Guia para importar Excel.pdf')}}">
                        <span class="text-primary">clic aquí</span>
                    </a>
                </div>
    <div class="row justify-content-center" >
        <div class="col-md-8">
            <div class="card">

                
                <x-message/>
                <div class="row justify-content-center" >
                    <div class="flex">
                        <div>
                            <a href="" data-bs-toggle="modal" data-bs-target="#UpDataModalPers" title="Importar Registros">
                                <img src="{{asset('images/view-adm/ImpPers.png')}}"  style="cursor: pointer; border-radius: 10px; box-shadow: 0 15px 15px 0 #000000" >
                                {{-- <span class="display-6 text-black TEXT-CENTER">Importar Registros de Personal</span> --}}
                            </a>
                        </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <div>
                            <a href="" data-bs-toggle="modal" data-bs-target="#ImportNominaExcel" title="Importar Registros">
                                <img src="{{asset('images/view-adm/ImpNom.png')}}"  style="cursor: pointer; border-radius: 10px; box-shadow: 0 15px 15px 0 #000000" >
                                {{-- <span class="display-6 text-black">Importar Nómina de Empleados</span> --}}
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


</x-app-layout>

    <!-- MODAL UPDATE-DATA -->
      @include("Administrar.Import-Update.update-data-pers")
      @include("Administrar.Import-Update.import-data-nominaExcel")
