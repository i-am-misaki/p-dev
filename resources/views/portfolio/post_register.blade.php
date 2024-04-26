
<x-base>
    <x-header></x-header>
    <div class="flex flex-col items-center">
       <div class="my-20">
           <h2 class="flex justify-center font-normal text-3xl">新規登録</h2>
       </div>
       <form action="{{ route('register') }}" method="post">
        @csrf
            <div class="flex flex-col justify-center w-96 h-82 mb-80">
                <label >氏名</label>
                
                <input name='name' class="mb-8 border-none outline-none border-b border-slate-500"></input>
                <label >メールアドレス</label>
                
                <input name='email' type="email" class="mb-8 border-none outline-none border-b border-slate-500"></input>
                <label >パスワード</label>
                
                <input name='password'class="mb-8 border-none outline-none border-5 border-b-indigo-500"></input>
                <div class="text-center">
                    <x-element.button-a  theme="secondary">登録する</x-element.button-a>
                </div>
            </div>
       </form>
    </div>
    <x-footer></x-footer>
</x-base>
