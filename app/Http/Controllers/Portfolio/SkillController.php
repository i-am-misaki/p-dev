<?php

namespace App\Http\Controllers\Portfolio;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\learning_data;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use DateTime;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id();
        // $skills = learning_data::where('user_id', $id)->get();
        $currentMonth = now()->format('Y-m');
        // dd($currentMonth);
        $skills = learning_data::where('user_id', $id)
                    ->whereYear('month', now()->year)
                    ->whereMonth('month', now()->month)
                    ->get();
        
        return view('portfolio.skill-top',[
            'skills' =>$skills,
            'currentMonth' => $currentMonth,
        ]
            
        );
        // if($skills->isEmpty()){
        //     return response()->json(['error' => 'No data found for the selected month']);
        //    }
        // return response()->json($skills);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        
        // if($id !== Auth::id()){
        //     abort(403, 'Unauthrized action.');
        // }
        $selected_month = $request->input('tsuki');
        $id = Auth::id();
        
        // javascriptからpostデータを取得
        // $selected_month = $_GET;
        $year_js = substr($selected_month, 0, 4);
        $month_js = substr($selected_month, 5, 2);

        $skills = learning_data::where('user_id', $id)
                    ->whereYear('month', $year_js)
                    ->whereMonth('month', $month_js)
                    ->get();

       if($skills->isEmpty()){
        return response()->json(['error' => 'No data found for the selected month']);
       }
        

        // header('Content-Type: application/json; charset=UTF-8');

        return response()->json($skills);

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
