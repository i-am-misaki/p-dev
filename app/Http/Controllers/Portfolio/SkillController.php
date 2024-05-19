<?php

namespace App\Http\Controllers\Portfolio;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\learning_data;
use App\Models\category;
use App\Http\Requests\Auth\SkillRequest;
use Illuminate\Support\Facades\DB;
use DateTime;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // 画面遷移した際、現在月のlearning_dataを表示
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
    // 項目追加ページに遷移
    public function create($section)
    {
        // $id = Auth::id();
        // if($id !== Auth::id()){
        //         abort(403, 'Unauthrized action.');
        // } 

        // dd($section);

        return view('portfolio.skill-add', ['section' => $section]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // 新しく項目、学習時間追加
    public function store(SkillRequest $request)
    {
        $id = Auth::id();
        if($id !== Auth::id()){
                abort(403, 'Unauthrized action.');
        }

        $request->validate([
            // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            // 'password' => ['required', Rules\Password::defaults()],
            'learningName' => ['required', 'string', 'max:50', 'unique:learning_data,name'] ,
            'studyHour' => ['required', 'regex:/^[0-]+$/'],
        ]);

        learning_data::create([
            'name' => $request->input('learningName'),
            'studyhour' => $request->input('studyHour'),
            'month' => $request->input('tsuki'),
        ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return redirect()->route('skill-top');
    }

    /**
     * Display the specified resource.
     */
    // 非同期処理を使って月選択後、その月のデータを表示
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
