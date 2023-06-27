<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;


class UserController extends Controller
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
            $projects = $query->take(8)->get();
        
            $business = Project::where('genre', 'Business')->search($search)->take(6)->get();
            $hobbies = Project::where('genre', 'Hobby')->search($search)->take(6)->get();
            $study = Project::where('genre', 'Study')->search($search)->take(6)->get();
            $trades = Project::where('genre', 'Trade')->search($search)->take(6)->get();
            $others = Project::where('genre', 'Others')->search($search)->take(6)->get();
        } else {
            // 検索がない場合の処理
            $projects = Project::orderBy('created_at', 'DESC')->take(8)->get();
            $business = Project::where('genre', 'Business')->take(6)->get();
            $hobbies = Project::where('genre', 'Hobby')->take(6)->get();
            $study = Project::where('genre', 'Study')->take(6)->get();
            $trades = Project::where('genre', 'Trade')->take(6)->get();
            $others = Project::where('genre', 'Others')->take(6)->get();

        }
        
        return view('user.index', compact('projects', 'business', 'hobbies', 'trades', 'study', 'others'));  

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
        $user = User::findOrFail($id);
        $birth_year = $user->birth_year;
        $birth_month = $user->birth_month;
        $birth_day = $user->birth_day;
        $currentYear = date('Y');
        $currentMonth = date('m');
        $currentDay = date('d');
        $age = $currentYear - $birth_year;
        if ($currentMonth < $birth_month || ($currentMonth == $birth_month && $currentDay < $birth_day)) {
        $age--; // 誕生日が来ていない場合は年齢を1つ引く
        }
        $projects = Project::where('user_id', $id)->get();
       
        return view('user.show', compact('user', 'projects', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
       
        return view('user.edit', compact('user'));
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
        $user = User::find($id);
        // 入力された現在のパスワードを検証
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        //     'phoneNumber' => ['required', 'string', Rule::unique('users')->ignore($user->id)],
        //     'gender' => ['required', 'string'],
        //     'birth_year' => ['required', 'integer'],
        //     'birth_month' => ['required', 'integer'],
        //     'birth_day' => ['required', 'integer'],
        //     'address' => ['required', 'string'],
        //     'status' => ['required', 'string', 'in:Employee,Civil Servant,Self-employed,Student,Artist,Doctor,Lawyer,Teacher,Engineer,Salesperson,Other,test'],
        //     'introduction' => ['nullable', 'text'],
        //     'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phoneNumber' => ['required', 'string', Rule::unique('users')->ignore($user->id)],
            'gender' => ['required', 'string'],
            'birth_year' => ['required', 'integer'],
            'birth_month' => ['required', 'integer'],
            'birth_day' => ['required', 'integer'],
            'address' => ['required', 'string'],
            'status' => ['required', 'string', 'in:Employee,Civil Servant,Self-employed,Student,Artist,Doctor,Lawyer,Teacher,Engineer,Salesperson,Other,test'],
            'introduction' => ['nullable', 'text'],
        ];
        
        if ($request->filled('new_password')) {
            $rules['new_password'] = ['required', 'confirmed', Rules\Password::defaults()];
        }
        
        $request->validate($rules);
        



            $user->name = $request->name;
            $user->email = $request->email;
            $user->phoneNumber = $request->phoneNumber;
            $user->gender = $request->gender;
            $user->birth_year = $request->birth_year;
            $user->birth_month = $request->birth_month;
            $user->birth_day = $request->birth_day;
            $user->address = $request->address;
            $user->status = $request->status;
            $user->introduction = $request->introduction;
            if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
            }
            $user->save();
           
            return redirect()->route("user.show", $user->id);
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

    //Project関係
    public function showProject($id)
    {
        $project = Project::find($id);
        
        return view('user.show_project', compact('project'));
    }
  
    public function editProject($id)
    {
        $project = Project::find($id);
       
        return view("user.edit-project", compact('project'));
    }

    public function updateProject(Request $request, $id)
    {
        $request->validate([
            "title" => ["required", "string"],
            "contents" => ["required", "string"],
            "image" => ["nullable", "image"],
            'genre' => ['required', 'string', 'in:Business,Hobby,Study,Trade,Others'],
            'start_time' => ['required'],
            'end_time' => ['required', 'after:start_time'],
            'location' => ['nullable', 'string'],
        ]);
        $project = Project::find($id);
        if ($request->hasFile('image')) { //画像がアップロードありの処理
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $image);
            $project->image = $image;
        }
            $project->title = $request->title;
            $project->contents = $request->contents;
            $project->genre = $request->genre;
            $project->start_time = $request->start_time;
            $project->end_time = $request->end_time; 
            $project->location = $request->location;
            $project->save();
       
            return redirect()->route("user.show-project", $project->id);
    }

    public function destroyProject($id)
    {
        Project::find($id)->delete();
     
        return redirect()->route("user.index");
    }
  
   // Introductionのみ編集
    public function editIntroduction($id)
    {
        $user = User::find($id);
       
        return view('user.edit-introduction', compact('user'));   
    }

    public function updateIntroduction(Request $request, $id)
    {
        $request->validate([
            'introduction' => ['nullable', 'string'],
        ]);
            $user = User::find($id);
            $user->introduction = $request->introduction;
            $user->save();
         
            return redirect()->route("user.show", $user->id);
    }

    // Avatarのみ編集
    public function editAvatar($id)
    {
        $user = User::find($id);
      
        return view('user.edit-avatar', compact('user'));   
    }

    public function updateAvatar(Request $request, $id)
    {
        $request->validate([
            'avatar' => ['nullable', 'image'],
        ]);
        $user = User::find($id);
        if ($request->hasFile('avatar')) { //画像がアップロードありの処理
            $avatar = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storeAs('public/images', $avatar);
            $user->avatar = $avatar;
            $user->save();
        }
          
        return redirect()->route("user.show", $user->id);
    }
}
