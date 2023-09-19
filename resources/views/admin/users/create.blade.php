@extends('layouts.app')
@section('title', 'Crear Usuario')

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
    <h2>Create new User</h2>

    <form action="{{ url('/admin/users') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Name</label>
            <input type="text" name="nombre" id="nombre" class="form-control autofocus" value="{{ old('nombre') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
                <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility()"><i class="fa fa-eye"></i>Show</button>
            </div>
        </div>

        <script>
            function togglePasswordVisibility() {
                var passwordInput = document.getElementById("password");
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            }
        </script>

        <div class="mb-3">
            <label for="rol" class="form-label">Role</label>
            <select name="rol" id="rol" class="form-control">
                <option value="">Select a role</option>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                @endforeach
            </select>
        </div>

        <br>

        <a href="{{ url('/admin/users') }}" class="btn btn-outline-danger">Cancel</a>
        <button type="submit" class="btn btn-success">Create User</button>
    </form>
</div>

@endsection
