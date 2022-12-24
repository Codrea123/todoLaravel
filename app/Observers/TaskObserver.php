<?php

namespace App\Observers;

use App\Models\SubTask;
use App\Models\Task;

class TaskObserver
{
    public function updated(Subtask $subTask) {
        $subTasksCompleted = true;
        $task = $subTask->task;

        foreach($task->subTasks as $subtask) {
            if (!$subtask->completed) {
                $subTasksCompleted = false;
            }
        }

        if ($subTasksCompleted) {
            $task->completed = 1;
            $task->save();
            return;
        }

        $task->completed = 0;
        $task->save();
    }

}
