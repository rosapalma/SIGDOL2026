<!-- desde componente register-user -->

    <x-authentication-card> 
@if (Auth::user()->privilege == 1)
      
         <x-slot name="logo">
            <x-close></x-close>
                <x-title >
                    REGISTRO DE USUARIOS
                </x-title>   
                  <div  style="padding:20px; ">
          
             <x-validation-errors class="mb-4" />
                @if (session('mensaje'))
                <div class="alert alert-success">
                    {{ session('mensaje') }}
                </div>
            @endif
        </div>        
        </x-slot>
       

  

       
        
       
                <!-- -------------CEDULA------------ -->
        <div class="col-md-8">
                <input type="text" wire:model="cedula" exists:personals class="form-control text-bold text-primary" align="center" autofocus placeholder="CÉDULA" required onkeyUp="return ValNumero(this);" wire:change="verif">
        </div>
        <div>
            <label class="display-7" style="background-color: rgba(130, 235, 186, 0.2);">{{$full_name}}</label>
        </div>

            <!-- -------------EMAIL------------ --> 
        <div class="col-md-8">
            <input type="email" wire:model="email"  class="form-control text-bold text-primary" placeholder="E-MAIL" id="email" pattern=".+@example\.com" size="30" required >
        </div>
        <br>
             <!-- ------------PRIVILEGIO/ROL------------ -->
        <div class="col-md-8">
                <select wire:model="privilege" class="form-control text-bold text-primary">
                    <option value="">SELEC. ROL|PRIVILEGIO</option>
                    <option value="2">Usuario con privilegios</option>
                    <option value="3">Usuario de recursos</option>
                    <option value="1">Administrador</option>
                </select>
        </div><br><br>
         <div class="container-ps" >
                <select wire:model="ps1" class="form-select-lg block mt-1 w-full" id="inputGroupSelect01" aria-label=".form-select-lg example" :value="old('ps1')" required>
                     <option >PREGUNTA DE SEGURIDAD</option>
                    <option value="1">Marco o modelo de tu primer auto</option>
                    <option value="2">Nombre de tu primera mascota</option>
                    <option value="3">Lugar favorito donde te gusta ir de vacaciones</option>
                    <option>Deporte favorito</option>
                    <option>Comida Favorita</option>
                    <option>Nombre de tu mejor amigo(a) de la infancia</option>
              </select>           
                <input id="resp1" type="text"   wire:model="resp1" required placeholder="RESPUESTA" class="form-control"/>

           <br> <hr><br>
                 <select wire:model="ps2" class="form-select-lg block mt-1 w-full" id="inputGroupSelect01" aria-label=".form-select-lg example" :value="old('ps2')" required>
                    <option >PREGUNTA DE SEGURIDAD</option>
                    <option value="1">Marco o modelo de tu primer auto</option>
                    <option value="2">Nombre de tu primera mascota</option>
                    <option value="3">Lugar favorito donde te gusta ir de vacaciones</option>
                    <option>Deporte favorito</option>
                    <option>Comida Favorita</option>
                    <option>Nombre de tu mejor amigo(a) de la infancia</option>
              </select>     
                <x-input id="resp" type="text"   wire:model="resp2" required placeholder="RESPUESTA" class="form-control" style="padding-top:0;"/>

            </div><br><br>

            <!-- ------------PASSWORD/CONFIRMED------------ -->
        <div class="col-md-8">
                <input type="txt" wire:model="contraseña" placeholder="CONTRASEÑA"  class="form-control text-bold" required>
                        {{-- @error('password') <span class="text-danger text-center">{{ $message }}</span> @enderror --}}
               
        </div>   <label-ayuda class="text-muted">
                  Tu contraseña debe contener 8 o mas caracteres.
                </label-ayuda>

        <div class="col-md-8">
                <input  type="txt" class="form-control text-bold text-primary" wire:model="contraseña_confirmation" placeholder="CONFIRMAR" required>
                    @error('passwort-bold text-primary"d_confirmation') <span class="text-danger text-center">{{ $message }}</span> @enderror
        </div> <br><br>

        <!--BTN -->
        <x-button wire:click="create()">
            {{ __('Registrar') }}
        </x-button>
       


@else
<br><br><br>
<p class="display-3 text-center">No esta autorizado a visitar este sitio</p>
@endif
    </x-authentication-card>