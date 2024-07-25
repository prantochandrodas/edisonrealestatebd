@extends('layouts.frontend')
@section('frontend-content')
    <!--inner banner start-->
    <div class="innerBanner Loader">
        <img class="modify-img " data-image-small="{{asset('video-gallery-banners/'.$banner->image)}}"
            data-image-large="{{asset('video-gallery-banners/'.$banner->image)}}"
            data-image-standard="{{asset('video-gallery-banners/'.$banner->image)}}" alt="">
        <!--1366x400-->

        <div class="container">
            <div class="row">
                <h1 class="anim textOver"><span><span>{{$banner->title}}</span></span></h1>
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
                        <a href="{{$item->video_url}}"></a>

                        <img class="modify-img "
                            data-image-small="{{asset('video-gallery-thumbnail-image/'.$item->image)}}"
                            data-image-large="{{asset('video-gallery-thumbnail-image/'.$item->image)}}"
                            data-image-standard="{{asset('video-gallery-thumbnail-image/'.$item->image)}}"
                            alt="">



                        <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130" viewBox="0 0 130 130">
                            <defs>
                                <filter id="Ellipse_6" x="0" y="0" width="130" height="130"
                                    filterUnits="userSpaceOnUse">
                                    <feOffset dy="5" input="SourceAlpha"></feOffset>
                                    <feGaussianBlur stdDeviation="10" result="blur"></feGaussianBlur>
                                    <feFlood flood-opacity="0.102"></feFlood>
                                    <feComposite operator="in" in2="blur"></feComposite>
                                    <feComposite in="SourceGraphic"></feComposite>
                                </filter>
                            </defs>
                            <g id="Component_27_3" data-name="Component 27 – 3" transform="translate(30 25)">
                                <g transform="matrix(1, 0, 0, 1, -30, -25)" filter="url(#Ellipse_6)">
                                    <circle id="Ellipse_6-2" data-name="Ellipse 6" cx="35" cy="35" r="35"
                                        transform="translate(30 25)" fill="white"></circle>
                                </g>
                                <circle class="hover-init-btn" id="Ellipse_7" data-name="Ellipse 7" cx="1"
                                    cy="1" r="1" transform="translate(34 34)" fill="#fff"></circle>
                                <path id="Polygon_1" data-name="Polygon 1"
                                    d="M9.419,1.872a1.5,1.5,0,0,1,2.5,0l7.864,11.8A1.5,1.5,0,0,1,18.531,16H2.8a1.5,1.5,0,0,1-1.248-2.332Z"
                                    transform="translate(44 24) rotate(90)" fill="#405672"></path>
                            </g>
                        </svg>

                    </div>

                    <h3>{{$item->title}}</h3>
                </div>
                @endforeach

               
            </div>
        </div>
    </section>
@endsection
