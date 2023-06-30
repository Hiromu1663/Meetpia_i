<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Join;
use App\Models\Favorite;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Carbon\Carbon;


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
            $projects = $query->whereDate('end_time', '>', Carbon::now())->take(8)->get();
        
            $business = Project::where('genre', 'Business')->whereDate('end_time', '>', Carbon::now())->search($search)->take(6)->get();
            $hobbies = Project::where('genre', 'Hobby')->whereDate('end_time', '>', Carbon::now())->search($search)->take(6)->get();
            $study = Project::where('genre', 'Study')->whereDate('end_time', '>', Carbon::now())->search($search)->take(6)->get();
            $trades = Project::where('genre', 'Trade')->whereDate('end_time', '>', Carbon::now())->search($search)->take(6)->get();
            $others = Project::where('genre', 'Others')->whereDate('end_time', '>', Carbon::now())->search($search)->take(6)->get();
        } else {
            // 検索がない場合の処理
            $projects = Project::orderBy('created_at', 'DESC')->whereDate('end_time', '>', Carbon::now())->take(8)->get();
            $business = Project::where('genre', 'Business')->whereDate('end_time', '>', Carbon::now())->take(6)->get();
            $hobbies = Project::where('genre', 'Hobby')->whereDate('end_time', '>', Carbon::now())->take(6)->get();
            $study = Project::where('genre', 'Study')->whereDate('end_time', '>', Carbon::now())->take(6)->get();
            $trades = Project::where('genre', 'Trade')->whereDate('end_time', '>', Carbon::now())->take(6)->get();
            $others = Project::where('genre', 'Others')->whereDate('end_time', '>', Carbon::now())->take(6)->get();

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
            'max_number' => ['required', 'integer'],
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
        $project->max_number = $request->max_number;
        $project->hot = 0;
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
        
        $createIds = Project::where('user_id', $id)->pluck('id')->toArray();
        $joinIds = Join::where('user_id', $id)->pluck('project_id')->toArray();
        $favoriteIds = Favorite::where('user_id', $id)->pluck('project_id')->toArray();
        $allIds = array_merge($createIds, $joinIds, $favoriteIds);
        $allIds = array_unique($allIds);
        $projects = Project::whereIn('id', $allIds)->orderBy('start_time', 'asc')->get();
        $create = Project::whereIn('id', $createIds)->orderBy('start_time', 'asc')->get();
        $join = Project::whereIn('id', $joinIds)->orderBy('start_time', 'asc')->get();
        $favorite = Project::whereIn('id', $favoriteIds)->orderBy('start_time', 'asc')->get();

        return view('user.show', compact('user', 'age', 'projects', 'create', 'join', 'favorite'));
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
        $joinCount = Join::where('project_id', $project->id)->count();
        
        return view('user.show_project', compact('project', 'joinCount'));

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
       
            return redirect()->route("user.show_project", $project->id);
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

    // Review
    public function createReview($id)
    {
        $join = Join::find($id);
       
        return view('user.review', compact('join'));
    }
    
    public function storeReview(Request $request, $id)
    {
        $request->validate([
            "score" => ["required", "integer", 'in:1,2,3,4,5'],
            "review_comment" => ["nullable", "string"],
        ]);

        $join = Join::find($id);
        $join->score = $request->score;
        $join->review_comment = $request->review_comment;
        $join->save();
        $user = User::find($join->project->user_id);
        $current_scores = $user->scores;
        $user->scores = $current_scores + $join->score;
        $current_scored_count = $user->scored_count;
        $user->scored_count = $current_scored_count + 1;
        $user->save();

        return redirect()->route("user.show", auth()->user()->id);
      
    }
      
    // Contact機能
    public function contactForm(Request $request)
    {
        return view('user.contact.form');
    }

    public function contactConfirm(Request $request, $project_id)
    {
        $validatedData = $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "string"],
            "message" => ["required", "string"],
        ]);

        $user = Auth::user();
        
    
        return view('user.contact.confirm', [
            'inputs' => $validatedData,
            'user' => $user,
            'project_id' => $project_id
        ]);
    }

    public function contactSend(Request $request, $project_id)
    {
        $validatedData = $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "string"],
            "message" => ["required", "string"],
        ]);

        $user = Auth::user();
        $project = Project::find($project_id);
    
        Contact::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'message' => $validatedData['message'],
            'project_id' => $project->id,
            'user_id' => $user->id,
        ]);

        return view('user.contact.send', ['project' => $project_id]);
    }

    public function contactIndex()
    {

    $user_id = auth()->id();
    $project_ids = User::findOrFail($user_id)->projects->pluck('id');
    $contacts = Contact::whereIn('project_id', $project_ids)->get();

    return view('user.contact.index', ['contacts' => $contacts]);
    }
}

