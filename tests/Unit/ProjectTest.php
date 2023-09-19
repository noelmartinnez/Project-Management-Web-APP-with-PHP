<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Project;
use App\Models\Issue;

class ProjectTest extends TestCase
{
    public function test_create_project()
    {
        $project = new Project();
        $project->name = 'Project 1';
        $project->description = 'Gestor de issues.';
        $project->save();

        $this->assertEquals('Project 1', $project->name);
        $this->assertEquals('Gestor de issues.', $project->description);

        $project->delete();

    }

    public function test_find_project_id()
    {
        $project1 = new Project();
        $project1->name = 'Project 2';
        $project1->description = 'Gestor de issues.';
        $project1->save();
        
        $project = Project::find($project1->id);
        $this->assertEquals('Project 2', $project->name);

        $project1->delete();

    }
}