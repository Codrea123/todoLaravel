<?php

namespace App\Http\Controllers;

use App\Fetchers\TaskFetcher;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\VendorRequest;
use App\Models\Category;
use App\Models\subTask;
use App\Models\Task;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    protected TaskFetcher $taskFetcher;
    public function __construct(TaskFetcher $taskFetcher)
    {
        $this->taskFetcher = $taskFetcher;
    }

    public function index(Authenticatable $authenticatable, Request $request) {
        $tasks = $this->taskFetcher->getFilteredTasks($request->all());
        $tasksCompleted = $this->taskFetcher->getCompletedTasks();
        return view('tasks.index')->with([
            'tasks' => $tasks,
            'tasksCompleted'=>$tasksCompleted,
            'categories' => $authenticatable->categories,
            'category' => Category::where('id', $request->get('category_id'))->first()
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

    public function toggleCompleted(TaskRequest $request, Task $task) {
        $task->completed = $request->get('completed');
        $task->update();
        return redirect()->back();
    }
    public function destroy(Task $task){
        $task->delete();
        return redirect()->back();
    }
    public function changeCategory(Request $request, Task $task) {
        $task->category_id = $request->get('category_id');
        $task->update();
        return response()->json(['success' => 'Category changed successfully']);
    }
}
