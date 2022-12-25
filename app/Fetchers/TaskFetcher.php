<?php

namespace App\Fetchers;


use App\Repositories\TaskRepository;

class TaskFetcher
{

    protected TaskRepository $taskRepository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }


    public function getFilteredTasks(array $filters) {
        return $this->taskRepository->getFilteredTasks($filters);
    }

    public function getCompletedTasks(){
        return $this->taskRepository->getCompletedTasks();
    }
}
