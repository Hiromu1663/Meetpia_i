<?php

namespace App\Http\Controllers\User;

use App\Models\Favorite;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
        
    public function store(Request $request)
    {
       //
    }









    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



        public function toggle($id)
    {
        $user_id = Auth::user()->id;

        // すでにブックマークが存在するかチェック
        $existingFavorite = Favorite::where('project_id', $id)->where('user_id', $user_id)->first();

        if ($existingFavorite) {
            // ブックマークが存在する場合は削除
            $existingFavorite->delete();
        } else {
            // ブックマークが存在しない場合は新規作成
            $favorite = new Favorite();
            $favorite->project_id = $id;
            $favorite->user_id = $user_id;
            $favorite->save();
        }

        return redirect()->route("user.show-project", $id);
        // return redirect()->back();
    }

}

