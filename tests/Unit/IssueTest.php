<?php

namespace Tests\Unit;

use App\Models\Project;
use App\Models\User;
use App\Models\Issue;
use Tests\TestCase;

class IssueTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_issue()
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

        $issue = new Issue();
        $issue->name = 'Issue 1';
        $issue->description = 'Describiendo la tarea numero 1...';
        $issue->priority = 'High';
        $issue->user_id = $userTest->id;
        $issue->project_id = $project->id;

        $issue->save();

        $this->assertEquals('Issue 1', $issue->name);
        $this->assertEquals(1,$issue->project_id);
        $this->assertEquals(1,$issue->user_id);
        
        $issue->delete();
        $userTest->delete();
        $project->delete();
    }
}
