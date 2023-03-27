@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h2>
                    New Repository
                </h2>
            </div>
            @include('partials.errors')
            <div class="row my-4">
                <div class="col">
                    <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="title" class="form-label">
                            <strong>Project Name</strong><span class="text-danger">*</span>  
                        </label>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">
                                <i class="fa-solid fa-file-code fa-lg fa-fw"></i>
                            </span>
                            <input 
                                type="text"
                                id="title" 
                                class="form-control" 
                                placeholder="Insert Project Name" 
                                name="title" 
                                required maxlength="64" 
                                value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">
                                <strong>Image</strong> 
                            </label>
                            <input 
                                type="file"
                                accept="image/*"
                                id="img" 
                                class="form-control" 
                                placeholder="Inserisci immagine" 
                                name="img"> 
                        </div>
                        <label for="type" class="form-label">
                            <strong>Project type</strong><span class="text-danger">*</span> 
                        </label>
                        <select class="form-select" aria-label="Default select example" name="type_id" required id="type">
                            <option value="">Select type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id') ==  $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <div class="mt-4">
                            <label class="form-label d-block mb-2">
                                <strong>Technology</strong> 
                            </label>
                            @foreach ($technologies as $technology)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" 
                                    type="checkbox"
                                    name="technologies[]"
                                    {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }} 
                                    id="Checkbox-{{ $technology->id }}" 
                                    value="{{ $technology->id }}">
                                    <label class="form-check-label" for="Checkbox-{{ $technology->id }}">
                                        {{ $technology->name }}
                                    </label>
                                </div>
                            @endforeach   
                        </div>          
                        <div>
                            <button class="btn btn-success mt-5" type="submit">
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection