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
    <h1>Create Slider</h1>
    <div style="max-width: 600px; margin: 0 auto;">
        <div style="background-color: #f0f0f0; padding: 20px;">
            <h2 style="text-align: center;">Create Slider</h2>
        </div>
        
        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label for="image" style="display: block; margin-bottom: 5px;">Image:</label>
                    <input type="file" id="image" name="image" class="form-control" style="width: 100%; padding: 8px;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="heading" style="display: block; margin-bottom: 5px;">Heading:</label>
                    <textarea name="heading" type="text" id="heading" class="form-control" cols="30" rows="2" style="width: 100%; padding: 8px;"></textarea>
                </div>
                <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px;">Create</button>
            </form>
        </div>
    </div>
    
@endsection