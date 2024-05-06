<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $id = Auth::id();
        $data = User::where('id', $id)->get();

        return view('portfolio.mypage-edit', [
            'user' => $request->user(),
            'data' => $data,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request) //: RedirectResponse
    {
        $request->validate([
            'introduction' => ['required', 'string', 'max:200', 'min:50'] ,
            
        ]);

        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }
        // $request->user()->save();
       
            try{
                $data = Auth::user();
                $data->content = $request->input('introduction');
                $data->save();
                // *****ok↑
                
                // Storage::putFile('public/images', $data->image);
                // $data->image->save();
                // $dir = 'public/';
                // $file_name = $request->file('myimage')->getClientOriginalName();
                // $data->image = $request->file('myimage'); //->store('/public/images');
                // $data->image = basename($file_name);
                // $data->image = $dir . $file_name;
                
                $file_name = $request->file('myimage')->getClientOriginalName();
                // storage/app/public/imagesに格納
                $data->image = $request->myimage->storeAs('public/images', $file_name);
                // images/ファイル名でDBに格納する
                $data->image = 'images/' . $file_name;
                // dd($data->image);
                $data->save();
                

            } catch (Exception $e){
                return back()->with('msg_error', '編集できませんでした');
            };

            return Redirect::route('top')
                ->with('data', $data); 
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
