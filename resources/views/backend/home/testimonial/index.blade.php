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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Testimonial</h1>
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
            <h3>Testimonial heading and title</h3>
            @if (count($testimonials) == 0)
                <a href={{ route('testimonials.create') }} class="btn btn-sm btn-primary mb-2">Add</a>
            @endif

            <table id="testimonials" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Serial ID</th>
                        <th>Title</th>
                        <th>Heading</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>

            <h3 style=" margin-top:50px">Testimonial post</h3>

            <a href={{ route('testimonial_posts.create') }} class="btn btn-sm btn-primary mb-2">Add</a>
            
            <table id="testimonialsPosts" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Serial ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Owner_name</th>
                        <th>Owner_title</th>
                        <th>Video</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!--end::Content container-->
    </div>


    <script>
        $(document).ready(function() {
            $('#testimonials').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('testimonials.getdata') }}',
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

            $('#testimonialsPosts').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('testimonial_posts.getdata') }}',
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
                        name: 'title'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'owner_name',
                        name: 'owner_name'
                    },
                    {
                        data: 'video',
                        name: 'video',
                        render: function(data, type, row) {
                            const videoUrl = data;
                            const videoId = videoUrl.split('v=')[1];
                            const ampersandPosition = videoId.indexOf('&');
                            if (ampersandPosition !== -1) {
                                videoId = videoId.substring(0, ampersandPosition);
                            }
                            return `<iframe width="100" height="100" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                        }
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
