<?php

namespace App\Services;

use App\Contracts\TasksHistoryContracts\TasksHistoryContract;
use App\Contracts\TasksHistoryContracts\TasksHistoryToDbContract;
use App\Models\Task;
use App\Models\TasksHistory;

class TaskActionLogService implements TasksHistoryContract, TasksHistoryToDbContract
{

    public function createTaskHistoryItem(Task $task, string $actionForTask): void
    {
        $this->logIntoLocalDatabase($task, $actionForTask);
    }

    public function logIntoLocalDatabase(Task $task, string $actionForTask): void
    {
        TasksHistory::create([
            'event_name'    => $actionForTask,
            'user_id'       => $task->user_id,
            'task_id'       => $task->id
        ]);
    }
}
