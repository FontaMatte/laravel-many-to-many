@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center mb-4">
        <div class="col">
            <h1 class="mb-3">
                Types
            </h1>
            <a href="{{ route('admin.types.create') }}" class="btn btn-success">
                New Type
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
                    <th scope="col">Type</th>
                    <th scope="col">#Project</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <th scope="row">{{ $type->id }}</th>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->projects()->count() }}</td>
                            <td>
                                <a href="{{ route('admin.types.show', $type->id) }}" class="btn btn-primary">
                                    Details
                                </a>
                                <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning">
                                    Update
                                </a>
                                    
                                    <!-- Modal -->
                                <form class="d-inline-block" action="{{  route('admin.types.destroy', $type->id)  }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$type->id}}">
                                        Delete
                                    </button>
                                    <div class="modal fade" id="exampleModal-{{$type->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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