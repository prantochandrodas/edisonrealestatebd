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

@section('title')
    Social-Link
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Social-Link
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1"
                style="padding:0px; background-color:inherit">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <span class="text-muted text-hover-primary">Home</span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Social-Link</li>
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
        <h2 style="text-align: center;">Create Social-link</h2>
    </div>
    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form action="{{ route('social-links.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- name inpu field --}}
            <div class="form-group">
                <label for="name" class="mb-2 fs-5 fw-bold">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
            </div>
            {{-- logo inpu field --}}
            <div class="form-group">
                <label for="logo" class="mb-2 fs-5 fw-bold">Logo:</label>
                <input type="file" class="form-control" id="logo" name="logo">
            </div>
            @if ($data->logo)
                <img src="{{ asset('application/social-link/' . $data->logo) }}" height="100" class="mb-2"
                    alt="logo">
            @endif

            {{-- url inpu field --}}
            <div class="form-group">
                <label for="url" class="mb-2 fs-5 fw-bold">Url:</label>
                <input type="text" class="form-control" id="url" name="url" value="{{ $data->url }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
