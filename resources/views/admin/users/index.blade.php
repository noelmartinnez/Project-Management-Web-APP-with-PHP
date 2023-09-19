@extends('layouts.app')
@section('title', 'Lista de Usuarios')

@section('content')

<form action="{{ url('/admin/users/create') }}" class="mb-3">
    @csrf
    <div class="d-grid d-md-block">
        <button class="btn btn-primary">
            <i class="bi bi-plus"></i>
            New user
        </a>
    </div>
</form>

<form action="{{ route('users.search-name') }}" method="get">
    @csrf
    <div class="mb-3">
        <div class="input-group align-items-center">
            <input type="search" name="search" id="search" class="form-control border" placeholder="Search by name">
            <button type="submit" class="btn border">Search</button>
        </div>
    </div>
</form>

<form action="{{ route('users.search-email') }}" method="get" class="mb-3">
    @csrf
    <div class="mb-3">
        <div class="input-group align-items-center">
            <input type="searchEmail" name="searchEmail" id="searchEmail" class="form-control border" placeholder="Search by email">
            <button type="submit" class="btn border">Search</button>
        </div>
    </div>

    <a href="{{ url('/admin/users') }}" class="btn btn-outline-primary ">Reset search filters</a>
</form>

<div class="d-flex justify-content-around flex-grow gap-2 d-md-block mb-4">
    <a href="{{ url('/admin/users') }}" class="btn btn-success">Reset default order</a>
    <a href="{{ route('users.order-by-name') }}" class="btn btn-success">Order by name</a>
    <a href="{{ route('users.order-by-email') }}" class="btn btn-success">Order by email</a>
    <a href="{{ route('users.order-by-rol') }}" class="btn btn-success">Order by role</a>
</div>

<table class="table table-bordered">
  <tr class="thead-light text-center d-none d-md-table-row">
        <th class="p-3">#</th>
        <th class="p-3">Name</th>
        <th class="p-3">Email</th>
        <th class="p-3">Rol</th>
        <th class="p-3">Actions</th>
    </tr>
    @foreach($users AS $user)
    <tr class="text-center">
        <td class="d-none d-md-table-cell p-3">{{ $user->id }}</td>
        <td class="d-block d-md-none fs-4 p-3">{{ $user->id }}</td>
        <td class="d-block d-md-table-cell p-3">{{ $user->name }}</td>
        <td class="d-block d-md-table-cell p-3">{{ $user->email }}</td>
        <td class="d-block d-md-table-cell p-3">@if ($user->role) {{ $user->role->name }}@else <em>undefined role</em> @endif</td>
        <td class="d-block d-md-flex justify-content-center gap-1 text-center p-3">
            <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" class="btn btn-primary">
                <i class="bi bi-pencil-fill"></i>
                <span class="d-inline d-md-none">Edit</span>
            </a>
            <form action="{{ url('/admin/users/'.$user->id) }}" method="post" class="m-0 d-inline-block">
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash-fill"></i>
                    <span class="d-inline d-md-none">Delete</span>
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $users->appends(['order_by' => $orderBy, 'search' => $search, 'searchEmail' => $searchEmail])->links() }}

@endsection
