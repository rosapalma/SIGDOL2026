<!-- desde componente register-user -->

@if (Auth::user()->privilege == 1)
{{-- INVEST PRIVILEG --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" style="background-color: rgba(242, 245, 241, 0.863);">
            <p class="card-header display-6 text-bold text-center">Nuevo Usuario </p>
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
            
                <div align="center">
                    <label class="display-6" style="background-color: rgba(130, 235, 186, 0.2);">{{$name}} {{$last_name}}</label>
                </div>

                <!-- -------------EMAIL------------ --> 
                <div class="col-md-8">
                    <input type="email" wire:model="email" wire:change="ValidEmail" class="form-control text-bold text-primary" placeholder="E-mail">
                </div>
                        <br>
                        {{-- <label>&nbsp;&nbsp; Omitir la verificación de Email?
                            <input type="checkbox" wire:name="VerifEmail"  class="check"/>
                        </label> --}}
                

 <!-- ------------PRIVILEGIO/ROL------------ -->

                <div class="row mb-3" >
                    <label class="col-md-4 col-form-label text-md-end">{{ __('Privilegio | Rol') }}</label>
                    <div class="col-md-6">
                        <select wire:model="privilege" class="col-md-8 col-form-label">
                            <option value="">rol/privilegio</option>
                            <option value="2">Usuario con privilegios</option>
                            <option value="3">Usuario de recursos</option>
                            <option value="1">Administrador</option>
                        </select>
                    </div>
                </div>



<!-- ------------PASSWORD/CONFIRMED------------ -->
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                    <div class="col-md-6">
                        <input type="txt" wire:model="password" placeholder="Password"  class="form-control" required>
                        {{-- @error('password') <span class="text-danger text-center">{{ $message }}</span> @enderror --}}
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>
                    <div class="col-md-6">
                        <input  type="txt" class="form-control" wire:model="password_confirmation" placeholder="Confirmar" required>
                        @error('password_confirmation') <span class="text-danger text-center">{{ $message }}</span> @enderror
                    </div>
                </div> 

<!--BTN -->
    <button type="submit" class="btn btn-primary btn-block" wire:click="create()"> {{ __('Registrar') }}</button>
        </div>
        </div>
        </div>
    </div>

@else
<br><br><br>
<p class="display-3 text-center">No esta autorizado a visitar este sitio</p>
@endif
