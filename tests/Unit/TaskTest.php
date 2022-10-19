<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;

class TaskTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }


    public function test_allow_user_task_owner(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'user@test.com'],
            [
                'name' => 'TestUser',
                'password' => bcrypt('password')
            ],
        );

        $user_task = Task::create([
            'name' => 'test task',
            'description' => 'some user task',
            'severity' => Task::SEVERITY_ALARM,
            'user_id' => $user->id
        ]);

        $response_allow_show = $this
            ->actingAs($user)
            ->get(route('task.show', ['task' => $user_task->id]));

        $response_allow_show->assertStatus(200);

        $response_allow_delete = $this
            ->actingAs($user)
            ->get(route('task.destroy', ['task' => $user_task->id]));

        $response_allow_delete->assertStatus(200);
    }

    public function test_deny_user_task_owner(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'user@test.com'],
            [
                'name' => 'TestUser',
                'password' => bcrypt('password')
            ],
        );

        $admin = User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'TestAdmin',
                'password' => bcrypt('password')
            ],
        );

        $admin_task = Task::create([
            'name' => 'admin task',
            'description' => 'admin some task',
            'severity' => Task::SEVERITY_IMPORTANT,
            'user_id' => $admin->id
        ]);


        $response_allow_show = $this
            ->actingAs($user)
            ->get(route('task.show', ['task' => $admin_task->id]));

        $response_allow_show->assertStatus(403);

        $response_allow_delete = $this
            ->actingAs($user)
            ->get(route('task.destroy', ['task' => $admin_task->id]));

        $response_allow_delete->assertStatus(403);
    }
}
