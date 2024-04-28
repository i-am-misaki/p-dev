<x-portfolio.base-portfolio>
    <x-portfolio.header_title></x-portfolio.header_title>
    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex flex-col items-center mt-8">
           <h2 class="flex justify-center font-normal text-3xl">ログイン</h2>
     
        <form method="POST" action="{{ route('login') }}" class="mt-20 mb-7">
        @csrf
            @include('portfolio.flash-message')
            <div class="flex flex-col justify-center w-96 h-82">
                <div class="flex flex-col border-b mt-10">
                    <label class="text-slate-500">メールアドレス</label>
                    <input name='email' type="email" class="border-none outline-none"></input>
                </div>
                
                <div class="flex flex-col border-b mt-10">
                    <label class="text-slate-500">パスワード</label>
                    <input type="password" name='password'class="border-none outline-none"></input>
                </div>
                

                <div class="flex justify-center mt-10">
                    <x-portfolio.submit_button >
                        {{ __('ログインする') }}
                    </x-portfolio.submit_button>
                    <!-- class="display: inline-block px-16" -->
                </div>
            </div>
        </form>
    </div>
    <div class="flex justify-center mb-80">
        <x-element.button-a :href=" url('register')" theme='secondary'>
            {{ __('新規登録する') }}
        </x-element.button-a>
    </div>
    <x-portfolio.footer></x-portfolio.footer>
</x-portfolio.base-portfolio>

