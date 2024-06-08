<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\learning_data;
use DateTime;

class TopController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $id = Auth::id();
        $data = User::where('id', $id)->get();

        $currentMonth = date('Y-m');    // 今月
        $oneMonthAgo = date('Y-m', strtotime(date('Y-m-1') . '-1 month'));    // 先月
        $twoMonthAgo = date('Y-m', strtotime(date('Y-m-2') . '-2 month'));    // 先々月
        // 別の取得方法
        // $currentMonth = now()->format('Y-m');
        // $oneMonthAgo = now()->subMonth(1)->format('Y-m');
        // $twoMonthAgo = now()->subMonth(2)->format('Y-m');

        $skills = learning_data::where('user_id', $id)
                                ->whereIn('month', [$currentMonth, $oneMonthAgo, $twoMonthAgo])
                                ->get();
        
        return view('portfolio.mypage', [
                    'data' => $data,
                    'skills' => $skills
                ]); 
    }
}
