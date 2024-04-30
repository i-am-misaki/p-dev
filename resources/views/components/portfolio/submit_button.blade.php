<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block bg-cyan-800 text-white font-Roboto font-normal text-lg px-20 py-3.5 rounded']) }}>
    {{ $slot }}
</button>
