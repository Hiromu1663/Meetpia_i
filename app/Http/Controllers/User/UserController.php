<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
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
        // $image_at = uniqid() . '_' . time() . '.' . $request->file('image_at')->getClientOriginalExtension();
        // dd($request);
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images', $image);
        $request->validate([
            "title" => ["required", "string"],
            "contents" => ["required", "string"],
            "image" => ["nullable", "image"],
            'genre' => ['required', 'string', 'in:Business,Hobby,Study,Trade,Others'],
            'start_time' => ['required'],
            'end_time' => ['required', 'after:start_time'],
            'location' => ['nullable', 'string'],
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->contents = $request->contents;
        $project->image = $image;
        $project->user_id = Auth::id();
        $project->genre = $request->genre;
        $project->start_time = $request->start_time;
        $project->end_time = $request->end_time; 
        $project->location = $request->location;
        $project->save();

        return redirect()->route("user.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.show');
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
