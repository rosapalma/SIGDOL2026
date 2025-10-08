@props(['value'])

<label {{ $attributes->merge(['class' => 'text-lg text-center text-slate-400 text-xs ']) }}>
    {{ $value ?? $slot }} 
</label>