<!-- resources/views/backend/home/slider/edit.blade.php -->
@extends('layouts.backend')

@section('content')
    <div class="container mt-5">
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

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Update
                        Investor-information</h1>
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
                        <li class="breadcrumb-item text-muted">Investor-information</li>
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
                <h2 style="text-align: center;">Update Investor-information</h2>
            </div>
            
            <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
                <form action="{{ route('investor-informations.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="thumbnail_image" class="h5 mb-2">Thumbnail Image:</label>
                        <input type="file" class="form-control mb-2" id="thumbnail_image" name="thumbnail_image">
                        @if ($data->thumbnail_image)
                            <img src="{{ asset('home/InvestorInformation/'.$data->thumbnail_image) }}" height="100" alt="Current Image">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="video" class="h5 mb-2">Video:</label>
                        <input type="text" class="form-control mb-4" id="video" name="video"
                            value="{{ $data->video }}" required>
                    </div>
                   
                    <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection