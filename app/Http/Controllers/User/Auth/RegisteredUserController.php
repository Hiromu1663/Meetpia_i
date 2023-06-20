<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $avatar = $request->file('avatar')->getClientOriginalName();
        $request->file('avatar')->storeAs('public/images', $avatar);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phoneNumber' => ['required', 'string', 'unique:users'],
            'gender' => ['required', 'string'],
            'birth_year' => ['required', 'integer'],
            'birth_month' => ['required', 'integer'],
            'birth_day' => ['required', 'integer'],
            'address' => ['required', 'string'],
            'avatar' => ['nullable', 'image'],
            'status' => ['required', 'string', 'in:Employee,Civil Servant,Self-employed,Student,Artist,Doctor,Lawyer,Teacher,Engineer,Salesperson,Other,test'],
            'introduction' => ['nullable', 'text'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::guard('users')->login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'gender' => $request->gender,
            'birth_year' => $request->birth_year,
            'birth_month' => $request->birth_month,
            'birth_day' => $request->birth_day,
            'address' => $request->address,
            'avatar' => $avatar,
            'status' => $request->status,
            'introduction' => $request->introduction,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
