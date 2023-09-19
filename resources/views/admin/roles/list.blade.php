@extends('layouts.app')
@section('title', 'Roles')

@section('content')
  <form class="mb-3" action="{{url('/admin/roles/create')}}">
    @csrf
    <button class="btn btn-primary">
      <i class="bi bi-plus"></i>
      New role
    </button>
  </form>
  <table class="table table-bordered">
  <tr class="thead-light text-center d-none d-md-table-row">
      <th class="p-3">Name</th>
      <th class="p-3">User count</th>
      <th class="p-3">Actions</th>
    </tr>
    @foreach($roles as $role)
      <tr>
        <td class="fw-normal d-none d-md-table-cell p-3">{{ $role->name }}</td>
        <td class="fw-bold d-block d-md-none p-3">{{ $role->name }}</td>
        <td class="d-none d-md-table-cell p-3">{{ sizeof($role->users) }}</td>
        <td class="d-block d-md-none p-3"><strong>User count</strong>: {{ sizeof($role->users) }}</td>
        <td class="d-block d-md-flex justify-content-center gap-1 text-center p-3">
          <form class="m-0 d-inline-block" action="{{url('/admin/roles/update/'.$role->id)}}">
            @csrf
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-pencil-fill"></i>
              <span class="d-inline d-md-none">Edit</span>
            </button>
          </form>
          <form class="m-0 d-inline-block" action="{{url('/admin/roles/delete/'.$role->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
              <i class="bi bi-trash-fill"></i>
              <span class="d-inline d-md-none">Delete</span>
            </button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
  {{ $roles->links() }}
@endsection
