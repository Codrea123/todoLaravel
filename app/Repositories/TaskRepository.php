<?php

namespace App\Repositories;


use App\Models\Task;

class TaskRepository
{

    public function getFilteredTasks(array $filters) {
        $query = Task::with('category')->where('user_id', auth()->user()->id)->orderBy('reminder','asc');

        if (!empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        return $query->get()->sortBy('completed',0);
    }

    public function getCompletedTasks(){
        return Task::with('category')->where('user_id', auth()->user()->id)->where('completed', 1)->get();
    }
}
