
<x-portfolio.base>
    <x-portfolio.header></x-portfolio.header>
    <div class="flex flex-col items-center">
       <div class="my-20">
           <h2 class="flex justify-center font-normal font-Roboto text-4xl">新規登録</h2>
       </div>
       <form action="{{ route('register') }}" method="post">
        @csrf
            <div class="flex flex-col justify-center  w-96 h-82 mb-80">
                <div class="flex flex-col border-b mt-6 gap-2.5">
                    <x-portfolio.input_label for="name" :value="__('氏名')" />
                    <input name='name' class="border-none outline-none"></input>
                </div>
                <x-portfolio.error :messages="$errors->get('name')" class="mt-2" />
                <div class="flex flex-col border-b mt-6 gap-2.5">
                    <x-portfolio.input_label for="email" :value="__('メールアドレス')" />
                    <input name='email' type="email" class="border-none outline-none "></input>
                </div>
                <x-portfolio.error :messages="$errors->get('email')" class="mt-2" />
                <div class="flex flex-col border-b mt-6 gap-2.5">
                    <x-portfolio.input_label for="password" :value="__('パスワード')" />
                    <input type="password" name='password'class=" border-none outline-none "></input>
                </div>
                <x-portfolio.error :messages="$errors->get('password')" class="mt-2" />
                
                <div class="flex justify-center mt-12">
                    <x-portfolio.submit_button class="text-white">{{ __('登録する') }}</x-portfolio.submit_button>
                </div>
                <!-- class="display: inline-block px-16" -->
            </div>
       </form>
    </div>
    <x-portfolio.footer></x-portfolio.footer>
</x-portfolio.base>
