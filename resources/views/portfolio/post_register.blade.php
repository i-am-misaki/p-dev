
<x-base>
    <x-header></x-header>
    <div class="flex flex-col items-center">
       <div class="my-20">
           <h2 class="flex justify-center font-normal text-3xl">新規登録</h2>
       </div>
       <form action="{{ route('register') }}" method="post">
        @csrf
        <!-- @if($errors->any())
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endif -->
            <div class="flex flex-col justify-center w-96 h-82 mb-80">
                <label class="border-b">氏名</label>
                <input name='name' class="mb-8 border-none outline-none border-b border-slate-500"></input>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                
                <label class="border-b">メールアドレス</label>
                <input name='email' type="email" class="mb-8 border-none outline-none border-b border-slate-500"></input>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <label class="border-b">パスワード</label>
                <input name='password'class="mb-8 border-none outline-none border-5 border-b-indigo-500"></input>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                
                <div class="text-center">
                <x-primary-button class="ms-4">{{ __('登録') }}</x-primary-button>
                </div>
            </div>
       </form>
    </div>
    <x-footer></x-footer>
</x-base>
