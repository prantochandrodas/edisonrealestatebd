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
    Project
@endsection



<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Project</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="padding: 0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{route('projects.index')}}" class="text-muted text-hover-primary">Project</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Project</li>
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
        <h2 style="text-align: center;">Create Property-information</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
            @csrf
            {{-- project_category_id field  --}}
            <div class="form-group">
                <label for="project_category_id" class="mb-2 fs-5">Category:</label>
                <select name="project_category_id" class="form-control" id="type">
                    <option>Select Category</option>
                    @foreach ($category as $item)
                        <option value={{ $item->id }}>{{ $item->name }}</option>
                    @endforeach

                </select>
                @error('project_category_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- type  field  --}}
            <div class="form-group">
                <label for="type_id" class="mb-2 fs-5">Type:</label>
                <select name="type_id" class="form-control" id="type">
                    <option>Select Type</option>
                    @foreach ($type as $item)
                        <option value={{ $item->id }}>{{ $item->name }}</option>
                    @endforeach

                </select>
                @error('type_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- location  field  --}}
            <div class="form-group">
                <label for="location_id" class="mb-2 fs-5">Location:</label>
                <select name="location_id" class="form-control" id="type">
                    <option>Select Location</option>
                    @foreach ($location as $item)
                        <option value={{ $item->id }}>{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('location_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- status field  --}}
            <div class="form-group">
                <label for="status" class="mb-2 fs-5">Status:</label>
                <select name="status" class="form-control" id="status">
                    <option>Select status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="HandedOver">HandedOver</option>
                    <option value="SoldOut">SoldOut</option>
                </select>
                @error('status')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- name field  --}}
            <div class="form-group">
                <label for="name" class="mb-2 fs-5">Name:</label>
                <input type="text" class="form-control mb-2" id="name" name="name">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- short_title field  --}}
            <div class="form-group">
                <label for="short_title" class="mb-2 fs-5">Short Title:</label>
                <textarea name="short_title" id="short_title" class="form-control mb-2" cols="30" rows="5"></textarea>
                @error('short_title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- overview field  --}}
            <div class="form-group">
                <label for="overview" class="mb-2 fs-5">Overview:</label>
                <textarea name="overview" id="overview" class="form-control mb-2" cols="30" rows="5"></textarea>
                @error('overview')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- specification field  --}}
            <div class="form-group">
                <label for="specification" class="mb-2 fs-5">Specification:</label>
                <textarea name="specification" id="summernote" class="form-control mb-2" cols="30" rows="10"></textarea>
                @error('specification')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- amount field  --}}
            <div class="form-group">
                <label for="amount" class="mb-2 fs-5">Amount:</label>
                <input type="number" class="form-control mb-2" id="amount" name="amount">
                @error('amount')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- apartment_tour field  --}}
            <div class="form-group">
                <label for="apartment_tour" class="mb-2 fs-5">Apartment tour video link:</label>
                <input type="text" class="form-control mb-2" id="apartment_tour" name="apartment_tour">
                @error('apartment_tour')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- virtual_experience field  --}}
            <div class="form-group">
                <label for="virtual_experience" class="mb-2 fs-5">Virtual experience link:</label>
                <input type="text" class="form-control mb-2" id="virtual_experience" name="virtual_experience">
                @error('virtual_experience')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- google_map field  --}}
            <div class="form-group">
                <label for="google_map" class="mb-2 fs-5">Google Map link:</label>
                <input type="text" class="form-control mb-2" id="google_map" name="google_map">
                @error('google_map')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- images field  --}}
            <div class="form-group">
                <label for="images" class="mb-2 fs-5">Images:</label>
                <input type="file" multiple class="form-control mb-2" id="images" name="images[]">
                @error('images')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- beds field  --}}
            <div class="form-group">
                <label for="beds" class="mb-2 fs-5">Number of Beds:</label>
                <input type="number" class="form-control mb-2" id="beds" name="beds">
                @error('beds')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- baths field  --}}
            <div class="form-group">
                <label for="baths" class="mb-2 fs-5">Number of baths:</label>
                <input type="number" class="form-control mb-2" id="baths" name="baths">
                @error('baths')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- verandas field  --}}
            <div class="form-group">
                <label for="verandas" class="mb-2 fs-5">Number of verandas:</label>
                <input type="number" class="form-control mb-2" id="verandas" name="verandas">
                @error('verandas')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- area field  --}}
            <div class="form-group">
                <label for="area" class="mb-2 fs-5">Number of area:</label>
                <input type="number" class="form-control mb-2" id="area" name="area">
                @error('area')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- plot field  --}}
            <div class="form-group">
                <label for="plot" class="mb-2 fs-5">Plot:</label>
                <input type="text" class="form-control mb-2" id="plot" name="plot">
                @error('plot')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- road_no field  --}}
            <div class="form-group">
                <label for="road_no" class="mb-2 fs-5">road_no:</label>
                <input type="text" class="form-control mb-2" id="road_no" name="road_no">
                @error('road_no')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- block field  --}}
            <div class="form-group">
                <label for="block" class="mb-2 fs-5">block:</label>
                <input type="text" class="form-control mb-2" id="block" name="block">
                @error('block')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Create</button>
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
