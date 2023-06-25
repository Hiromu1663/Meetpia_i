<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;


class BusinessController extends Controller
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
            $business = $query->where('genre', 'Business')->get();
        } else {
            // 検索がない場合の処理
            $business = Project::where('genre', 'Business')->get();
        }

        return view('user.business.index', compact('business'));

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
        // 不要
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 不要
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
        // 不要
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

    public function showProject($id)
    {
        $project = Project::find($id);
        return view('user.show-project', compact('project'));
    }
}
