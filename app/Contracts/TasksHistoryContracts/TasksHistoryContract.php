<?php

namespace App\Contracts\TasksHistoryContracts;

use App\Models\Task;

interface TasksHistoryContract
{
    /**
     *
     * @param Task $task
     * @param string $actionForTask
     */
    public function createTaskHistoryItem(Task $task, string $actionForTask): void;
}
