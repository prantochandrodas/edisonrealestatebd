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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Featured
                    Project</h1>
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



    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <h3>Featured Project Title and Heading</h3>
            @if (count($featuredProjects) == 0)
                <a href={{ route('featured_project.create') }} class="btn btn-sm btn-primary mb-2">Add</a>
            @endif

            <table id="featuredProjectTitleHeading" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Serial ID</th>
                        <th>Title</th>
                        <th>Heading</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>

            <h3 style=" margin-top:50px">Featured Project post</h3>
            <a href={{ route('featured_project_post.create') }} class="btn btn-sm btn-primary mb-2">Add</a>
            <table id="featuredProjectPosts" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Serial ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!--end::Content container-->
    </div>


    <script>
        $(document).ready(function() {
            $('#featuredProjectTitleHeading').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('featured_project.getdata') }}',
                columns: [{
                        data: null, // Use null to signify that this column does not map directly to any data source
                        name: 'serial_number',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart +
                                1; // Calculate the serial number
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'heading',
                        name: 'heading'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<div class="btn-group">' + data + '</div>';
                        }
                    }
                ]
            });

            $('#featuredProjectPosts').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('featured_project_post.getdata') }}',
                columns: [{
                        data: null, // Use null to signify that this column does not map directly to any data source
                        name: 'serial_number',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart +
                                1; // Calculate the serial number
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, row) {
                            return '<img src="' + data + '" height="100"/>'; // Render image
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<div class="btn-group">' + data + '</div>';
                        }
                    }
                ]
            });
        });
    </script>
@endsection
