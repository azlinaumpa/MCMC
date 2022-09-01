<?php

namespace App\Http\Controllers;

use App\Models\regist;
use App\Models\User;
use App\Http\Requests\StoreregistRequest;
use App\Http\Requests\UpdateregistRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(regist $user)
    {
        $user = User::all();
        
        return view('regist.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('regist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreregistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreregistRequest $request)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'role' => ['in:admin,user,hod'],
            'role' => ['string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // dd($user);

        // event(new Registerked($user));
        // $user->save();

        // Auth::login($user);

        return redirect('/regist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\regist  $regist
     * @return \Illuminate\Http\Response
     */
    public function show(regist $regist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\regist  $regist
     * @return \Illuminate\Http\Response
     */
    public function edit(regist $regist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateregistRequest  $request
     * @param  \App\Models\regist  $regist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateregistRequest $request, regist $regist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\regist  $regist
     * @return \Illuminate\Http\Response
     */
    public function destroy(regist $regist)
    {
        //
    }
}
