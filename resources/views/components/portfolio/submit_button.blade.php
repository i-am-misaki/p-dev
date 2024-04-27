<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-cyan-800 text-white display: inline-block px-16 py-2 rounded-sm']) }}>
    {{ $slot }}
</button>
