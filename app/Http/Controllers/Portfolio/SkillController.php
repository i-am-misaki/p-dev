<?php

namespace App\Http\Controllers\Portfolio;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\learning_data;
use App\Models\category;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id();
        $skills = learning_data::where('user_id', $id)->get();
        // dd($skills);
        // $categories = [];

        // foreach($skills as $skill){
        //     // 各学習データインスタンスのカテゴリを取得する
        //     $cat = category::find($skill->category_id);
        //     if($cat){
        //         $categories[] = $cat;
        //         dd($categories);
        //     }
        // }

        // $categories = category::all();
        return view('portfolio.skill-top',
                         ['skills' => $skills],
                        //  ['categories' => $categories],
    );
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
    public function show(string $id)
    {
        //
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
