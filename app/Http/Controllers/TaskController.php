<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Requests\VendorRequest;
use App\Models\subTask;
use App\Models\Task;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(){
        $id = Auth::id();
        $tasks = Task::orderBy('reminder','asc')->get()->sortBy('completed',0)->where('user_id',$id);
        $tasksCompleted = Task::all()->where('completed',1);
        return view('tasks.index')->with([
            'tasks'=>$tasks,
            'tasksCompleted'=>$tasksCompleted
        ]);
    }


    public function create(){
        return view('tasks.create');
    }

    public function store(TaskRequest $request){
        $task = new Task();
        $task->user_id = $request->get('user_id');
        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->reminder = $request->get('reminder');
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task){
        return view('tasks.edit')->with([
            'task'=>$task
        ]);
    }

    public function update(TaskRequest $request,Task $task){
        $task->user_id = $request->get('user_id');
        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->reminder = $request->get('reminder');
        $task->completed = $request->get('completed');
        $task->update();
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task){
        $task->delete();
        return redirect()->back();
    }

}
