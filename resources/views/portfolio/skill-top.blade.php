@extends('layouts.skill_base')
@section('header')
    <x-portfolio.header></x-portfolio.header>
@endsection

@section('content')
    <div class="flex justify-center py-10 w-full">
        <div class="w-2/3">
            <div id="ajax-div" class="relative">
            <form action="" method="post">
                <select id="tsuki" name='tsuki' class="-webkit-appearance-none -moz-appearance-none appearance-none outline-none w-24 h-11 rounded py-2 px-4 gap-2 font-Robot font-bold text-2xl"></select>
            </form>
            </div>
            <form class="">
                <div class="w-full flex justify-center h-3/5 p-10 gap-20 border border-solid border-black rounded-lg my-10">
                    <div class="w-full">
                        <div class="flex justify-between">
                            <div>
                                <x-portfolio.section>バックエンド</x-portfolio.section>
                                <span class="w-60 border-black border-b-2"></span>
                            </div>
                            
                            <div>
                                <x-element.a-href  class="w-24 h-14 py-4 px-8 text-center font-normal text-base">
                                    {{__('項目を追加する')}}
                                </x-element.a-href>
                            </div>
                        </div>
                        <div class="mt-10">
                            <table id="table1" class="rounded">
                                <tr class="h-6 border shadow-sm shadow-slate-300">
                                    <th class="w-60 h-14 py-4 pl-4 pr-10"><h4 class="w-11 h-6 font-Roboto font-medium text-sm">項目名</h4></th>
                                    <th class="w-60 h-14 p-4"><h4 class="w-14 h-6 font-Roboto font-medium text-sm">学習時間</h4></th>
                                    <th class="w-60 py-4 pl-4 pr-32"></th>
                                    <th class="w-60 py-4 pl-4 pr-32"></th>
                                </tr>
                                
                                    <tr class="border shadow-sm shadow-slate-300">
                                        <td class="w-60 h-12 py-4 pl-4 pr-10">
                                            <div class="w-full h-5"><h4 id="study_name1" class="h-5 w-10 tracking-widest font-Roboto font-normal text-sm"></h4></div>
                                        </td>
                                        <td class="w-60 h-16 p-4">
                                            <div class="w-40 h-10 gap-2.5">
                                                <input type="number" id="study_hour1" class="opacity-100 w-40 h-10 rounded"></input>
                                            </div>
                                        </td>
                                        <form>
                                            <td class="p-4">
                                                <x-portfolio.submit_button class="h-8 w-40 py-2 px-4 flex items-center justify-center border  border-cyan-700 bg-white text-cyan-900 text-sm">
                                                    {{__('学習時間を保存する')}}
                                                </x-portfolio.submit_button>
                                            </td>
                                        </form>
                                        <form>
                                            <td class="pl-10 pr-5 w-48">
                                                <x-portfolio.submit_button class="h-8 py-2 px-4 text-white bg-rose-400 flex items-center justify-center text-sm">
                                                    {{__('削除する')}}
                                                </x-portfolio.submit_button>
                                            </td>
                                        </form>
                                    </tr>
                                    
                            </table>
                        </div>
                    </div>
                </div> 
                <div class="w-full flex justify-center h-3/5 p-10 gap-20  border border-solid border-black rounded-lg my-10">
                    <div class="w-full">
                        <div class="flex justify-between">
                            <div>
                                <x-portfolio.section>フロントエンド</x-portfolio.section>
                                <span class="w-60 border-black border-b-2"></span>
                            </div>
                            
                            <div>
                                <x-element.a-href  class="w-24 h-14 py-4 px-8 text-center font-normal text-base">
                                    {{__('項目を追加する')}}
                                </x-element.a-href>
                            </div>
                        </div>
                        <div class="mt-10">
                            <table id="table2" class="rounded">
                                <tr class="h-6 border shadow-sm shadow-slate-300">
                                    <th class="w-60 h-14 py-4 pl-4 pr-10"><h4 class="w-11 h-6 font-Roboto font-medium text-sm">項目名</h4></th>
                                    <th class="w-60 h-14 p-4"><h4 class="w-14 h-6 font-Roboto font-medium text-sm">学習時間</h4></th>
                                    <th class="w-60 py-4 pl-4 pr-32"></th>
                                    <th class="w-60 py-4 pl-4 pr-32"></th>
                                </tr>
                                
                                    <tr class="border shadow-sm shadow-slate-300">
                                        <td class="w-60 h-12 py-4 pl-4 pr-10">
                                            <div class="w-full h-5"><h4 id="study_name2" class="h-5 w-10 tracking-widest font-Roboto font-normal text-sm"></h4></div>
                                        </td>
                                        <td class="w-60 h-16 p-4">
                                            <div class="w-40 h-10 gap-2.5">
                                                <input type="number"  id="study_hour2" class="opacity-100 w-40 h-10 rounded"></input>
                                            </div>
                                        </td>
                                        <form>
                                            <td class="p-4">
                                                <x-portfolio.submit_button class="h-8 w-40 py-2 px-4 flex items-center justify-center border  border-cyan-700 bg-white text-cyan-900 text-sm">
                                                    {{__('学習時間を保存する')}}
                                                </x-portfolio.submit_button>
                                            </td>
                                        </form>
                                        <form>
                                            <td class="pl-10 pr-5 w-48">
                                                <x-portfolio.submit_button class="h-8 py-2 px-4 text-white bg-rose-400 flex items-center justify-center text-sm">
                                                    {{__('削除する')}}
                                                </x-portfolio.submit_button>
                                            </td>
                                        </form>
                                    </tr>
                                    
                            </table>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-center h-3/5 p-10 gap-20  border border-solid border-black rounded-lg my-10">
                    <div class="w-full">
                        <div class="flex justify-between">
                            <div>
                                <x-portfolio.section>インフラ</x-portfolio.section>
                                <span class="w-60 border-black border-b-2"></span>
                            </div>
                            <div>
                                <x-element.a-href  class="w-24 h-14 py-4 px-8 text-center font-normal text-base">
                                    {{__('項目を追加する')}}
                                </x-element.a-href>
                            </div>
                        </div>
                        <div class="mt-10">
                            <table id="table3" class="rounded">
                                <tr class="h-6 border shadow-sm shadow-slate-300">
                                    <th class="w-60 h-14 py-4 pl-4 pr-10"><h4 class="w-11 h-6 font-Roboto font-medium text-sm">項目名</h4></th>
                                    <th class="w-60 h-14 p-4"><h4 class="w-14 h-6 font-Roboto font-medium text-sm">学習時間</h4></th>
                                    <th class="w-60 py-4 pl-4 pr-32"></th>
                                    <th class="w-60 py-4 pl-4 pr-32"></th>
                                </tr>
                                
                                    <tr id="tr" class="border shadow-sm shadow-slate-300">
                                        <td class="w-60 h-12 py-4 pl-4 pr-10">
                                            <div class="w-full h-5"><h4 id="study_name3" class="h-5 w-10 tracking-widest font-Roboto font-normal text-sm"></h4></div>
                                        </td>
                                        <td class="w-60 h-16 p-4">
                                            <div class="w-40 h-10 gap-2.5">
                                                <input type="number"  id="study_hour3" class="opacity-100 w-40 h-10 rounded" value=""></input>
                                            </div>
                                        </td>
                                        <form>
                                            <td class="p-4">
                                                <x-portfolio.submit_button class="h-8 w-40 py-2 px-4 flex items-center justify-center border  border-cyan-700 bg-white text-cyan-900 text-sm">
                                                    {{__('学習時間を保存する')}}
                                                </x-portfolio.submit_button>
                                            </td>
                                        </form>
                                        <form>
                                            <td class="pl-10 pr-5 w-48">
                                                <x-portfolio.submit_button class="h-8 py-2 px-4 text-white bg-rose-400 flex items-center justify-center text-sm">
                                                    {{__('削除する')}}
                                                </x-portfolio.submit_button>
                                            </td>
                                        </form>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        window.skills = @json($skills);
        window.currentMonth = @json($currentMonth);
    </script>
    <script src="{{ asset('/js/make_select.js') }}"></script>
@endsection

@section('footer')
<x-portfolio.footer-base></x-portfolio.footer-base>
@endsection