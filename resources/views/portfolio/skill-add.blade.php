@extends('layouts.skill_add')
@section('header')
    <x-portfolio.header_sec></x-portfolio.header_sec>
@endsection

@section('content')
    <div class="flex flex-col items-center my-20">
        <h2 class=" w-1/2 h-12 flex justify-center font-Roboto font-normal text-4xl">{{ $section }} に項目を追加</h2>
        <!-- {{ $section }}の値をjavascriptに送信するため -->
        <input type="hidden" id="section" name="section" value="{{ $section }}">
    </div>
    <form id="addForm" class="flex flex-col items-center mb-96">
        @csrf
        <div class="h-64 w-2/5">
            <div class="flex flex-col border-b mt-6 gap-2.5">
                <x-portfolio.input_label :value="__('項目名')" ></x-portfolio.input_label>
                <input type="text" id="learningName" name="learningName" class="border-none outline-none" />
            </div>
            <p id="errorMessage_learningName" style="color: red;"></p>
            <div class="flex flex-col border-b mt-10 gap-2.5">
                <x-portfolio.input_label :value="__('学習時間')" ></x-portfolio.input_label>
                <input id="studyHour" name="studyHour" type="number" class="border-none outline-none " />
            </div>
            <p class="w-36 h-5 font-Roboto font-normal text-xs text-slate-500">{{ __('分単位で入力してください') }}</p>
            <p id="errorMessage_studyHour" style="color: red;"></p>
            <div  class="flex justify-center mt-20">
                <x-portfolio.submit_button id="addLearning" class="text-white">{{ __('追加する') }}</x-portfolio.submit_button>
            </div>
        </div>
    </form>


    <!-- モーダルウィンドウ -->
    <div class="layer js-modal flex justify-center items-center h-screen w-screen">
        <div class="modal_contents flex justify-center item-center h-60 w-1/2 bg-white">
            <div class="modal_content flex-col w-full">
                <div class="flex justify-center item-center my-8 w-full">
                    <h4 id="succcessMessage" class="text-center font-Roboto font-bold text-lg w-64 h-14"></h4>
                </div>
                <div class="flex justify-center items-center h-12">
                    <!-- <x-portfolio.button id="backToAdd" class="backToAdd  w-48 py-4 px-10 rounded text-center font-normal font-Roboto">{{ __('編集に戻る') }}</x-portfolio.button> -->
                    <x-element.a-href :href=" route('skill-top') " class="backToAdd h-12 w-48 py-4 px-10 rounded text-center font-normal font-Roboto">{{ __('編集に戻る') }}</x-element.a-href>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
<x-portfolio.footer_sec></x-portfolio.footer_sec>
@endsection