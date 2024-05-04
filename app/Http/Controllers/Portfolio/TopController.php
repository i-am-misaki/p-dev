<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TopController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $id = Auth::id();
        $data = User::where('id', $id)->get();
        
        return view('portfolio.mypage', ['data' => $data]);
        
    }
}
