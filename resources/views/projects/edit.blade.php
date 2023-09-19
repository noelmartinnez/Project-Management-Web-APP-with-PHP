@extends('layouts.app')
@section('title', 'Editar Proyecto')

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
    <h2>Edit Project</h2>

    <form action="{{ url('/projects/'.$id) }}" method="post">
        @method("PUT")
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $project->name) }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $project->description) }}">
        </div>
        <a href="{{ url('/projects') }}" class="btn btn-outline-danger">Cancel</a>
        <button type="submit" class="btn btn-success">Save changes</button>
    </form>
</div>

@endsection
