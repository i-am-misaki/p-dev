<x-portfolio.base>
    <x-portfolio.header></x-portfolio.header>
    <div class="w-full py-20">
        <div class="flex justify-center mx-16">
            
                <!-- <div class="w-1/2 text-center">
                    <image width=300 height=260 class="m-auto h-80 bg-slate-300 rounded-full" />
                    <h4 class="text-normal font-Roboto text-xl text-center">アカデミー花子</h4>
                </div> -->
            <div class="m-auto">
                <span class=" block border border-gray-300 p-32 bg-gray-300 rounded-full"></span>
                <h4 class="text-normal font-Roboto text-xl text-center mt-6">アカデミー花子</h4>
            </div>
            
            <div id="content" class="w-1/2 gap-4 justify-center flex flex-col">
                <h2 class="align-middle w-36 font-Roboto text-4xl font-bold">自己紹介</h2>
                <span class="border-b-2 w-64"></span>
                <p class="align-middle gap-4 font-Roboto font-normal text-lg">自分の自己紹介文章が入ります。自分の自己紹介文章が入ります。自分の自己紹介文章が入ります。自分の自己紹介文章が入ります。自分の自己紹介文章が入ります。</p>
                <x-portfolio.button class="w-64 h-14 py-4 px-10 align-middle font-normal text-base font-Roboto">{{__('自己紹介を編集する')}}</x-portfolio.button>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="flex flex-col justify-center text-center gap-4 mt-12">
                <h2 class="w-53 h-11 font-Roboto font-bold text-4xl">学習チャート</h2>
                <span class="border-b-2 w-96"></span>
                <div>
                    <x-portfolio.button class="mt-12 w-41 h-12 py-3 px-10 align-middle font-normal text-base font-Roboto">{{__('編集する')}}</x-portfolio.button>
                </div>
            </div>
        </div>
    </div>
    <x-portfolio.footer></x-portfolio.footer>
</x-portfolio.base>

