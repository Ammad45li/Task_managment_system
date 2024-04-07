<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ManagerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        return view('manager.profile.show' ,[
            'user' => Auth::user(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function details(Request $request)
    {
       $data = $request->validate([
            'name' => ['required'],
            'email'=> ['required' , 'email', 'unique:users,email,' . Auth::id() . ',id'],
        ]);

        $user = User::find(Auth::id());

        if ($user->update($data)) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function password(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'password' => ['required', 'confirmed'],
            'current_password' => ['required'],
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            $data = [
                'password' => Hash::make($request->password),
            ];

            if ($user->update($data)) {
                return back()->with(['success' => 'Magic has been spelled!']);
            } else {
                return back()->with(['failure' => 'Magic has failed to spell!']);
            }
        } else {
            return back()->withErrors(['current_password' => 'Current password does not match!']);
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function picture(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'picture' => ['required', 'image', 'mimes:png,jpg,jpeg,webp'],
        ]);

        $old_picture_path = 'template/img/photos/' . $user->picture;

        if ($user->picture && File::exists(public_path($old_picture_path))) {
            unlink(public_path($old_picture_path));
        }
        $new_file_name = "MAGICIANS" . microtime(true) . "." . $request->picture->getClientOriginalExtension();

        $data = [
            'picture' => $new_file_name,
        ];

        if ($request->picture->move(public_path('template/img/photos/'), $new_file_name)) {
            if ($user->update($data)) {
                return back()->with(['success' => 'Magic has been spelled!']);
            } else {
                return back()->with(['failure' => 'Magic has failed to spell!']);
            }
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
