<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function mytop(Request $request){

        return view('portfolio.mypage');
    }
}
