<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
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

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // dd($request->all());

        $user = User::create([
            'category' => $request->category,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            's_id'=> $request->s_id,
            't_id'=> $request->t_id,
            't_dept'=> $request->t_dept,
            't_designation' => $request->t_designation,
            'batch' => $request->batch,
            'section' => $request->section,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // dd(Auth::user()->id);
        $data = [
            'user_id' => Auth::user()->id,
            'sun_arr_time' => '8:00',
        ];
        DB::table('demands')->insert($data);

        return redirect(RouteServiceProvider::HOME);
    }
}
