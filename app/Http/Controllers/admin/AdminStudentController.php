<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('user')->get();
        return view('admin.student.index' , ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => ['required'],
            'email' => ['required' , 'email'],
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
            'type' => 'student',
        ];

        $user_created = User::create($data);

        if ($user_created) {
            if ($file) {
                $file->move(public_path('template/doctor_pics/'), $file_name);
            }
            $data = [
                'user_id' => $user_created->id,
            ];


            $student_created  = Student::create($data);

            if ($student_created) {
                return back()->with('success', 'student has been successfully created');
            } else {
                return back()->with('error', 'student has failed to create');
            }

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $data = [
            'student' =>$student,
        ];

        return view('admin.student.show' , $data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $data = [
            'student' => $student
        ];
       return view('admin.student.edit' , $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
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
            $old_file_name = $student->user->picture;
        } else {
            $file_name = $student->user->picture;
        }
        $data =[
            'name'=>$request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $file_name,
            'gender' => $request->gender,
            'type' => 'student',

        ];
        $user_update= User::find($student->user_id)->update($data);
        if($user_update){
        $data = [
            'user_id' => $student->user_id,
        ];
        $student_update = Student::find($student->id)->update($data);
        if($student_update){
            if ($file) {
                $file_uploaded = $file->move(public_path('template/student_pics/'), $file_name);
                if ($file_uploaded) {
                    return back()->with(['success' => 'student has been successfully updated']);
                } else {
                    return back()->with(['failure' => 'student has failed to update']);
                }
            } else {
                return back()->with(['success' => 'student has been successfully updated']);
            }
        } else {
            return back()->with(['failure' => 'student has failed to update']);
        }
    } else {
        return back()->with(['failure' => 'User has failed to update']);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
{

    $student = Student::find($student->id);

    if($student) {

        $user = $student->user;



            if ($user->delete()) {

               if ($student->delete()) {
                    return back()->with(['success' => 'Student has been successfully deleted']);
                } else {
                    return back()->with(['failure' => 'Student deletion failed']);
                }

}
    }}}

