<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-cyan-800 text-white display: inline-block py-2 px-16 rounded-sm']) }}>
    {{ $slot }}
</button>
