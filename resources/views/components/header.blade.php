{{-- @props(['style' => session('flash.bannerStyle', 'success'), 'message' => session('flash.banner')]) --}}
<nav class=""  style="background: #0047bb;">
    <img src="{{ asset('images/UPEL.png')}}">
    <div class="" style="display:flex" >
        <div>      
            <!-- ICONO HOME -->
            <span class="{{ request()->routeIs('dashboard','login','register') ? 'd-lg-none' : ''}}">
                <a href="{{url('/')}}">
                    <img src="{{asset('images/icons/home.png')}}" title="Inicio" style="cursor: pointer; width: 18%">
                </a>
            </span>
        </div>
    </div>
</nav>