@extends('layouts.backend')
@section('content')
    <!-- success message  -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- error message  -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('home_about.update', $homeabout->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $homeabout->title }}" required>
        </div>
        <div class="form-group">
            <label for="heading">Heading:</label>
            <input type="text" class="form-control" id="heading" name="heading" value="{{ $homeabout->heading }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $homeabout->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="video">Video:</label>
            <input type="text" class="form-control" id="video" name="video" value="{{ $homeabout->video }}">
        </div>
        <div class="form-group">
            <label for="show-video">Video:</label>
            @php
                $videoUrl = $homeabout->video;
                $videoId = null;
                if (strpos($videoUrl, 'youtube.com') !== false) {
                    $videoId = substr(parse_url($videoUrl, PHP_URL_QUERY), 2);
                } elseif (strpos($videoUrl, 'youtu.be') !== false) {
                    $videoId = substr(parse_url($videoUrl, PHP_URL_PATH), 1);
                }
            @endphp
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
