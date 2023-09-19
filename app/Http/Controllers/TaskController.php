<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller {

    public function index(){
        $projects = Project::simplePaginate(1);
        return view('/admin/tasks/index', ['tasks' => Task::All(),'projects' => $projects]);
    }
    public function dashboard()
    {
        $numtoDo = \App\Models\Task::where('state', 'toDo')->count();
        $numinProgress = \App\Models\Task::where('state', 'inProgress')->count();
        $numtoCompleted = \App\Models\Task::where('state', 'completed')->count();
    
        $users = \App\Models\User::all();
    
        $tasksPerUser = [];
        $totalTasks = \App\Models\Task::all()->count();
        foreach ($users as $user) {
            $tasksCount = \App\Models\Task::where('user_id', $user->id)->count();
            $tasksPerUser[$user->name] = $tasksCount;
        }
    
        $resultados = DB::table('users')
            ->selectRaw('users.name as usuario, count(*) as tareas_asignadas')
            ->leftJoin('tasks', 'tasks.user_id', '=', 'users.id')
            ->groupBy('users.name')
            ->get();
        $arrayResultados = $resultados->toArray();
    
        return view('/dashboard', [
            'tasks' => Task::all(),
            'numtoDo' => $numtoDo,
            'numinProgress' => $numinProgress,
            'numtoCompleted' => $numtoCompleted,
            'resultados' => $arrayResultados,
            'tasksPerUser' => $tasksPerUser,
            'totalTasks' => $totalTasks,
        ]);
    }
    

    public function create() {
        return view('/admin/tasks/create', ['projects' => Project::All(), 'users' => User::All()]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'state' => 'required',
            'user_id' => 'required',
            'project_id' => 'required'
        ]);

        $task = new Task();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->state = $request->input('state');
        $task->project_id = $request->input('project_id');
        $task->user_id = $request->input('user_id');
        $task->save();
        return redirect("/admin/tasks");
    }

    public function update(Request $request, $task_id) {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'state' => 'required',
            'user_id' => 'required',
            'project_id' => 'required'
        ]);

        $task = Task::find($task_id);
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->state = $request->input('state');
        $task->project_id = $request->input('project_id');
        $task->user_id = $request->input('user_id');
        $task->save();
        return redirect("/admin/tasks");
    }

    public function edit($task_id) {
        $task = Task::find($task_id);
        return view('/admin/tasks/edit', ['id' => $task_id, 'task' => $task, 'projects' => Project::All(), 'users' => User::All()]);
    }

    public function delete($task_id) {
        $task = Task::find($task_id);
        $task->delete();
        return redirect("/admin/tasks");
    }
}