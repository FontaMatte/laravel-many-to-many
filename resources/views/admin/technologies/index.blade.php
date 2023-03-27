@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center mb-4">
        <div class="col">
            <h1 class="mb-3">
                Technologies
            </h1>
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-success">
                New Technology
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
                    <th scope="col">Technology</th>
                    <th scope="col">#Project</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr>
                            <th scope="row">{{ $technology->id }}</th>
                            <td>{{ $technology->name }}</td>
                            <td>{{ $technology->projects()->count() }}</td>
                            <td>
                                <a href="{{ route('admin.technologies.show', $technology->id) }}" class="btn btn-primary">
                                    Details
                                </a>
                                <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-warning">
                                    Update
                                </a>
                                    
                                    <!-- Modal -->
                                <form class="d-inline-block" action="{{  route('admin.technologies.destroy', $technology->id)  }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$technology->id}}">
                                        Delete
                                    </button>
                                    <div class="modal fade" id="exampleModal-{{$technology->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        Delete Type
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
</div>
@endsection