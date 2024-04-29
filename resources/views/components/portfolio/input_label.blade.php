@props(['value'])

<label {{ $attributes->merge(['class' => 'text-slate-500 mt-6 font-normal font-Roboto text-xs tracking-widest leading-3']) }}>
    {{ $value ?? $slot }}
</label>