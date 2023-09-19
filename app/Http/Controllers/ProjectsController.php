<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){
        $orderBy = request()->input('order_by');

        $defaultOrder = 'asc';
        $orderByField = 'id';

        $projects = Project::orderBy($orderByField, $defaultOrder)->simplePaginate(5);

        if ($orderBy == 'name') {
            $orderByField = 'name';
            $projects = Project::orderBy($orderByField, $defaultOrder)->simplePaginate(5);
        }

        if ($orderBy == 'description') {
            $orderByField = 'description';
            $projects = Project::orderBy($orderByField, $defaultOrder)->simplePaginate(5);
        }


        return view('/projects/index', ['projects' => $projects, 'orderBy' => $orderBy]);
    }

    public function create() {
        return view('projects.create', ['project' => null]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
        $project = new Project();
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->save();
        return $this->index();
    }

    public function edit($id) {
        $project = Project::find($id);
        return view('projects.edit', ['id' => $id, 'project' => $project]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
        $project = Project::find($id);
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->save();
        return redirect('/projects');
    }


    public function delete($id) {
        $project = Project::find($id);
        $project->delete();
        return redirect('/projects');
    }

    public function orderByName() {
        return redirect()->route('projects.index', ['order_by' => 'name']);
    }

    public function orderByDescription() {
        return redirect()->route('projects.index', ['order_by' => 'description']);
    }

}
