<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="flex justify-center bg-cyan-800">
        <h1 class="text-white">My Portfolio</h1>
    </header>
    <div>
        <h2 class="flex justify-center">ログイン</h2>
        <label>メールアドレス</label>
        <input></input>
        <label>パスワード</label>
        <input></input>
        <x-element.button-a :href="route('login')">ログイン</x-element.button-a>
        <x-element.button-a :href="route('register')">登録</x-element.button-a>
    </div>
</body>
</html>