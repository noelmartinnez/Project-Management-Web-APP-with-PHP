@extends('layouts.app')
@section('title', 'Editar Issue')

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
    <h2> Edit Issue </h2>

    <form action="{{ url('/admin/issues/'.$id) }}" method="post">
        @method("PUT")
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $issue->name) }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $issue->description) }}">
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <input type="text" name="priority" id="priority" class="form-control" value="{{ old('priority', $issue->priority) }}">
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <select name="user_id" id="user_id" class="form-control" value="{{ old('user_id', $issue->user_id) }}">
                <option value="{{ $issue->user_id }}">{{ $issue->user_id }} - @php $users = App\Models\User::all(); $user = $users->firstWhere('id', $issue->user_id); @endphp {{ $user ? $user->name : 'Usuario no encontrado' }}</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="project_id" class="form-label">Project ID</label>
            <select name="project_id" id="project_id" class="form-control" value="{{ old('project_id', $issue->project_id) }}">
                <option value="{{ $issue->project_id }}">{{ $issue->project_id }} - @php $users = App\Models\Project::all(); $project = $projects->firstWhere('id', $issue->project_id); @endphp {{ $project ? $project->name : 'Usuario no encontrado' }}</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->id }} - {{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <a href="{{ url('/admin/issues') }}" class="btn btn-outline-danger">Cancel</a>
        <button type="submit" class="btn btn-success">Save changes</button>
    </form>
</div>

@endsection
