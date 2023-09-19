@extends('layouts.app')
@section('title', 'Projects')

@section('content')
<form class="mb-3" action="{{url('/projects/create')}}">
  @csrf
  <div class="d-grid d-md-block">
    <button class="btn btn-primary">
      <i class="bi bi-plus"></i>
      New project
    </button>
  </div>
</form>
<div class="d-flex justify-content-around flex-grow gap-2 d-md-block mb-4">
  <a href="{{ url('/projects') }}" class="btn btn-success">Reset default order</a>
  <a href="{{ route('projects.order-by-name') }}" class="btn btn-success ">Order by name</a>
  <a href="{{ route('projects.order-by-description') }}" class="btn btn-success">Order by description</a>
</div>
<table class="table table-bordered">
  <tr class="thead-light text-center d-none d-md-table-row">
    <th class="p-3">Name</th>
    <th class="p-3">Description</th>
    <th class="p-3">Actions</th>
  </tr>
  @foreach($projects as $project)
    <tr>
      <td class="fw-normal d-none d-md-table-cell p-3">{{ $project->name }}</td>
      <td class="fw-bold d-block d-md-none p-3">{{ $project->name }}</td>
      <td class="d-block d-md-table-cell p-3">{{ $project->description }}</td>
      <td class="d-block d-md-flex justify-content-center gap-1 text-center p-3">
        <form class="m-0 d-inline-block" action="{{url('/projects/edit/'.$project->id)}}">
          @csrf
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-pencil-fill"></i>
            <span class="d-inline d-md-none">Edit</span>
          </button>
        </form>
        <form class="m-0 d-inline-block" action="{{url('/projects/delete/'.$project->id)}}" method="post">
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
{{ $projects->links() }}
@endsection
