@extends('layouts.frontend')
@section('frontend-content')
    <!--inner banner start-->
    <div class="innerBanner Loader">
        <img class="modify-img " data-image-small="{{ asset('imagegallery-banners/' . $banner->image) }}"
            data-image-large="{{ asset('imagegallery-banners/' . $banner->image) }}"
            data-image-standard="{{ asset('imagegallery-banners/' . $banner->image) }}" alt="">
        <!--1366x400-->

        <div class="container">
            <div class="row">
                <h1 class="anim textOver"><span><span>{{ $banner->title }}</span></span></h1>
            </div>
        </div>
    </div>
    <!--inner banner end-->


    <section class="image_gallery pt100 pb100">
        <div class="container">
            <div class="row">
                @foreach ($post as $item)
                    <div class="col-md-4 single_item Light col-xs-12">
                        <div class="image_wrapper Loader ">
                            <a href="{{asset('image-gallery-thumbnail-image/'.$item->thumbnail_image)}}"></a>

                            <img class="modify-img "
                                data-image-small="{{asset('image-gallery-thumbnail-image/'.$item->thumbnail_image)}}"
                                data-image-large="{{asset('image-gallery-thumbnail-image/'.$item->thumbnail_image)}}"
                                data-image-standard="{{asset('image-gallery-thumbnail-image/'.$item->thumbnail_image)}}"
                                alt="">

                            <p class="view_all">View All</p>
                        </div>
                        <h5 class="gallery_title">{{$item->title}}</h5>

                        @foreach ($item->images as $image)
                             <a href="{{asset('image-gallery-images/'.$image->image)}}"></a>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
