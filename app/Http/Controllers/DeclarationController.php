<?php

namespace App\Http\Controllers;

use App\Models\declaration;
use App\Models\User;
use App\Models\AuditTrail;
use App\Http\Controllers\AuditTrailController;
use App\Http\Requests\StoredeclarationRequest;
use App\Http\Requests\UpdatedeclarationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;

class DeclarationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $declare = declaration::all();
        // $user_dispatches = Disspath::paginate(8);

        $user = Auth::user();
        $declare_user = declaration::where("userID", "=", $user->id)->orderby('id', 'desc')->paginate(10);
    
        $name=$user->name;
        $role = $user->role;
        $email = $user->email;

        if($email != 'null'){
            switch ($role){
                case 'admin':
                    return view('declaration.index2',[ 

                            'declare'=> $declare,
                            'user'=> $user    
                        
                        ]);
                    break;
                case 'user':
                    return view('declaration.index',[ 

                            'declare_user'=> $declare_user,
                            compact('user', 'declare_user')    
                        
                        ]);
                    break;
                case 'hod':
                    return view('declaration.index3',[ 

                        'declare'=> $declare    
                    
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
        return view('declaration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredeclarationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredeclarationRequest $request)
    {
        if(!empty($request->file('print'))){
            $print = $request->file('print')->store('print');
        }

        $declare = new Declaration;
        // $user = Auth::user();
        $user = $request->user();

        $audit = new AuditTrail;
        
        $audit->name = $user->name;
        $audit->email = $user->email;
        $audit->role = $user->role;

        $audit->description = $user->name. 'Create declaration';

        $declare->userID =$user->id;
        $declare->declareDate = $request->declareDate;
        $declare->offerDate = $request->offerDate;
        $declare->type = $request->type;
        $declare->description = $request->description;
        $declare->estimateValue = $request->estimateValue;
        $declare->status= 'pending';
        $declare->print = $print;

        // dd($declare);

        $declare->save();
        $audit->save();

        return redirect("/declaration");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\declaration  $declaration
     * @return \Illuminate\Http\Response
     */
    public function show(declaration $declaration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\declaration  $declaration
     * @return \Illuminate\Http\Response
     */
    public function edit($declare)
    {
        $declare = declaration::find($declare);
        return view('declaration.edit',[
            'declare' => $declare
            ]);
            // dd($declare);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedeclarationRequest  $request
     * @param  \App\Models\declaration  $declaration
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedeclarationRequest $request,$declare)
    {
        
        $declare = declaration::find($declare);
        // if(!empty($request->file('print'))){
            
            
            // $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            // if(file_exists($storagePath.$print)) unlink($storagePath.$print);
            // if (File::exists($print)) {
                // unlink($print);
                // uniqid() . $print->getClientOriginalName();
                // File::delete($print.'/print');
                // Storage::delete(public_path($print));


                if ($request->file('print')) {
                    if ($declare->print) {
                        // get filename
                        $filename = str_replace('/storage/print/', '', $declare->print);
                        // remove old image
                        unlink(storage_path('app/public/'.$filename));
                    }
                    // add new image
                    $print=$request->file('print')->store('print');
                    // $url = Storage::url($path);
                  
                    $declare->print = $print;
                  }
        
        $declare->declareDate = $request->declareDate;
        $declare->offerDate = $request->offerDate;
        $declare->type = $request->type;
        // $declare->print = $request->file('print')->store('print');
        $declare->description = $request->description;
        $declare->estimateValue = $request->estimateValue;
        $declare->status = $request->status;
        $declare->approval = $request->approval;
        // dd($declare);
    
        $declare->save();

        return redirect("/declaration");
        
    }

    public function edit2($declare)
    {
        $declare = declaration::find($declare);
        return view('declaration.edit2',[
            'declare' => $declare
            ]);
            // dd($declare);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\declaration  $declaration
     * @return \Illuminate\Http\Response
     */
    public function destroy($declare)
    {
        $declare = declaration::find($declare);
        $declare->delete();
        return redirect('/declaration');
        
    }
}
