
<header class="w-full bg-cyan-800 ">
    <div class="flex justify-between py-10 px-10">
        <a href="{{ route('top') }}" class="text-white font-bold font-Roboto text-4xl">My Portfolio</a>
        @if(Route::has('login'))
            @auth
            <form method="post" action="{{ route('logout') }}">
            @csrf
                <x-element.button-a onclick="event.preventDefault(); this.closest('form').submit();">
                    {{__('ログアウト')}}
                </x-element.button-a>  
            </form>
            @else
            <x-element.button-a href="{{ route('login') }}">ログイン</x-element.button-a>
            @endauth
        @endif
    </div>
</header>


