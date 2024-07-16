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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Create Chairman Information
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <span class="text-muted text-hover-primary">AboutPage</span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Chairman Information</li>
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
            <h2 style="text-align: center;">Create Chairman Information</h2>
        </div>
        
        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form method="POST" action="{{ route('about-chairmans.store') }}" enctype="multipart/form-data">
                @csrf
                 {{-- Title field  --}}
                 <div class="form-group">
                    <label for="title" class="mb-2 h5">Title:</label>
                    <input type="text" class="form-control mb-2" id="title" name="title">
                    @error('title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                 

                 {{-- Name field  --}}
                 <div class="form-group">
                    <label for="name" class="mb-2 h5">Name:</label>
                    <input type="text" class="form-control mb-2" id="name" name="name">
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                 {{-- Company Information field  --}}
                 <div class="form-group">
                    <label for="company_information" class="mb-2 h5">Company Information:</label>
                    <textarea type="text" class="form-control mb-2" id="summernote" name="company_information" cols="30" rows="2"></textarea>
                    @error('company_information')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                 {{-- chairman_image field  --}}
                 <div class="form-group">
                    <label for="chairman_image" class="mb-2 h5">Chairman Image:</label>
                    <input type="file" class="form-control mb-2" id="chairman_image" name="chairman_image">
                    @error('chairman_image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                 {{-- chairman_information field  --}}
                 <div class="form-group">
                    <label for="chairman_information" class="mb-2 h5">Chairman Information:</label>
                    <textarea type="text" class="form-control mb-2" id="summernote2" name="chairman_information" cols="30" rows="2"></textarea>
                    @error('chairman_information')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- institute_logo field  --}}
                <div class="form-group">
                    <label for="institute_logo" class="mb-2 h5">Istitute Image:</label>
                    <input type="file" class="form-control mb-2" id="institute_logo" name="institute_logo">
                    @error('institute_logo')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- reference field  --}}
                <div class="form-group">
                    <label for="reference" class="mb-2 h5">Reference:</label>
                    <input type="text" class="form-control mb-2" id="reference" name="reference">
                    @error('reference')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- submit button  --}}
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