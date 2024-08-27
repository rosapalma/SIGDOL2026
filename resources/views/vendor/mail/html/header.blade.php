@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'SIGDOL')
<img src="{{asset('images/SIGDOL/Sistema de gestión.png')}}" class="logo" alt="Gestionar Documentos Laborales">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
