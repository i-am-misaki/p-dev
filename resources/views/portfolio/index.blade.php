<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="w-full bg-cyan-800 ">
        <div class="flex justify-between py-10 px-10">
            <h1 class="text-white font-normal text-3xl">My Portfolio</h1>
            <a class="bg-white px-9 py-2 rounded-md" href="route('login')">ログイン</a>
        </div>
    </header>
    <div class="flex flex-col items-center">
       <div class="my-20">
           <h2 class="flex justify-center font-normal text-3xl">新規登録</h2>
       </div>
       <form >
           <div class="flex flex-col justify-center w-96 h-82 mb-80">
               <label name='name'>氏名</label>
               @error('name')
               <p style="color: red;">{{ $message }}</p>
               @enderror
               <input class="mb-8 border-none outline-none border-b border-slate-500"></input>
               <label name='email'>メールアドレス</label>
               @error('email')
               <p style="color: red;">{{ $message }}</p>
               @enderror
               <input class="mb-8 border-none outline-none border-b border-slate-500"></input>
               <label name='pass'>パスワード</label>
               @error('pass')
               <p style="color: red;">{{ $message }}</p>
               @enderror
               <input class="mb-8 border-none outline-none border-5 border-b-indigo-500"></input>
               <div class="text-center">
                   <x-element.button-a :href="route('register')">登録する</x-element.button-a>
               </div>
           </div>
       </form>
    </div>
    <footer>
        <h4 class="text-white w-full bg-cyan-800 flex justify-center">portfolio site</h4>
    </footer>
</body>
</html>