@extends('layouts.app')
@section('title', 'Tasks')

@section('content')
<form class="mb-3" action="{{url('/admin/tasks/create')}}">
  @csrf
  <div class="d-grid d-md-block">
    <button class="btn btn-primary">
      <i class="bi bi-plus"></i>
      New task
    </button>
  </div>
</form>
@foreach($projects AS $project)
  <h1>{{ $project->name }}</h1>
  <h5>Open tasks: {{ $project->tasks->count() }}</h5>
  <br>

  <table class="table table-bordered">
    <tr class="thead-light text-center d-none d-md-table-row">
      <th class="p-3">Name</th>
      <th class="p-3">Description</th>
      <th class="p-3">State</th>
      <th class="p-3">User ID</th>
      <th class="p-3">Actions</th>
    </tr>
    @foreach($project->tasks AS $task)
      <tr>
        <td class="d-block d-md-table-cell p-3">{{ $task->name }}</td>
        <td class="d-block d-md-table-cell p-3">{{ $task->description  }}</td>
        <td class="d-block d-md-none p-3"> <strong>Estado:</strong> {{ $task->state  }}</td>
        <td class="d-none d-md-table-cell p-3">{{ $task->state  }}</td>
        <td class="d-block d-md-table-cell p-3">
            <strong>Assigned to:</strong> {{$task->user_id}} - @php $users = App\Models\User::all(); $user = $users->firstWhere('id', $task->user_id); @endphp {{ $user ? $user->name : 'Usuario no encontrado' }}
        </td>
        <td class="d-block d-md-flex justify-content-center gap-1 text-center p-3">
          <form class="m-0 d-inline-block" action="{{url('/admin/tasks/'.$task->id.'/edit')}}" method="get">
            @csrf
            <button class="btn btn-primary">
              <i class="bi bi-pencil-fill"></i>
              <span class="d-inline d-md-none">Edit</span>
            </button>
          </form>
          <form class="m-0 d-inline-block" action="{{url('/admin/tasks/'.$task->id)}}" method="post">
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
@endforeach
@endsection
