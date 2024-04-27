@slot('header')
<header class="w-full bg-cyan-800 ">
    <div class="flex justify-between py-10 px-10">
        <h1 class="text-white font-normal text-3xl">My Portfolio</h1>
        <!-- <a class="bg-white px-9 py-2 rounded-md" href="route('login')">ログイン</a> -->
        <x-element.button-a :href="route('login')">ログイン</x-element.button-a>    
    </div>
</header>
@endslot