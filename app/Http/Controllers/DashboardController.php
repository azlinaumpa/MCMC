<?php

namespace App\Http\Controllers;

use App\Models\dashboard;
use App\Models\user;
use App\Models\declaration;
use App\Http\Requests\StoredashboardRequest;
use App\Http\Requests\UpdatedashboardRequest;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $count_user= user::count();
        $count_declare= declaration::count();
        $count_declare_user= declaration::where("userID", "=", $user->id)->count();
        // $declare_user = declaration::where("userID", "=", $user->id)->orderby('id', 'desc')->paginate(10);
        $role = $user->role;
        $email = $user->email;

        if($email != 'null'){
            switch ($role){
                case 'admin':
                    return view('dashboard.admin', [
                        'count_user'=>$count_user,
                        'count_declare'=>$count_declare
                    ]);
                    break;
                case 'user':
                    return view('dashboard.user',[
                        'count_declare_user'=>$count_declare_user
                    ]);
                    break;
                case 'hod':
                    return view('dashboard.hod',[
                        'count_declare'=>$count_declare
                    ]);
                    break;
            }
        }
        else {
        Auth::logout();
        return view('dashboard.inactive');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedashboardRequest  $request
     * @param  \App\Models\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedashboardRequest $request, dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(dashboard $dashboard)
    {
        //
    }
}
