@extends('layouts.app')
@section('title', 'Editar Usuario')

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
    <h2>Edit User</h2>

    <form action="{{ url('/admin/users/'.$id) }}" method="post">
        @method("PUT")
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Name</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" name="password" id="password" class="form-control" value="{{ $user->password }}" readonly disabled>
            </div>
        </div>

        <div class="mb-3">
            <label for="rol" class="form-label">Role</label>
            <select name="rol" id="rol" class="form-control">
                <option value="">Select a role</option>
                @foreach($roles as $rol)
                    <option value="{{ old('id', $rol->id) }}" @if ($rol->id == $user->role_id) {{'selected'}} @endif >{{ $rol->name }}</option>
                @endforeach
            </select>
        </div>

        <br>

        <a href="{{ url('/admin/users') }}" class="btn btn-outline-danger">Cancel</a>
        <button type="submit" class="btn btn-success">Save change</button>
    </form>
</div>

@endsection
