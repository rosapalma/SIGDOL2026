<div align="center" required class="form-group">
  <span class="display-5"> Buscar por</span>
  <select wire:model.live="anio" class=" form-select-lg mb-3" aria-label=".form-select-lg example">
    <option value="">Año</option>
    <option value="2021">2021</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
  </select>
  @if ($list==1)
    <select wire:model.live="tipo"  class="form-select-lg mb-3" aria-label=".form-select-lg example" required>
      <option value="">Tipo de Constancia - todas</option>
      <option value="1">Básica</option>
      <option value="2">Con Sueldo Base</option>
      <option value="3">Con Sueldo Integral</option>
      <option value="4">Para Jubilado(a) || Pensionado</option>
      {{-- <option value="5">Para Sobreviviente</option> --}}
    </select>
  @endif
</div>
