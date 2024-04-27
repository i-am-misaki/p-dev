 @props([
     'href' => '',
     'theme' => 'primary',
])
 @php
     if(!function_exists('getThemeClassForButtonA')){
        function getThemeClassForButtonA($theme){
                return match ($theme){
                        'primary' => 'bg-white px-9 py-2 rounded-sm',
                        'secondary' => 'bg-cyan-800 text-white px-16 py-2 rounded-sm',
                        'default' => '',
                };
        }
     }
 @endphp

 <a href="{{ $href }}"
    class="{{ getThemeClassForButtonA($theme) }}">
        {{ $slot }}
 </a>



