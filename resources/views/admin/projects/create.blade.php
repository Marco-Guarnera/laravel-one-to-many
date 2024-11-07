@extends('layouts.app')

<!-- Create -->
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                @if ($errors->any())
                    <!-- Alert -->
                    <div class="alert alert-warning" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <!-- Form -->
                <form action="{{ route('admin.projects.store') }}" method="post">
                    @csrf
                    <!-- Project Name -->
                    <label for="project-name" class="form-label">Name:</label>
                    <input type="text" id="project-name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
                    {{-- @error('name')
                        <div class="alert alert-warning" role="alert">{{ $error }}</div>
                    @enderror --}}
                    <!-- Project Description -->
                    <label for="project-description" class="form-label">Description:</label>
                    <textarea id="project-description" class="form-control" name="description" rows="5" placeholder="Description">{{ old('description') }}</textarea>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
