<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AssingTask;
use Illuminate\Http\Request;

class AdminAsController extends Controller
{
   public function index()
   {
    $assingtasks = AssingTask::with('user')->get();
      return view('admin.astask.index' , ['assingtasks' => $assingtasks]);
   }
}
