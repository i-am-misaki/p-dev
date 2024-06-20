@extends('layouts.skill_top')
@section('header')
    <x-portfolio.header_sec></x-portfolio.header_sec>
@endsection

@section('content')
    <div class="flex justify-center py-10 w-full">
        <div class="w-2/3">
            <div id="ajax-div" class="relative">
                <select id="tsuki" name='tsuki' class="w-24 h-11 rounded py-2 px-4 gap-2 font-Robot font-bold text-2xl"></select>
            </div>
            <form class="">
                <div class="w-full flex justify-center h-3/5 p-10 gap-20 border border-solid border-black rounded-lg my-10">
                    <div class="w-full">
                        <div class="flex justify-between">
                            <div class="w-60 h-11 gap-4 border-b-2 border-black">
                                <x-portfolio.section>バックエンド</x-portfolio.section>
                            </div>
                            
                            <div>
                                <x-element.a-href id="addition1" href="{{ url('/skill/add', ['portfolio.section' => 'バックエンド']) }}" class="w-24 h-14 py-4 px-8 text-center font-normal text-base">
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
                            </table>
                        </div>
                    </div>
                </div> 
                <div class="w-full flex justify-center h-3/5 p-10 gap-20  border border-solid border-black rounded-lg my-10">
                    <div class="w-full">
                        <div class="flex justify-between">
                            <div class="w-60 h-11 gap-4 border-b-2 border-black">
                                <x-portfolio.section>フロントエンド</x-portfolio.section>
                            </div>
                            
                            <div>
                                <x-element.a-href id="addition2" href="{{ url('/skill/add', ['portfolio.section' => 'フロントエンド']) }}" class="w-24 h-14 py-4 px-8 text-center font-normal text-base">
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
                            </table>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-center h-3/5 p-10 gap-20  border border-solid border-black rounded-lg my-10">
                    <div class="w-full">
                        <div class="flex justify-between">
                            <div class="w-60 h-11 gap-4 border-b-2 border-black">
                                <x-portfolio.section>インフラ</x-portfolio.section>
                            </div>
                            <div>
                                <x-element.a-href id="addition3" href="{{ url('/skill/add', ['portfolio.section' => 'インフラ']) }}" class="w-24 h-14 py-4 px-8 text-center font-normal text-base">
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
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- モーダルウィンドウ -->
    <div class="layer js-modal flex justify-center items-center h-screen w-screen">
        <div class="modal_contents flex justify-center item-center h-60 w-1/2 bg-white">
            <div class="modal_content flex-col w-full">
                <div class="flex justify-center item-center my-8 w-full">
                    <h4 id="succcessMessage" class="text-center font-Roboto font-bold text-lg w-64 h-14 break-all"></h4>
                </div>
                <div class="flex justify-center items-center h-12">
                    <x-portfolio.button id="backToAdd" class="backToAdd  w-48 py-4 px-10 rounded text-center font-normal font-Roboto">{{ __('編集に戻る') }}</x-portfolio.button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.skills = @json($skills);
        window.currentMonth = @json($currentMonth);
    </script>
    <script src="{{ asset('/js/make_select.js') }}"></script>
@endsection

@section('footer')
<x-portfolio.footer_sec></x-portfolio.footer_sec>
@endsection