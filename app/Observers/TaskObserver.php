<?php

namespace App\Observers;

use App\Models\Task;
use App\Services\TaskActionLogService;

class TaskObserver
{

    public function __construct(private TaskActionLogService $taskActionLogService){}

    /**
     * Handle the Task "created" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function created(Task $task): void
    {
        $this->taskActionLogService->createTaskHistoryItem($task, 'created');
    }

    /**
     * Handle the Task "updated" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function updated(Task $task): void
    {
        $this->taskActionLogService->createTaskHistoryItem($task, 'updated');
    }

    /**
     * Handle the Task "deleted" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function deleted(Task $task): void
    {
        $this->taskActionLogService->createTaskHistoryItem($task, 'deleted');
    }

    /**
     * Handle the Task "restored" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function restored(Task $task)
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function forceDeleted(Task $task)
    {
        //
    }
}
