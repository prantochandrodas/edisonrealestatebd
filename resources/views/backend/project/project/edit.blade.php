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
            <form method="POST" action="{{ route('projects.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- category field  --}}
                <div class="form-group">
                    <label for="project_category_id" class="mb-2 fs-5">Category:</label>
                    <select name="project_category_id" class="form-control" id="project_category_id">
                        <option>Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}"
                                {{ $data->project_category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('project_category_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- type_id field  --}}
                <div class="form-group">
                    <label for="type_id" class="mb-2 fs-5">Type:</label>
                    <select name="type_id" class="form-control" id="type_id">
                        <option>Select Type</option>
                        @foreach ($types as $item)
                            <option value="{{ $item->id }}" {{ $data->type_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- location  field  --}}
                <div class="form-group">
                    <label for="location_id" class="mb-2 fs-5">Location:</label>
                    <select name="location_id" class="form-control" id="location_id">
                        <option>Select Location</option>
                        @foreach ($locations as $item)
                            <option value="{{ $item->id }}" {{ $data->location_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('location_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- status field --}}
                <div class="form-group">
                    <label for="status" class="mb-2 fs-5">Status:</label>
                    <select name="status" class="form-control" id="status">
                        <option value="">Select status</option>
                        <option value="Active" {{ $data->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $data->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="HandedOver" {{ $data->status == 'HandedOver' ? 'selected' : '' }}>HandedOver</option>
                        <option value="SoldOut" {{ $data->status == 'SoldOut' ? 'selected' : '' }}>SoldOut</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- name field  --}}
                <div class="form-group">
                    <label for="name" class="mb-2 fs-5">Name:</label>
                    <input type="text" class="form-control mb-2" id="name" name="name"
                        value={{ $data->name }}>
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
                {{-- images field  --}}
                <div class="form-group">
                    <label for="images" class="mb-2 fs-5">Images:</label>
                    <input type="file" multiple class="form-control mb-2" id="images" name="images[]">
                    @error('images')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <h3>Existing Images:</h3>
                    <div>
                        @foreach ($data->images as $image)
                            <div class="image-container mb-3" style="position: relative; display: inline-block;">
                                <img src="{{ asset('project/'.$image->image) }}" alt="Image" width="150" height="150"
                                    style="position: relative;">
                                <button type="button" class="btn btn-sm delete-image"
                                    style="position: absolute; top: 15px; right: 15px; transform: translate(50%, -50%);"
                                    data-image-id="{{ $image->id }}">
                                    <i class="fas fa-times" style="font-size: 30px"></i>
                                </button>
                                <input type="hidden" name="existing_images[]" value="{{ $image->id }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                  {{-- beds field  --}}
                  <div class="form-group">
                    <label for="beds" class="mb-2 fs-5">Number of Beds:</label>
                    <input type="number" class="form-control mb-2" id="beds" name="beds" value="{{$data->beds}}">
                    @error('beds')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- baths field  --}}
                <div class="form-group">
                    <label for="baths" class="mb-2 fs-5">Number of baths:</label>
                    <input type="number" class="form-control mb-2" id="baths" name="baths" value="{{$data->baths}}">
                    @error('baths')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- verandas field  --}}
                <div class="form-group">
                    <label for="verandas" class="mb-2 fs-5">Number of verandas:</label>
                    <input type="number" class="form-control mb-2" id="verandas" name="verandas" value="{{$data->verandas}}">
                    @error('verandas')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                {{-- area field  --}}
                <div class="form-group">
                    <label for="area" class="mb-2 fs-5">Number of area:</label>
                    <input type="number" class="form-control mb-2" id="area" name="area" value="{{$data->area}}">
                    @error('area')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                 {{-- plot field  --}}
                 <div class="form-group">
                    <label for="plot" class="mb-2 fs-5">Plot:</label>
                    <input type="text" class="form-control mb-2" id="plot" name="plot" value="{{$data->plot}}">
                    @error('plot')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                 {{-- road_no field  --}}
                 <div class="form-group">
                    <label for="road_no" class="mb-2 fs-5">road_no:</label>
                    <input type="text" class="form-control mb-2" id="road_no" name="road_no" value="{{$data->road_no}}">
                    @error('road_no')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                 
                 {{-- block field  --}}
                 <div class="form-group">
                    <label for="block" class="mb-2 fs-5">block:</label>
                    <input type="text" class="form-control mb-2" id="block" name="block" value="{{$data->block}}">
                    @error('block')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
    
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </form>
        </div>
    </div>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

    <script>
        $(document).ready(function() {
            $('.delete-image').on('click', function() {
                const imageId = $(this).data('image-id');
                const container = $(this).closest('.image-container');

                $.ajax({
                    url: '/projects/delete-image/' + imageId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            container.remove();
                        }
                    }
                });
            });
            $('#summernote').summernote({
                height: 250
            });
            $('#summernote2').summernote({
                height: 250
            });
        });
    </script>
@endsection