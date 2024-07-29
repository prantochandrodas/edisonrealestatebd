@extends('layouts.blogpage')
@section('blog-content')
    <!--inner banner start-->
    <div class="innerBanner Loader">
        <img class="modify-img " data-image-small="{{ asset('newsletter-banners/' . $newsletterBanner->image) }}"
            data-image-large="{{ asset('newsletter-banners/' . $newsletterBanner->image) }}"
            data-image-standard="{{ asset('newsletter-banners/' . $newsletterBanner->image) }}" alt="">
        <!--1366x400-->

        <div class="container">
            <div class="row">
                <h1 class="anim textOver">{{ $newsletterBanner->title }}</h1>
            </div>
        </div>
    </div>

    <!--inner banner end-->


    <section class="blog pb100 pt100">
        <div class="container">
            <div class="row">
                <div class="bloginit anim-parent">

                    @php
                        // Reverse the newsletterPost collection
                        $newsletterPostReversed = $newsletterPost->reverse();
                    @endphp

                    @foreach ($newsletterPostReversed as $index => $item)
                        <div class="col-md-4 blog_single_item">
                            <div id="post-408"
                                class="post-408 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized">
                                <div class="blog_image Loader mb30">
                                    <img class="modify-img"
                                        data-image-small="{{ asset('newsletter-post/' . $item->image) }}"
                                        data-image-large="{{ asset('newsletter-post/' . $item->image) }}"
                                        data-image-standard="{{ asset('newsletter-post/' . $item->image) }}" alt="">
                                </div>
                                <p>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</p>
                                <h5 class="blog-title">
                                    Newsletter {{ $loop->remaining + 1 }}
                                </h5>
                                <div class="clear"></div>
                                <a class="dcBtn mt30" target="_blank"
                                    href="{{ asset('newsletter-post-pdf/' . $item->pdf) }}">
                                    <span>Download Now</span>
                                </a>
                            </div><!-- #post-408 -->
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
