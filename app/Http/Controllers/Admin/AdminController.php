<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
    
    public function show($id)
    {
        // ユーザーの詳細ページ
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

    public function deletedUserShow()
    {
        //ソフトデリートされたユーザーの詳細
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
}
