@if (session('change_user'))
    <div class="alert alert-success"> {{ session('change_user') }} </div>
@endif
@if (session('change_user_find'))
    <div class="alert alert-danger"> {{ session('change_user_find') }} </div>
@endif
<table class="table">
	<thead class="thead-dark">
        <tr align="center">
            <th>Nombre</th>
            <th>Correo</th>
            <th>Privilegio</th>
            <th>Estatus</th>
        </tr>
	</thead>
	<tbody>
    	@foreach($users as $use)
	        <tr>
			    <td>
				@foreach ($empls as $em)
				    @if ($use->personal_id == $em->id)
					    {{$em->name}}&nbsp;{{$em->last_name}}
				    @endif
				@endforeach
				</td>
				<td>{{$use->email}}</td>
				<td>@if ($use->privilege == 1)
						Usuario Administrador
					@elseif ($use->privilege == 2)
						Usuario con privilegios
					@elseif ($use->privilege == 3)
						Usuario de recursos
					@endif
				</td>

				<td>
					@if ($use->statud == 1)
        				<span class="text-primary" > Activo</span>
					@else
		    			<span class="text-muted"> Inactivo</span>
					@endif
					<button title="Cambiar" style="cursor: pointer;"   class="btn btn-warning" onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()"
                        wire:click="Statud({{$use->id}})">¿Cambiar?</button>
				</td>
				</tr>
	    @endforeach

    </tbody>
    </table>
    @if($users->count())
        <div style="color:blue;">
            {{ $users->links() }}    
        </div>
    @endif
<!--agregar paginacion y buscar-->

	<!--LLAMAR COMO Modals PARA CONFIRMAR -->
    @include("Administrar.AdmUsers.changeStatud")
