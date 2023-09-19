@extends('layouts.app')
@section('title', 'Editar Tarea')

@section('content')

@if($errors->any())
<div class="alert alert-warning alert-dimissible fade show" role="alert">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <h2> Edit Task </h2>

    <form action="{{ url('/admin/tasks/'.$id) }}" method="post">
        @method("PUT")
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $task->name) }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $task->description) }}">
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">Estado</label>
            <select name="state" id="state" class="form-control" value="{{ old('state', $task->state) }}">
                <option value="inProgress">inProgress</option>
                <option value="toDo">toDo</option>
                <option value="completed">completed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <select name="user_id" id="user_id" class="form-control" value="{{ old('user_id', $task->user_id) }}">
                <option value="{{ $task->user_id }}">{{ $task->user_id }} - @php $users = App\Models\User::all(); $user = $users->firstWhere('id', $task->user_id); @endphp {{ $user ? $user->name : 'Usuario no encontrado' }}</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="project_id" class="form-label">Project ID</label>
            <select name="project_id" id="project_id" class="form-control" value="{{ old('project_id', $task->project_id) }}">
                <option value="{{ $task->project_id }}">{{ $task->project_id }} - @php $users = App\Models\Project::all(); $project = $projects->firstWhere('id', $task->project_id); @endphp {{ $project ? $project->name : 'Usuario no encontrado' }}</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->id }} - {{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <a href="{{ url('/admin/tasks') }}" class="btn btn-outline-danger">Cancel</a>
        <button type="submit" class="btn btn-success">Save changes</button>
    </form>
</div>

@endsection
