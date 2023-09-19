@extends('layouts.app')
@section('title', 'Roles')

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
  <h1 class="mb-3">{{$role ? "Update role" : "Create new Role"}}</h1>
  <form action="/admin/roles" method="POST" class="container">
    @csrf
    @if ($role)
      @method('PUT')
    @else
      @method('POST')
    @endif
    <input
      type="text"
      id="id"
      name="id"
      value="{{$role?->id ?? ""}}"
      class="form-control visually-hidden">

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{$role?->name ?? ""}}"
            class="form-control">
    </div>
    <a href="{{ url('/admin/roles') }}" class="btn btn-outline-danger">Cancel</a>
    <button type="submit" class="btn btn-success">
        {{ $role ? "Save changes" : "Create role" }}
    </button>
  </form>
</div>
@endsection
