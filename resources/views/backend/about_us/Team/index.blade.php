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
Team-Member
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Team</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="/about-us/team" class="text-muted text-hover-primary">About</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Team</li>
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

        <a href="{{ route('teams.create') }}" class="btn btn-primary btn-sm">Add</a>
        <table id="mydata" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Serial ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>About</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
    <!--end::Content container-->
</div>

@include('backend.about_us.team.modal')

<script>
    $(document).ready(function() {
        $('#mydata').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('teams.getdata') }}',
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
                    data: 'designation',
                    name: 'designation'
                },
                {
                    data: 'about',
                    name: 'about',
                    render: function(data, type, row) {
                        const fullText = $('<div>').html(data).text(); // Decode HTML
                        const shortText = fullText.split(' ').slice(0, 10).join(' ');
                        if (fullText.length > shortText.length) {
                            return `
                                    <span class="short-text">${shortText}...</span>
                                    <span class="full-text" style="display: none;">${data}</span>
                                    <a href="#" class="about" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search1" data-id="${row.id}">View More</a>
                                `;
                        }
                        return fullText;
                    }
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

        // Handle the view button click
        $(document).on('click', '.about', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/team/view/' + id,
                type: 'GET',
                success: function(data) {
                    console.log(data)
                    if (data.error) {
                        alert(data.error);
                    } else {
                        $('#about').html(data.about);
                    }
                }
            });
        });
    });
</script>
@endsection
