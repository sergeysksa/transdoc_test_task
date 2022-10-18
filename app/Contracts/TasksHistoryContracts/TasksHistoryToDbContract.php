<?php

namespace App\Contracts\TasksHistoryContracts;

use App\Models\Task;

interface TasksHistoryToDbContract
{
    /**
     *
     * @param Task $task
     * @param string $actionForTask
     */
    public function logIntoLocalDatabase(Task $task, string $actionForTask): void;
}
