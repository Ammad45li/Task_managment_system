<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AssingTask;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managers = Manager::with('user')->get();
       return view('admin.manager.index' , ['managers' =>$managers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manager.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required' ,'email'  , 'unique:users,email,' . Auth::id() . ',id'],
            'password' => ['required'],
            'picture' => ['mimes:png ,jpeg,jpg']
        ]);

        $file = $request['picture'];

        if ($file) {
            $file_name = 'madi-' . time() . '-' . $file->getClientOriginalName();
        } else {
            $file_name = 'default.png';
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $file_name,
            'gender' => $request->gender,
            'type' => 'manager',
        ];

        $user_created = User::create($data);
        if ($user_created) {
            if ($file) {
                $file->move(public_path('template/doctor_pics/'), $file_name);
            }
            $data = [
                'user_id' => $user_created->id,
            ];

            $manager_created  = Manager::create($data);

            if ($manager_created) {
                return back()->with('success', 'Manager has been successfully created');
            } else {
                return back()->with('error', 'Manager has failed to create');
            }
        }





    }

    /**
     * Display the specified resource.
     */
    public function show(Manager $manager)
    {
        $data = [
            'manager' =>$manager,
        ];
       return view('admin.manager.show' , $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manager $manager)
    {
        $data = [
            'manager' => $manager
        ];
       return view('admin.manager.edit' , $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manager $manager)
    {
        $request->validate([
            'name'=>['required'],
            'email' =>['required'],
            'password' => ['required'],
            'picture' => ['mimes:png ,jpeg,jpg'],
          ]);

          $file = $request['picture'];

        $file_name = '';
        $old_file_name = '';

        if ($file) {
            $file_name = 'madi-' . time() . '-' . $file->getClientOriginalName();
            $old_file_name = $manager->user->picture;
        } else {
            $file_name = $manager->user->picture;
        }
        $data =[
            'name'=>$request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $file_name,
            'gender' => $request->gender,
            'type' => 'manager',

        ];
        $user_update= User::find($manager->user_id)->update($data);
        if($user_update){
        $data = [
            'user_id' => $manager->user_id,
        ];
        $manager_update = Manager::find($manager->id)->update($data);
        if($manager_update){
            if ($file) {
                $file_uploaded = $file->move(public_path('template/manager_pics/'), $file_name);
                if ($file_uploaded) {
                    return back()->with(['success' => 'manager has been successfully updated']);
                } else {
                    return back()->with(['failure' => 'manager has failed to update']);
                }
            } else {
                return back()->with(['success' => 'manager has been successfully updated']);
            }
        } else {
            return back()->with(['failure' => 'manager has failed to update']);
        }
    } else {
        return back()->with(['failure' => 'User has failed to update']);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $manager= Manager::find($id);
       if($manager){
        $user = $manager->user;
        if ($user) {
            if ($user->delete()) {
                return back()->with(['success' => 'managerhas been successfully deleted']);
            } else {
                return back()->with(['failure' => 'managerhas failed to delete']);
            }
       }
    }
    }
}
