<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-cyan-800 text-white font-Roboto font-normal text-lg leading-5 display: inline-block px-20 py-4 rounded']) }}>
    {{ $slot }}
</button>
