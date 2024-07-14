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
     <!--begin::Toolbar-->
     <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Create Testimonial
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <span class="text-muted text-hover-primary">HomePage</span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Testimonial</li>
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
            <h2 style="text-align: center;">Create Timeline</h2>
        </div>
        
        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form method="POST" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
                @csrf
                
                 {{-- Title field  --}}
                 <div class="form-group">
                    <label for="title" class="mb-2 h5">Title:</label>
                    <input type="text" class="form-control mb-2" id="title" name="title">
                    @error('title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- description field  --}}
                <div class="form-group">
                    <label for="description" class="mb-2 h5">Description:</label>
                    <textarea type="text" class="form-control mb-2" id="description" name="description" cols="30" rows="2"></textarea>
                    @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                 {{-- owner_name field  --}}
                 <div class="form-group">
                    <label for="owner_name" class="mb-2 h5">Owner Name:</label>
                    <input type="text" class="form-control mb-2" id="owner_name" name="owner_name">
                    @error('owner_name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                 {{-- owner_title field  --}}
                 <div class="form-group">
                    <label for="owner_title" class="mb-2 h5">Owner Title:</label>
                    <input type="text" class="form-control mb-2" id="owner_title" name="owner_title">
                    @error('owner_title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- thumbnail_image field  --}}
                <div class="form-group">
                    <label for="thumbnail_image" class="mb-2 h5">Thumbnail Image:</label>
                    <input type="file" class="form-control mb-2" id="thumbnail_image" name="thumbnail_image">
                    @error('thumbnail_image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                 {{-- video field  --}}
                 <div class="form-group">
                    <label for="video" class="mb-2 h5">Video Link:</label>
                    <input type="text" class="form-control mb-2" id="video" name="video">
                    @error('video')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- submit button  --}}
                <button type="submit" class="btn btn-primary btn-sm">Create</button>
            </form>
        </div>
    </div>
    
@endsection
