<!-- resources/views/backend/home/slider/edit.blade.php -->
@extends('layouts.backend')

@section('content')
    <div class="container mt-5">
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

    @section('title')
        Blog-Post
    @endsection

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Blog-Post</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{route('blog.index')}}" class="text-muted text-hover-primary">Blog</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Blog-Post</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->

    <div class="app-container container-fluid">
        <div style="background-color: #f0f0f0; padding: 20px;">
            <h2 style="text-align: center;">Edit Slider</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form action="{{ route('blog-posts.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- title input field  --}}
                <div class="form-group">
                    <label for="title" class="mb-2 h5">title:</label>
                    <input type="text" class="form-control mb-2" id="title" name="title"
                        value="{{ $data->title }}" required>
                    @error('title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- image input field  --}}
                <div class="form-group">
                    <label for="image" class="mb-2 h5">Image:</label>
                    <input type="file" class="form-control mb-2" id="image" name="image">
                    @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    @if ($data->image)
                        <img src="{{ asset('blog/blog-post/' . $data->image) }}" height="100" class="mb-2"
                            alt="Current Image">
                    @endif
                </div>

                {{-- description field  --}}
                <div class="form-group">
                    <label for="description" class="mb-2 h5">Description:</label>
                    <textarea name="description" id="summernote" class="form-control mb-2" cols="30" rows="10">{{ $data->description }}</textarea>
                    @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </form>
        </div>
    </div>

</div>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 250
        });
    });
</script>
@endsection
