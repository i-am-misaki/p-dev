<x-portfolio.base>
    <x-portfolio.header></x-portfolio.header>
    <div class="text-center my-12">
        <h2 class="font-Roboto font-normal text-4xl">自己紹介を編集する</h2>
    </div>
    <div class="w-2/5 m-auto justify-center">
        <form method="post" action="{{ route('mypage.update') }}" class="mb-96" enctype='multipart/form-data'>
            @csrf
            <div class="">
                <h4 class="font-Roboto font-normal text-xs tracking-wide text-slate-400">自己紹介文</h4>
                @foreach( $data as $userData )
                    <textarea type="text" name="introduction" class="w-full h-32 gap-7 border-none resize-none overflow-y-hidden">
                        {{ $userData->content}}
                    </textarea>
                @endforeach
                <div class="w-full  border border-b-1 border-slate-900"></div>
                <x-portfolio.error :messages="$errors->get('introduction')" class="mt-2" />
                <h4 class="mt-12 mb-2 font-Roboto font-normal text-xs tracking-wide text-slate-400">アバター画像</h4>
                <div x-data="{ field: { fileName: '' } }">
                    <label class="h-8 w-50 py-2 px-6 bg-slate-200 rounded">
                        <input type="file" id="file" name="myimage" x-on:change="field.fileName = $event.target.files[0].name" class="hidden"/>
                        <span x-show="!field.fileName">画像ファイルを添付する</span>
                        <span x-show="field.fileName" x-text="field.fileName.replace('C:\\fakepath\\', '')" ></span>
                    </label>
                </div>
                <!-- <button class="h-8 w-50 py-1 px-6 bg-slate-300 rounded">
                    <span class="w-40 h-4 font-Roboto font-normal text-sm items-center">
                        画像ファイルを添付する
                    </span>
                </button> -->
            </div>
            <div class="mt-12 flex justify-center">
                <x-portfolio.submit_button>自己紹介を確定する</x-portfolio.submit_button>
            </div>
        </form>
    </div>
    <x-portfolio.footer-base></x-portfolio.footer-base>
</x-portfolio.base>

