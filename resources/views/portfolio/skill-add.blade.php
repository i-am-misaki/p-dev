<x-portfolio.base>
    <x-portfolio.header></x-portfolio.header>
    
    <div class="flex flex-col items-center my-20">
        <h2 class=" w-1/2 h-12 flex justify-center font-Roboto font-normal text-4xl ">{{ $section }} に項目を追加</h2>
    </div>
    <form class="flex flex-col items-center mb-96">
        <div class="h-64 w-2/5">
            <div class="flex flex-col border-b mt-6 gap-2.5">
                <x-portfolio.input_label :value="__('項目名')" ></x-portfolio.input_label>
                <input name="learningName" class="border-none outline-none"></input>
            </div>
            <div class="flex flex-col border-b mt-10 gap-2.5">
                <x-portfolio.input_label :value="__('学習時間')" ></x-portfolio.input_label>
                <input name="studyHour" type="number" class="border-none outline-none "></input>
            </div>
            <p class="w-36 h-5 font-Roboto font-normal text-xs text-slate-500">{{ __('分単位で入力してください') }}</p>
            <div  class="flex justify-center mt-20">
                <x-portfolio.submit_button class="text-white">{{ __('追加する') }}</x-portfolio.submit_button>
            </div>
        </div>
    </form>
    <x-portfolio.footer-base></x-portfolio.footer-base>
</x-portfolio.base>