<!-- resources/views/backend/home/data/edit.blade.php -->
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
        Application
    @endsection

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    Application</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{route('home')}}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Application</li>
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
            <h2 style="text-align: center;">Edit Application-Information</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form action="{{ route('applications.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- company_name input field  --}}
                <div class="form-group">
                    <label for="company_name" class="mb-2 h5">Company Name:</label>
                    <input type="text" class="form-control mb-2" id="company_name" name="company_name"
                        value="{{ $data->company_name }}" required>
                    @error('company_name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- email input field  --}}
                <div class="form-group">
                    <label for="email" class="mb-2 h5">Company Name:</label>
                    <input type="email" class="form-control mb-2" id="email" name="email"
                        value="{{ $data->email }}" required>
                    @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- address field  --}}
                <div class="form-group">
                    <label for="address" class="mb-2 h5">Address:</label>
                    <textarea name="address" id="address" class="form-control mb-2" cols="30" rows="10">{{ $data->address }}</textarea>
                    @error('address')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- hotline input field  --}}
                <div class="form-group">
                    <label for="hotline" class="mb-2 h5">Hotline:</label>
                    <input type="text" class="form-control mb-2" id="hotline" name="hotline"
                        value="{{ $data->hotline }}" required>
                    @error('hotline')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                {{-- logo input field  --}}
                <div class="form-group">
                    <label for="logo" class="mb-2 h5">logo:</label>
                    <input type="file" class="form-control mb-2" id="logo" name="logo">
                    @error('logo')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    @if ($data->logo)
                        <img src="{{ asset('application/logo/' . $data->logo) }}" height="100" class="mb-2"
                            alt="Current Image">
                    @endif
                </div>

                {{-- footer_bg_image input field  --}}
                <div class="form-group">
                    <label for="footer_bg_image" class="mb-2 h5">footer_bg_image:</label>
                    <input type="file" class="form-control mb-2" id="footer_bg_image" name="footer_bg_image">
                    @error('footer_bg_image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    @if ($data->footer_bg_image)
                        <img src="{{ asset('footer-background-image/' . $data->footer_bg_image) }}" height="100"
                            class="mb-2" alt="Current Image">
                    @endif
                </div>

                {{-- map input field  --}}
                <div class="form-group">
                    <label for="map" class="mb-2 h5">Google Map:</label>
                    <input type="text" class="form-control mb-2" id="map" name="map"
                        value="{{ $data->map }}" required>
                    @error('map')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
