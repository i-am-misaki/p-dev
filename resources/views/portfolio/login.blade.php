<x-portfolio.base-portfolio>
    <x-portfolio.header_title></x-portfolio.header_title>
    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex flex-col items-center mt-8">
           <h2 class="flex justify-center font-normal text-3xl">ログイン</h2>
     
        <form method="POST" action="{{ route('login') }}" class="mt-20 mb-7">
            @csrf
            <div class="flex flex-col justify-center w-96 h-82">
                <label class="border-b">メールアドレス</label>
                <input name='email' type="email" class="mb-8 border-none outline-none border-b border-slate-500"></input>
                <x-portfolio.error :messages="$errors->get('email')" class="mt-2" />

                <label class="border-b">パスワード</label>
                <input name='password'class="mb-8 border-none outline-none border-5 border-b-indigo-500"></input>
                <x-portfolio.error :messages="$errors->get('password')" class="mt-2" />

                <div class="flex justify-center">
                    <x-portfolio.submit_button >
                        {{ __('ログインする') }}
                    </x-portfolio.submit_button>
                    <!-- class="display: inline-block px-16" -->
                </div>
            </div>
        </form>
    </div>
    <div class="flex justify-center mb-80">
        <x-portfolio.button :href=" url('register')" theme='secondary'>
            {{ __('新規登録する') }}
        </x-portfolio.button>
    </div>
    <x-portfolio.footer></x-portfolio.footer>
</x-portfolio.base-portfolio>