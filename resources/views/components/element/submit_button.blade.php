<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-cyan-800 text-white px-14 rounded-sm']) }}>
    {{ $slot }}
</button>
