<?php

namespace App\Http\Controllers\Portfolio;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\SkillRequest;
use App\Models\learning_data;
use App\Models\category;
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
        $skills = learning_data::where('user_id', $id)
                    // ->whereYear('month', now()->year)
                    // ->whereMonth('month', now()->month)
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
        // dd($section);

        return view('portfolio.skill-add', 
            ['section' => $section]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // 新しく項目、学習時間追加
    public function store(Request $request)
    {
   
        $id = Auth::id();
        
        $learningName = $request->input('learningName');
        $studyhour = $request->input('studyHour');
        $section = $request->input('section');
        // $section = $_POST['section'];
        $selectedMonth = $request->input('selectedMonth');
        // $selectedMonth = $_POST['selected_month'];
        
        $category = category::where('name', $section)
            ->first();
        
        // learning_dataに同じnameが存在するか確認
        $exist_skill = learning_data::where('user_id', $id)
            ->where('name', $learningName)
            ->where('category_id', $category->id)
            ->get();
        
        try {
            // learning_dataのname有無判定
            if($exist_skill->isEmpty()){
                $learning_data = new learning_data();
                $learning_data->user_id = $id;
                $learning_data->name = $learningName;
                $learning_data->studyhour = $studyhour;
                $learning_data->month = $selectedMonth;
                $learning_data->category_id = $category->id;
                $learning_data->save();
    
                return response()->json(['success_message' => "{$category->name} に {$learningName} を{$studyhour}分で追加しました！"]);
        //         // $succsess_message = "{$category->name} に {$learningName} を{$studyhour}分で追加しました！";
                // echo json_encode($succsess_message);
            } else {
                return response()->json(['error_message' => "{$learningName}は既に登録されています"]);
                // $error_message = "{$learningName}は既に登録されています";
                // echo json_encode($error_message);
            }
        } catch (Exception $e){
        //     // Log::error('ERROR STORING SKILL: '. $e->getMessage());
            return resonse()->json(['e_message' => 'データの追加中にエラーが発生しました'], 500);
        //     // $e_message = 'データの追加中にエラーが発生しました';
        //     // echo json_encode($e_message);
        }
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
        // $year_js = substr($selected_month, 0, 4);
        // $month_js = substr($selected_month, 5, 2);

        $skills = learning_data::where('user_id', $id)
                    // ->whereYear('month', $year_js)
                    // ->whereMonth('month', $month_js)
                    ->where('month', $selected_month)
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
