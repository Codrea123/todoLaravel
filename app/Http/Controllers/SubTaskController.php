<?php

namespace App\Http\Controllers;

use App\Http\Requests\subTaskRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\VendorRequest;
use App\Models\SubTask;
use App\Models\Task;
use App\Models\Vendor;
use Illuminate\Http\Request;

class SubTaskController extends Controller
{
    public function index(){
        $subTasks = SubTask::all();
        return view('tasks.index')->with([
            'subTasks'=>$subTasks
        ]);
    }

    public function store(subTaskRequest $request){
        $subTask = new SubTask();
        $subTask->task_id = $request->get('task_id');
        $subTask->description = $request->get('description');
        $subTask->completed = $request->get('completed');
        $subTask->save();
        return redirect()->route('tasks.index');
    }

    public function toggleComplete(subTaskRequest $request,SubTask $subTask){
        $subTask->task_id = $request->get('task_id');
        $subTask->description = $request->get('description');
        $subTask->completed = $request->get('completed');
        $subTask->update();
        return redirect()->route('tasks.index');
    }

    public function destroy(SubTask $subTask){
        $subTask->delete();
        return redirect()->back();
    }
}
