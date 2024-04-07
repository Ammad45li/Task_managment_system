<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Mail\AssingTaskMail;
use App\Models\AssingTask;
use App\Models\Category;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AsTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assingtasks = AssingTask::with('student' , 'user' ,'category')->get();
        return view('manager.atask.index' , ['assingtasks' => $assingtasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'students' => Student::all(),
            'categories' => Category::all(),

        ];
        return view('manager.atask.create' , $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student' => ['required'],
            'email' => ['required' ,'email'],
            'date' => ['required'],
            'category' => ['required'],

        ]);

        $data = [
            'email' => $request->email,
            'date' => $request->date,
            'student_id'  => $request->student,
            'category_id' => $request->category,

        ];



        $assingtasks_created =AssingTask::create($data);

        Mail::to($assingtasks_created->email)->send(new AssingTaskMail($assingtasks_created->name));


        if($assingtasks_created){
            return back()->with('success', 'Task  been successfully given');
        } else {
            return back()->with('failure', 'Task  failed to create');

    }
    }

    /**
     * Display the specified resource.
     */
    public function show(AssingTask $assingtask)
    {
        $data = [
            'assingtask' => $assingtask,
        ];
      return view('manager.atask.show' , $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
      public function destroy(AssingTask $assingtask)
    {
        if ($assingtask->delete()) {
            return back()->with(['success' => 'aassingtask has been successfully deleted']);
        } else {
            return back()->with(['failure' => 'aassingtask has failed to delete']);
        }
    }


}
