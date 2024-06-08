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

        $currentMonth = now()->format('Y-m');
        $skills = learning_data::where('user_id', $id)
                    ->where('month', $currentMonth)
                    ->get();
        
        // 最新月を表示
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
        $selectedMonth = $request->input('selectedMonth');

        $category = category::where('name', $section)
            ->first();
        
        // learning_dataに同じnameが存在するか確認
        $exist_skill = learning_data::where('user_id', $id)
            ->where('name', $learningName)
            ->where('category_id', $category->id)
            ->where('month', $selectedMonth)
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

            } else {
                return response()->json(['error_message' => "{$learningName}は既に登録されています"]);
            }
        } catch (Exception $e){
        //     // Log::error('ERROR STORING SKILL: '. $e->getMessage());
            return response()->json(['e_message' => 'データの追加中にエラーが発生しました'], 500);
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
        // $selected_month = $_POST['selected_month'];
        $id = Auth::id();

        $skills = learning_data::where('user_id', $id)
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
    // 学習時間編集
    public function edit(Request $request)
    {
        $user_id = Auth::id();

        try {
                $learningId = $request->input('learningId');
                $studyhour = $request->input('studyHour');
                // if($studyhour == 0){
                //     return response()->json(['zero_message' => "学習時間は0以上の数字で入力してください"]);
                // } else {
                    $skills = learning_data::where('id', $learningId)
                                ->where('user_id', $user_id)
                                ->first();
    
                    $skills->studyhour = $studyhour;
                    $skills->save();
    
                    return response()->json(['success_message' => "{$skills->name}の学習時間を保存しました！"]);
                    // } else {
                    //     return response()->json(['error_message' => "編集を保存できませんでした。"]);
                    // }
                // }

        } catch (Exception $e){
            Log::error('ERROR UPDATING STUDY HOUR: '. $e->getMessage());
            return response()->json(['error_message' => 'データの編集中にエラーが発生しました'], 500);
        }
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
    // learning_data削除
    public function destroy(Request $request)
    {
        $user_id = Auth::id();

        try {
            $learningId = $request->input('learningId');

            $skills = learning_data::where('id', $learningId)
                        ->where('user_id', $user_id)
                        ->first();
            $skills->delete();

            return response()->json(['success_message' => "{$skills->name}を削除しました！"]);
            // } else {
            //     return response()->json(['error_message' => "編集を保存できませんでした。"]);
            // }
        } catch (Exception $e){
            Log::error('ERROR UPDATING STUDY HOUR: '. $e->getMessage());
            return response()->json(['error_message' => 'データの編集中にエラーが発生しました'], 500);
        }
    }
}
