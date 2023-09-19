<?php

namespace Tests\Unit;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_task()
    {
        $project = new Project();
        $project->name = 'Project 1';
        $project->description = 'Gestor de issues.';
        $project->save();

        $userTest = new User();
        $userTest->name = 'User Test';
        $userTest->email = 'test1@test.com';
        $userTest->password = '122345678';
        $userTest->save();

        $task = new Task();
        $task->name = 'Task 1';
        $task->description = 'Describiendo la tarea numero 1...';
        $task->state = 'toDo';
        $task->user_id = $userTest->id;
        $task->project_id = $project->id;

        $task->save();

        $this->assertEquals('Task 1', $task->name);

        $task->delete();
        $userTest->delete();
        $project->delete();
    }
}
