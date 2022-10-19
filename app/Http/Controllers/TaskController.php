<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateUpdateRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function __construct()
    {
    }


    public function index(): JsonResponse
    {
        return response()->json([
            'result' => Task::query()
                ->select('id', 'name')
                ->where('user_id', auth()->user()->id)
                ->get()
        ]);
    }


    public function store(TaskCreateUpdateRequest $request): JsonResponse
    {
        $taskData =  [
            ...$request->validated(),
            'user_id' => auth()->user()->id
        ];

        Task::create($taskData);

        return response()->json(['message' => 'Task created']);
    }

    /**
     * @param Task $task
     * @return JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Task $task): JsonResponse
    {
        $this->authorize('view-task',[$task]);

        return response()->json(['task' => $task]);
    }

    /**
     * @param TaskCreateUpdateRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(TaskCreateUpdateRequest $request, $id): JsonResponse
    {
        Task::query()->where('id', $id)
            ->update($request->validated());
        return response()->json(['message' => 'Task updated']);
    }

    /**
     * Remove Task
     *
     * @param Task $task
     * @return JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Task $task): JsonResponse
    {
        $this->authorize('delete-task',[$task]);

        $task->delete();

        return response()->json(['message' => 'Task removed!']);
    }


    public function getSeverityList(): JsonResponse
    {
        return response()->json([
           'result' => Task::TASK_SEVERITIES
        ]);
    }
}
