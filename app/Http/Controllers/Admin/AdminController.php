<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Project;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // ユーザー一覧

    public function index()
    {
        $users = User::select('id', 'name', 'email', 'created_at')->get();

        return view('admin.index', compact('users'));
    }


    // イベント一覧
    public function search(Request $request)
    {

        $search = $request->search;

        if ($search !== null) {
            // 検索がある場合の処理
            $query = Project::search($search)->orderBy('created_at', 'DESC');
            $events = $query->get();
        } else {
            // 検索がない場合の処理
            $events = Project::all();
        }

        return view('admin.event', compact('events'));
    }
    
    //ユーザー詳細表示
    public function show($id)
    {
        // $user = User::find($id);
        // return view('user.profile', compact('user'));
        // $user = User::findOrFail($id);
        // $birth_year = $user->birth_year;
        // $birth_month = $user->birth_month;
        // $birth_day = $user->birth_day;
        // $currentYear = date('Y');
        // $currentMonth = date('m');
        // $currentDay = date('d');
        // $age = $currentYear - $birth_year;
        // if ($currentMonth < $birth_month || ($currentMonth == $birth_month && $currentDay < $birth_day)) {
        // $age--; // 誕生日が来ていない場合は年齢を1つ引く
        // }
        // $project = Project::where('user_id', $id)->get();
    
        // return view('admin.show', compact('user', 'project', 'age'));
    }

    //Project詳細表示
    public function showProject($id)
    {
        $project = Project::find($id);
        return view('admin.show_project', compact('project'));
    }

    // ユーザーの一時的削除(ソフトデリート)
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();

        return redirect()
        ->route('admin.index');
    }

    // ソフトデリートされたユーザー一覧
    public function deletedUserIndex()
    {
        $deletedUsers = User::onlyTrashed()->paginate(5);

        return view('admin.deleted-users', compact('deletedUsers'));
    }

    public function deletedUserShow($id)
    {

    }

    // ソフトデリートされたユーザーの完全削除
    public function deletedUserDestroy($id)
    {
        User::onlyTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('admin.deleted-users.index');
    }
    
    // ソフトデリートされたユーザーの復元
    public function deletedUserRestore($id)
    {
        $restoredRecord = User::withTrashed()->findOrFail($id);
        $restoredRecord->restore();

        return redirect()->route('admin.deleted-users.index');
    }

    // Event削除
    public function destroyProject($id)
    {
        $project = Project::findOrFail($id)->delete();

        return redirect()
        ->route('admin.event');
    }

    // ソフトデリートされたEvent一覧
    public function deletedProjectIndex()
    {
        $deletedProjects = Project::onlyTrashed()->paginate(16);

        return view('admin.deleted_project', compact('deletedProjects'));
    }

    // ソフトデリートされたEventの詳細
    public function deletedProjectShow($id)
    {
        $project = Project::withTrashed()->findOrFail($id);
        return view('admin.deleted_project_show', compact('project'));
    }

    // ソフトデリートされたEventの完全削除
    public function deletedProjectDestroy($id)
    {
        Project::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.deleted_project.index');
    }
    
    // ソフトデリートされたEventの復元
    public function deletedProjectRestore($id)
    {
        $restoredRecord = Project::withTrashed()->findOrFail($id);
        $restoredRecord->restore();

        return redirect()->route('admin.deleted_project.index');
    }
}
