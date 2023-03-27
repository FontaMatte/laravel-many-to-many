@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center mb-4">
        <div class="col">
            <h1 class="mb-3">
                Projects
            </h1>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
                New Repository
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Commits</th>
                    <th scope="col">Stars</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->commits }}</td>
                            <td>{{ $project->stars }}</td>
                            <td>
                            @if ($project->type)
                                <a href="{{ route('admin.types.show', $project->type->id) }}">
                                    {{ $project->type->name }}
                                </a>
                            @else
                                No Type
                            @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">
                                    Details
                                </a>
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">
                                    Update
                                </a>
                                    
                                    <!-- Modal -->
                                <form class="d-inline-block" action="{{  route('admin.projects.destroy', $project->id)  }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$project->id}}">
                                        Delete
                                    </button>
                                    <div class="modal fade" id="exampleModal-{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        Delete Project
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete it?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            Delete
                                                        </button>                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>                           
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>            
        </div>
    </div>
    {{-- <div class="d-flex justify-content-center">
        {!! $projects->links() !!}
    </div> --}}
</div>
@endsection