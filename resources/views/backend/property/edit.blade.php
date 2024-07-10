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
        <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit Property
                    Information
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1"
                    style="padding:0px;background-color:inherit">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <span class="text-muted text-hover-primary">Property-Page</span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Property</li>
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
            <h2 style="text-align: center;">Edit Property-information</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form method="POST" action="{{ route('propertys.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- name field  --}}
                <div class="form-group">
                    <label for="name" class="mb-2 fs-5">Name:</label>
                    <input type="text" class="form-control mb-2" id="name" name="name" value={{ $data->name }}>
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- short_title field  --}}
                <div class="form-group">
                    <label for="short_title" class="mb-2 fs-5">Short Title:</label>
                    <textarea name="short_title" id="short_title" class="form-control mb-2" cols="30" rows="5">{{ $data->short_title }}</textarea>
                    @error('short_title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- address field  --}}
                <div class="form-group">
                    <label for="address" class="mb-2 fs-5">Address:</label>
                    <input type="text" class="form-control mb-2" id="address" name="address"
                        value={{ $data->address }}>
                    @error('address')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- overview field  --}}
                <div class="form-group">
                    <label for="overview" class="mb-2 fs-5">Overview:</label>
                    <textarea name="overview" id="overview" class="form-control mb-2" cols="30" rows="5">{{ $data->overview }}</textarea>
                    @error('overview')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- specification field  --}}
                <div class="form-group">
                    <label for="specification" class="mb-2 fs-5">Specification:</label>
                    <textarea name="specification" id="summernote" class="form-control mb-2" cols="30" rows="10">{{ $data->specification }}</textarea>
                    @error('specification')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- amount field  --}}
                <div class="form-group">
                    <label for="amount" class="mb-2 fs-5">Amount:</label>
                    <input type="number" class="form-control mb-2" id="amount" name="amount"
                        value="{{ $data->amount }}">
                    @error('amount')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- type field  --}}
                <div class="form-group">
                    <label for="type" class="mb-2 fs-5">Type:</label>
                    <select name="type" class="form-control" id="type">
                        <option value="Ongoing">Ongoing</option>
                        <option value="Upcoming">Upcoming</option>
                        <option value="Completed">Completed</option>
                    </select>
                    @error('type')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- apartment_tour field  --}}
                <div class="form-group">
                    <label for="apartment_tour" class="mb-2 fs-5">Apartment_tour:</label>
                    <input type="text" class="form-control mb-2" id="apartment_tour" name="apartment_tour"
                        value="{{ $data->apartment_tour }}">
                    @error('apartment_tour')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- virtual_experience field  --}}
                <div class="form-group">
                    <label for="virtual_experience" class="mb-2 fs-5">Virtual_experience:</label>
                    <input type="text" class="form-control mb-2" id="virtual_experience" name="virtual_experience"
                        value="{{ $data->virtual_experience }}">
                    @error('virtual_experience')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <h3>Existing Images:</h3>
                    <div>
                        @foreach ($data->images as $image)
                            <div class="image-container mb-3" style="position: relative; display: inline-block;">
                                <img src="{{ asset($image->image) }}" alt="Image" width="150" height="150"
                                    style="position: relative;">
                                <button type="button" class="btn btn-sm delete-image"
                                    style="position: absolute; top: 15px; right: 15px; transform: translate(50%, -50%);"
                                    data-image-id="{{ $image->id }}">
                                    <i class="fas fa-times" style="font-size: 30px"></i>
                                </button>
                                <input type="hidden" name="delete_images[]" value="{{ $image->id }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </form>
        </div>
    </div>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 250
            });
            $('#summernote2').summernote({
                height: 250
            });
        });
    </script>
@endsection
