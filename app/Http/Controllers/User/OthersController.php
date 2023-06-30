<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OthersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->search;

        if ($search !== null) {
            // 検索がある場合の処理
            $query = Project::search($search)->orderBy('created_at', 'DESC');
            $others = $query->where('genre', 'Others')->whereDate('end_time', '>', Carbon::now())->get();
        } else {
            // 検索がない場合の処理
            $others = Project::where('genre', 'Others')->whereDate('end_time', '>', Carbon::now())->get();
        }

        return view('user.others.index', compact('others'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
}
