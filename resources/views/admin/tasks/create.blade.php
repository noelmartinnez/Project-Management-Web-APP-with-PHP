@extends('layouts.app')
@section('title', 'Crear Tarea')

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
    <h2> Create new Task </h2>

    <form action="{{ url('/admin/tasks') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control"  value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control"  value="{{ old('description') }}">
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <select name="state" id="state" class="form-control"  value="{{ old('state') }}">
                <option value="inProgress">inProgress</option>
                <option value="toDo">toDo</option>
                <option value="completed">completed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User performing the Task</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="project_id" class="form-label">Proyect</label>
            <select name="project_id" id="project_id" class="form-control">
                <option value="">Select Proyect</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->id }} - {{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <a href="{{ url('/admin/tasks') }}" class="btn btn-outline-danger">Cancel</a>
        <button type="submit" class="btn btn-success">Create Task</button>
    </form>
</div>

@endsection
