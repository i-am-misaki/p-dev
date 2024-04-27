
<x-portfolio.base>
    <x-portfolio.header></x-portfolio.header>
    <div class="flex flex-col items-center">
       <div class="my-20">
           <h2 class="flex justify-center font-normal text-3xl">新規登録</h2>
       </div>
       <form action="{{ route('register') }}" method="post">
        @csrf
            <div class="flex flex-col justify-center w-96 h-82 mb-80">
                <label class="border-b">氏名</label>
                <input name='name' class="mb-8 border-none outline-none border-b border-slate-500"></input>
                <x-portfolio.error :messages="$errors->get('name')" class="mt-2" />
                
                <label class="border-b">メールアドレス</label>
                <input name='email' type="email" class="mb-8 border-none outline-none border-b border-slate-500"></input>
                <x-portfolio.error :messages="$errors->get('email')" class="mt-2" />

                <label class="border-b">パスワード</label>
                <input name='password'class="mb-8 border-none outline-none border-5 border-b-indigo-500"></input>
                <x-portfolio.error :messages="$errors->get('password')" class="mt-2" />
                
                <div class="flex justify-center">
                    <x-portfolio.submit_button class="display: inline-block px-16">{{ __('登録') }}</x-portfolio.submit_button>
                </div>
            </div>
       </form>
    </div>
    <x-portfolio.footer></x-portfolio.footer>
</x-portfolio.base>
