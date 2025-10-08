 <div class="display-5" style="margin-left:5%">
  <span class="text-success"> BUSCAR</span>
  <select wire:model.live="anio" class="form-select-lg mb-3" aria-label=".form-select-lg example">
    <option value="">Año</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
  </select>
  @if ($list==1)
    &nbsp;&nbsp;<select wire:model.live="tipo"  class="form-select-lg mb-3" style="margin-right: 7%;" aria-label=".form-select-lg example" required>
      <option value="1">Todas</option>
      <option value="1">Básica</option>
      <option value="2">Con Sueldo Base</option>
      <option value="3">Con Sueldo Integral</option>
      {{-- <option value="4">Para Sobreviviente</option> --}}
    </select>
  @endif

</div>
