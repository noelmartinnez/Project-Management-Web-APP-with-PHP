@extends('layouts.app')
@section('title', 'Crear Proyecto')

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
    <h2> Create new Project </h2>

    <form action="{{ url('/projects') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <a href="{{ url('/projects') }}" class="btn btn-outline-danger">Cancel</a>
        <button type="submit" class="btn btn-success">Create Project</button>
    </form>
</div>
@endsection
