<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

        return response()->json('Task removed!');
    }

    public function getSeverityList()
    {
        return response()->json([
           'result' => Task::TASK_SEVERITIES
        ]);
    }
}
