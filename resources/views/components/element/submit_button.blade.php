<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-cyan-800 text-white px-16 py-2 rounded-sm']) }}>
    {{ $slot }}
</button>
