<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-cyan-800 text-white px-10 py-2 rounded-md']) }}>
    {{ $slot }}
</button>
