<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class IssueController extends Controller {

    public function index(){
        $projects = Project::simplePaginate(1);
        return view('/admin/issues/index', ['issues' => Issue::All(),'projects' => $projects]);
    }

    public function create() {
        return view('/admin/issues/create', ['projects' => Project::All(), 'users' => User::All()]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'priority' => 'required',
            'user_id' => 'required',
            'project_id' => 'required'
        ]);

        $issue = new Issue();
        $issue->name = $request->input('name');
        $issue->description = $request->input('description');
        $issue->priority = $request->input('priority');
        $issue->project_id = $request->input('project_id');
        $issue->user_id = $request->input('user_id');
        $issue->save();
        return redirect("/admin/issues");
    }

    public function update(Request $request, $issue_id) {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'priority' => 'required',
            'user_id' => 'required',
            'project_id' => 'required'
        ]);

        $issue = Issue::find($issue_id);
        $issue->name = $request->input('name');
        $issue->description = $request->input('description');
        $issue->priority = $request->input('priority');
        $issue->project_id = $request->input('project_id');
        $issue->user_id = $request->input('user_id');
        $issue->save();
        return redirect("/admin/issues");
    }

    public function edit($issue_id) {
        $issue = Issue::find($issue_id);
        return view('/admin/issues/edit', ['id' => $issue_id, 'issue' => $issue, 'projects' => Project::All(), 'users' => User::All()]);
    }

    public function delete($issue_id) {
        $issue = Issue::find($issue_id);
        $issue->delete();
        return redirect("/admin/issues");
    }
}