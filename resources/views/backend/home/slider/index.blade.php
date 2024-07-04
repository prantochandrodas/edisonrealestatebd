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
    <h1>Slider</h1>
    <a href={{ route('slider.create') }} class="btn btn-sm btn-primary">Add Slider</a>
    <table id="mydata" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Serial ID</th>
                <th>Image</th>
                <th>Heading</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    <script>
        $(document).ready(function() {
            $('#mydata').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('slider.get_sliders') }}',
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
                        data: 'image',
                        name: 'image',
                        render: function(data, type, row) {
                            return '<img src="' + data + '" height="100"/>'; // Render image
                        },
                        orderable: false,
                        searchable: false
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
        });
    </script>
@endsection
