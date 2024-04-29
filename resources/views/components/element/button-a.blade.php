 @props([
     'href' => '',
     'theme' => 'primary',
])
 @php
     if(!function_exists('getThemeClassForButtonA')){
        function getThemeClassForButtonA($theme){
                return match ($theme){
                        'primary' => 'bg-white font-Roboto font-normal leading-5 text-lg px-9 py-2 rounded',
                        'secondary' => 'bg-cyan-800 text-white font-Roboto font-normal leading-5 text-lg px-20 py-4 rounded',
                        'default' => '',
                };
        }
     }
 @endphp

 <a href="{{ $href }}"
    class="{{ getThemeClassForButtonA($theme) }}">
        {{ $slot }}
 </a>



