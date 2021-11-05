<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Plan;
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
        // return $plans = Plan::all();
        // return view('auth.register', compact('plans'));

        
        

    }
    // @return \Illuminate\Http\Response 
    // public function showplan(Request $request) {
    //     $plans = Plan::all();

    //     $selectedID = Plan_Template::all(); 
        
    //     return view('auth.register', compact('id','name'));
    // }

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
            'firstname' => ['required', 'string', 'max:255'],
            'middlename'=> [ 'string', 'max:255'],
            'lastname' => [ 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'plan_id'=>['required', 'exists:plans,id'],
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'artistname' => $request->artistname,
            'email' => $request->email,
            'firstlineaddress' => $request->firstlineaddress,
            'secondlineaddress' => $request->secondlineaddress,
            'city' => $request->city,
            'county' => $request->county,
            'postcode' => $request->postcode,
            'password' => Hash::make($request->password),
            'plan_id' => $request->plan_id,
        ]);

        Auth::login($user);

        event(new Registered($user));

        

        return redirect(RouteServiceProvider::HOME);
    }
}
