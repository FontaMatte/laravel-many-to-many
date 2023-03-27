@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center mb-4">
        <div class="col">
            @include('partials.success')
            <h2 class="mb-3">
                Type: {{ $technology->name }}
            </h2>
            <h4>
                Linked Projects ({{ $technology->projects()->count() }})
            </h4>
            @if ($technology->projects()->count() > 0)
                <ul>
                    @foreach ($technology->projects as $project)
                    <li>
                        <a href="{{ route('admin.projects.show', $project->id) }}">
                            {{ $project->title }}
                        </a>                     
                    </li>
                    @endforeach
                </ul>
            @else
                <h6>
                    No linked Projects
                </h6>
            @endif
            
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-success mt-4">
                Back
            </a>
        </div>
    </div>
</div>
@endsection