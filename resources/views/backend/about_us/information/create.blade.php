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


    <!-- validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Create
                    About Company-Information</h1>
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
                    <li class="breadcrumb-item text-muted">About Company-Information</li>
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
            <h2 style="text-align: center;">Create About Us-Information</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form method="POST" action="{{ route('about-us-infos.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- short_description_title input field --}}
                <div style="margin-bottom: 20px;">
                    <label for="short_description_title" style="display: block; margin-bottom: 5px;">Short Description
                        Title:</label>
                    <input type="text" id="short_description_title" name="short_description_title" class="form-control"
                        style="width: 100%; padding: 8px;">
                </div>


                {{-- short_description input field --}}
                <div style="margin-bottom: 20px;">
                    <label for="short_description" style="display: block; margin-bottom: 5px;">Short Description:</label>
                    <textarea name="short_description" id="summernote" cols="30" rows="10" class="form-control"
                        style="width: 100%; padding: 8px;"></textarea>
                </div>

                {{-- long_description_title input field --}}
                <div style="margin-bottom: 20px;">
                    <label for="long_description_title" style="display: block; margin-bottom: 5px;">Long Description
                        Title:</label>
                    <input type="text" id="long_description_title" name="long_description_title" class="form-control"
                        style="width: 100%; padding: 8px;">
                </div>

                {{-- long_description input field --}}
                <div style="margin-bottom: 20px;">
                    <label for="long_description" style="display: block; margin-bottom: 5px;">Long
                        Description:</label>
                    <textarea name="long_description" id="summernote2" cols="30" rows="10" class="form-control"
                        style="width: 100%; padding: 8px;"></textarea>
                </div>

                {{-- video_url input field --}}
                <div style="margin-bottom: 20px;">
                    <label for="video_url" style="display: block; margin-bottom: 5px;">Information Video Url:</label>
                    <input type="text" id="video_url" name="video_url" class="form-control"
                        style="width: 100%; padding: 8px;">
                </div>
                <button type="submit"
                    style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px;">Create</button>
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
