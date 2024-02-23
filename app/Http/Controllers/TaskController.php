<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/client.taskForm');
    }

   
    public function store(Request $request)
    {
         $task = new Task ;
         $task->name = $request->name;
         $task->description = $request->description;
        $task->user_id=auth()->user()->id;
        $task->save();
        return redirect('/client');
    }


   
    public function show()
    {
        $task = Task::where('user_id', '=', auth()->id())->get();
        $data = [ 'task' => $task];

        return view('client.client', $data); 
    }

   
    public function destroy($id)
    {
        Task::where('id', $id)->delete();
        return back();
    }
}
