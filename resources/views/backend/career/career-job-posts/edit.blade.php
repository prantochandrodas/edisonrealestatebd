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
    Job-Post
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Career-Job-Post</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{route('careers.index')}}" class="text-muted text-hover-primary">Career</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Career-Job-Post</li>
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
        <h2 style="text-align: center;">Create Job-Post</h2>
    </div>
    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form action="{{ route('job-posts.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- title inpu field --}}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}"
                    required>
                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- vacancy inpu field --}}
            <div class="form-group">
                <label for="vacancy">Vacancy:</label>
                <input type="number" class="form-control" id="vacancy" name="vacancy" value="{{ $data->vacancy }}"
                    required>
                @error('vacancy')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- employment_status field  --}}
            <div class="form-group">
                <label for="employment_status" class="mb-2 fs-5">Employment Status:</label>
                <select name="employment_status" class="form-control" id="employment_status">
                    <option>Select Employment Status</option>
                    <option value="Full-time" {{ $data->employment_status == 'Full-time' ? 'selected' : '' }}>Full-time
                    </option>
                    <option value="Part-time" {{ $data->employment_status == 'Part-time' ? 'selected' : '' }}>Part-time
                    </option>
                    <option value="Internship" {{ $data->employment_status == 'Internship' ? 'selected' : '' }}>
                        Internship</option>
                    <option value="Contract" {{ $data->employment_status == 'Contract' ? 'selected' : '' }}>Contract
                    </option>
                </select>
                @error('employment_status')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- experience inpu field --}}
            <div class="form-group">
                <label for="experience">Experience:</label>
                <input type="text" class="form-control" id="experience" name="experience"
                    value="{{ $data->experience }}" required>
                @error('experience')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- description input field --}}
            <div style="margin-bottom: 20px;">
                <label for="description" style="display: block; margin-bottom: 5px;">Description:</label>
                <textarea name="description" id="summernote" cols="30" rows="10" class="form-control"
                    style="width: 100%; padding: 8px;">{{ $data->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
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
