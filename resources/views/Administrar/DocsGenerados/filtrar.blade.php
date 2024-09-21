
  <span class="display-5"> Buscar por</span>
  &nbsp;&nbsp;&nbsp;<label class="display-5" style="margen-left:5%;">Año</label>
  <select wire:model.live="anio" class="form-select-lg mb-3" aria-label=".form-select-lg example">
    <option value="">Seleccione</option>
    <option value="2024">2024</option>
    <option value="2023">2023</option>
    <option value="2022">2022</option>
  </select>

  @if ($list==1)
    &nbsp;&nbsp;&nbsp;<label class="display-5">Tipo de Constancia</label>
    <select wire:model.live="tipo"  class="form-select-lg mb-3" aria-label=".form-select-lg example" required>
      <option value="">Todas</option>
      <option value="1">Básica</option>
      <option value="2">Con Sueldo Base</option>
      <option value="3">Con Sueldo Integral</option>
      {{-- <option value="4">Para Sobreviviente</option> --}}
    </select>
  @endif
