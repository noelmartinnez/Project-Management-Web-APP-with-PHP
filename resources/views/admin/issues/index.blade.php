@extends('layouts.app')
@section('title', 'issues')

@section('content')

<form class="mb-3" action="{{url('/admin/issues/create')}}">
  @csrf
  <div class="d-grid d-md-block">
    <button class="btn btn-primary">
      <i class="bi bi-plus"></i>
      New issue
    </button>
  </div>
</form>
@foreach($projects AS $project)
  <h1>{{ $project->name }}</h1>
  <h5>Open issues: {{ $project->issues->count() }}</h5>
  <br>

  <table class="table table-bordered">
  <tr class="thead-light text-center d-none d-md-table-row">
      <th class="p-3">Name</th>
      <th class="p-3">Description</th>
      <th class="p-3">Priority</th>
      <th class="p-3">User ID</th>
      <th class="p-3">Actions</th>
    </tr>
    @foreach($project->issues AS $issue)
      <tr>
        <td class="fw-normal d-none d-md-table-cell p-3">{{ $issue->name }}</td>
        <td class="fw-bold d-block d-md-none p-3">{{ $issue->name }}</td>
        <td class="d-block d-md-table-cell p-3">{{ $issue->description  }}</td>
        <td class="d-none d-md-table-cell p-3">{{ $issue->priority }}</td>
        <td class="d-block d-md-none p-3"><strong>Priority:</strong> {{ $issue->priority }}</td>
        <td class="d-block d-md-table-cell p-3">
            <strong>Assigned to:</strong> {{$issue->user_id}} - @php $users = App\Models\User::all(); $user = $users->firstWhere('id', $issue->user_id); @endphp {{ $user ? $user->name : 'Usuario no encontrado' }}
        </td>
        <td class="d-block d-md-flex justify-content-center gap-1 text-center p-3">
          <form class="m-0 d-inline-block" action="{{url('/admin/issues/'.$issue->id.'/edit')}}" method="get">
            @csrf
            <button class="btn btn-primary">
              <i class="bi bi-pencil-fill"></i>
              <span class="d-inline d-md-none">Edit</span>
            </button>
          </form>
          <form class="m-0 d-inline-block" action="{{url('/admin/issues/'.$issue->id)}}" method="post">
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
