<button {{ $attributes->merge(['type' => 'button', 'class' => 'bg-cyan-800 text-white py-2 px-14 rounded-sm']) }}>
    {{ $slot }}
</button>
