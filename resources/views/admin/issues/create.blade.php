@extends('layouts.app')
@section('title', 'Crear Issue')

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
    <h2> Create new Issue </h2>

    <br>

    <form action="{{ url('/admin/issues') }}" method="post">
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
            <label for="state" class="form-label">Priority</label>
            <input type="text" name="priority" id="priority" class="form-control"  value="{{ old('priority') }}">
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User who has the Issue</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }} </option>
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
        <a href="{{ url('/admin/issues') }}" class="btn btn-outline-danger">Cancel</a>
        <button type="submit" class="btn btn-success">Create Issue</button>
    </form>
</div>

@endsection
