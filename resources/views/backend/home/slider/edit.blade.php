<!-- resources/views/backend/home/slider/edit.blade.php -->
@extends('layouts.backend')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Edit Slider</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($slider->image)
                    <img src="{{ asset($slider->image) }}" height="100" alt="Current Image">
                @endif
            </div>
            <div class="form-group">
                <label for="heading">Heading:</label>
                <input type="text" class="form-control" id="heading" name="heading" value="{{ $slider->heading }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
