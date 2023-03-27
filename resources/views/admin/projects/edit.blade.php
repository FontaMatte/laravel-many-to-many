@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h2>
                    Update Repository
                </h2>
            </div>
            @include('partials.errors')
            <div class="row my-4">
                <div class="col">
                    <form action="{{ route('admin.projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <label for="img" class="form-label">
                            <strong>Project Title</strong> 
                        </label>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">
                                <i class="fa-solid fa-file-code fa-lg fa-fw"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Project Name" name="title" 
                            required maxlength="64" value="{{ old('title', $project->title) }}">
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label mt-3">
                                <strong>Image</strong> 
                            </label>
                            @if ($project->img)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" name="delete_img" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Delete image
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <img src="{{ asset('storage/'.$project->img) }}" style="height: 300px" alt="">
                                </div>
                            @endif
                            <input 
                                type="file"
                                accept="image/*"
                                id="img" 
                                class="form-control" 
                                placeholder="Inserisci immagine" 
                                name="img"> 
                        </div>
                        <label for="img" class="form-label">
                            <strong>Project Type</strong> 
                        </label>
                        <select class="form-select" aria-label="Default select example" name="type_id" required id="type">
                            <option value="">Select type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id', $project->type_id) ==  $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <div>
                            <div class="mt-4">
                                <label class="form-label d-block mb-2">
                                    <strong>Technology</strong> 
                                </label>
                                @foreach ($technologies as $technology)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" 
                                        type="checkbox"
                                        name="technologies[]"
                                        @if (old('technologies') && is_array(old('technologies')) && count(old('technologies')) > 0)
                                            {{ in_array($technology->id, old('technologies')) ? 'checked' : '' }} 
                                        @elseif ($project->technologies->contains($technology))
                                            checked
                                        @endif                                  
                                        id="Checkbox-{{ $technology->id }}" 
                                        value="{{ $technology->id }}">
                                        <label class="form-check-label" for="Checkbox-{{ $technology->id }}">
                                            {{ $technology->name }}
                                        </label>
                                    </div>
                                @endforeach   
                            </div>          
                            <button class="btn btn-success mt-4" type="submit">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection