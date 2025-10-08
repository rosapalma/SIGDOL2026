@props(['value'])

<label {{ $attributes->merge(['class' => 'text-2xl text-center block font-weight ']) }}>
    {{ $value ?? $slot }} 
</label>
