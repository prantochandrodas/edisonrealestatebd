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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    About-Company</h1>
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
                    <li class="breadcrumb-item text-muted">About
                        Company</li>
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
            <table id="mydata" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Serial ID</th>
                        <th>Short Description Title</th>
                        <th>Short Description</th>
                        <th>Long Description Title</th>
                        <th>Long Description</th>
                        <th>Information Video Url</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!--end::Content container-->
    </div>

  
    @include('backend.about_us.information.modal')


    <script>
        $(document).ready(function() {
            $('#mydata').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('about-us-infos.getdata') }}',
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
                        data: 'short_description_title',
                        name: 'short_description_title'
                    },
                    {
                        data: 'short_description',
                        name: 'short_description',
                        render: function(data, type, row) {
                            const fullText = $('<div>').html(data).text(); // Decode HTML
                            const shortText = fullText.split(' ').slice(0, 10).join(' ');
                            if (fullText.length > shortText.length) {
                                return `
                                    <span class="short-text">${shortText}...</span>
                                    <span class="full-text" style="display: none;">${data}</span>
                                    <a href="#" class="shortDescriptionview" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search1" data-id="${row.id}">View More</a>
                                `;
                            }
                            return fullText;
                        }
                    },
                    {
                        data: 'long_description_title',
                        name: 'long_description_title'
                    },
                    {
                        data: 'long_description',
                        name: 'long_description',
                        render: function(data, type, row) {
                            const fullText = $('<div>').html(data).text(); // Decode HTML
                            const shortText = fullText.split(' ').slice(0, 10).join(' ');
                            if (fullText.length > shortText.length) {
                                return `
                                    <span class="short-text">${shortText}...</span>
                                    <span class="full-text" style="display: none;">${data}</span>
                                    <a href="#" class="longDescriptionview" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search2" data-id="${row.id}">View More</a>
                                `;
                            }
                            return fullText;
                        }
                    },
                    {
                        data: 'video_url',
                        name: 'video_url',
                        render: function(data, type, row) {
                            return `<a target="_blank" href="${data}">${data}</a>`;
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
        // Handle the view button click
        $(document).on('click', '.shortDescriptionview', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/about-us-info/view/' + id,
                type: 'GET',
                success: function(data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        $('#short_description').html(data.short_description);
                    }
                }
            });
        });

        // Handle the view button click
        $(document).on('click', '.longDescriptionview', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/about-us-info/view/' + id,
                type: 'GET',
                success: function(data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        $('#long_description_title').text(data.long_description_title);
                        $('#long_description').html(data.long_description);
                    }
                },
            });
        });
    </script>
@endsection
