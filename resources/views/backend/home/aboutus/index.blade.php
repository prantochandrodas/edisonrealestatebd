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
    <h1>About Us</h1>
    <a href={{ route('home_about.create') }} class="btn btn-sm btn-primary">Add Slider</a>
    <table id="homeabout" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Serial ID</th>
                <th>Title</th>
                <th>Heading</th>
                <th>Description</th>
                <th>Video</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>


    {{-- view modal  --}}

    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Expense Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <textarea class="form-control" id="title" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="heading" class="form-label">Heading</label>
                            <textarea class="form-control" id="heading" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="10" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="video" class="form-label">Video</label>
                            <div id="video"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    


    <script>
        $(document).ready(function() {
            $('#homeabout').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('home_about.get_about') }}',
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
                        data: 'description',
                        name: 'description',
                        render: function(data, type, row) {
                            const fullText = data;
                            const shortText = fullText.split(' ').slice(0, 10).join(' ');
                            if (fullText.length > shortText.length) {
                                return `
                                    <span class="short-text">${shortText}...</span>
                                    <span class="full-text" style="display: none;">${fullText}</span>
                                    <a href="#" class="view" data-id="${row.id}">View More</a>
                                  
                                `;
                            }
                            return fullText;
                        }
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


            // Handle the view button click
            $(document).on('click', '.view', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/home_about/view/' + id,
                    type: 'GET',
                    success: function(data) {
                        if (data.error) {
                            alert(data.error);
                        } else {
                            $('#title').text(data.title);
                            $('#heading').text(data.heading);
                            $('#description').text(data.description);
                            const videoUrl = data.video;
                            const videoId = videoUrl.split('v=')[1];
                            const ampersandPosition = videoId.indexOf('&');
                            if (ampersandPosition !== -1) {
                                videoId = videoId.substring(0, ampersandPosition);
                            }
                            $('#video').html(`<iframe width="100%" height="315" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`);
                            $('#viewModal').modal('show');
                        }
                    },
                    error: function() {
                        alert('Error fetching data.');
                    }
                });
            });

            //  Handle View More/Less functionality
            $(document).on('click', '.view-more', function(e) {
                e.preventDefault();
                const shortText = $(this).siblings('.short-text');
                const fullText = $(this).siblings('.full-text');
                if (shortText.is(':visible')) {
                    shortText.hide();
                    fullText.show();
                    $(this).text('View Less');
                } else {
                    shortText.show();
                    fullText.hide();
                    $(this).text('View More');
                }
            });
        });
    </script>
@endsection
