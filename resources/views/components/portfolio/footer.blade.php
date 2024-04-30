@slot('footer')
<footer class="x-10 w-full h-10 bg-cyan-800 flex items-center justify-center">
    @guest
        <h4 class="text-white font-Roboto leading-5 bg-cyan-800 font-normal text-lg">
            portfolio site
        </h4>
    @else
        <h4 class="text-white font-Roboto leading-5 bg-cyan-800 font-normal text-lg">
            {{ Auth::user()->name }}
        </h4>
    @endguest
</footer> 
@endslot