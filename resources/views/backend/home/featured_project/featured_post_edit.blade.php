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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Feature Post Edit</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Dashboards</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <div style="max-width: 600px; margin: 0 auto;">
        <div style="background-color: #f0f0f0; padding: 20px;">
            <h2 style="text-align: center;">Edit Featured Post</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form method="POST" action="{{ route('featured-project-posts.update',$post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div style="margin-bottom: 20px;">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if ($post->image)
                        <img src="{{ asset($post->image) }}" height="100" alt="Current Image">
                    @endif
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="name" style="display: block; margin-bottom: 5px;">Name:</label>
                    <input name="name" type="text" id="name" class="form-control"
                        style="width: 100%; padding: 8px;" value="{{$post->name}}">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="description" style="display: block; margin-bottom: 5px;">Description:</label>
                    <textarea name="description" type="text" id="description" cols="30" rows="10" style="width: 100%; padding: 8px;" value="{{$post->description}}">{{$post->description}}"</textarea>
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="location" style="display: block; margin-bottom: 5px;">Location</label>
                    <input name="location" type="text" id="location" class="form-control"
                        style="width: 100%; padding: 8px;" value="{{$post->location}}">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="tour_status_link" style="display: block; margin-bottom: 5px;">Tour Status Link:</label>
                    <input name="tour_status_link" type="text" id="tour_status_link" class="form-control"
                        style="width: 100%; padding: 8px;" value="{{$post->tour_status_link}}">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="virtual_experience_link" style="display: block; margin-bottom: 5px;">Cirtural Experience
                        Link:</label>
                    <input name="virtual_experience_link" type="text" id="virtual_experience_link" class="form-control"
                        style="width: 100%; padding: 8px;" value="{{$post->virtual_experience_link}}">
                </div>
                <button type="submit"
                    style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px;">Create</button>
            </form>
        </div>
    </div>
@endsection
