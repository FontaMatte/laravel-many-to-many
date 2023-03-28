@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                @include('partials.success')
                <h2>
                    Repository Name: {{ $project->title }}
                </h2>
                @if ($project->img)
                    <div>
                        <img src="{{ asset('storage/'.$project->img) }}" style="height: 300px" alt="">
                    </div>
                @endif
                <div>
                    <strong>Commits:</strong> {{ $project->commits }}
                </div>
                <div>
                   <strong>Stars:</strong> {{ $project->stars }}
                </div>
                <div>
                    <strong>Repository type:</strong>
                    @if ($project->type)
                        <a href="{{ route('admin.types.show', $project->type->id) }}">
                            {{ $project->type->name }}
                        </a>
                    @else
                        No Type
                    @endif
                </div>
                <div>
                    <strong>Technologies:</strong> 
                    @if ($project->technologies->isNotEmpty())
                        @foreach ($project->technologies as $technology)
                            <a href="{{ route('admin.technologies.show', $technology->id) }}">
                                {{ $technology->name }}
                            </a>
                            @if (!$loop->last)- @endif  
                        @endforeach                   
                    @else
                        No Technology
                    @endif
                 </div>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-success mt-4">
                    Back
                </a>
            </div>
        </div>
    </div>
@endsection