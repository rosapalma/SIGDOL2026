<!-- desde componente register-user -->

@if (Auth::user()->privilege == 1)
<div class="container-borde-form">
            <x-close></x-close>
    <div class="justify-content-center">
        <div class="">
            <p class="title text-center">Nuevo Usuario </p>
            
            <div  style="padding:20px; ">
                @if (session('mensaje'))
                    <div class="alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                
                <!-- -------------CEDULA------------ -->
                <div class="col-md-8">
                    <input type="text" wire:model="cedula"  class="form-control text-bold text-primary" align="center" autofocus placeholder="Cédula" onkeyUp="return ValNumero(this);" wire:change="verif">
                </div>
            
                <div>
                    <label class="display-7" style="background-color: rgba(130, 235, 186, 0.2);">{{$full_name}}</label>
                </div>

                <!-- -------------EMAIL------------ --> 
                <div class="col-md-8">
                    <input type="email" wire:model="email" wire:change="ValidEmail" class="form-control text-bold text-primary" placeholder="E-mail">
                </div>
                <br>
                

 <!-- ------------PRIVILEGIO/ROL------------ -->

                <div class="col-md-8">
                    <select wire:model="privilege" class="form-control text-bold text-primary">
                            <option value="">rol/privilegio</option>
                            <option value="2">Usuario con privilegios</option>
                            <option value="3">Usuario de recursos</option>
                            <option value="1">Administrador</option>
                        </select>
                    </div><br>


<!-- ------------PASSWORD/CONFIRMED------------ -->
                <div class="col-md-8">
                    <input type="txt" wire:model="password" placeholder="Password"  class="form-control text-bold" required>
                        {{-- @error('password') <span class="text-danger text-center">{{ $message }}</span> @enderror --}}
                </div>

                <div class="col-md-8">
                    <input  type="txt" class="form-control text-bold text-primary" wire:model="password_confirmation" placeholder="Confirmar" required>
                    @error('passwort-bold text-primary"d_confirmation') <span class="text-danger text-center">{{ $message }}</span> @enderror
                </div> <br><br>

<!--BTN -->
<x-button wire:click="create()">
    {{ __('Registrar') }}
</x-button>

        </div>
        </div>
        </div>
    </div>

@else
<br><br><br>
<p class="display-3 text-center">No esta autorizado a visitar este sitio</p>
@endif
