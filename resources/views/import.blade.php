<x-app-layout>

<div class="container" style="background-color: rgba(0, 0, 0, 0.2); margin-top:1%;">
    <div class="row justify-content-center" >
        <div class="col-md-8" style="background-color: rgba(0, 0, 0, 0.2);">
          <div class="card">
            @if ((Auth::user()->privilege==3))
                <img src="{{asset('images/SIGDOL/Sistema de gestión.png')}}" style="width: 30%; margin-left:35%; margin-top:3%;">
            @endif
            <x-message/>
              {{-- PRUEBA IMPORT --}}

              <form action="{{ url('/importpers') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control" required>
                <br><br>
                <button type="sumit" class="btn btn-primary">Importar </button>
              </form>

              <br><br><h1>NOMINA</h1><br>

              <form action="{{ url('/importNominaExcel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control" required>
                <br><br>
                <button type="sumit" class="btn btn-primary">Importar </button>
              </form>


          </div>


        </div>
    </div>
</div>
   

</x-app-layout>
