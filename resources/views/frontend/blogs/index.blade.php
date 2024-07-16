@extends('layouts.blogpage')
@section('blog-content')
    <!--inner banner start-->
    <div class="innerBanner Loader">
        <img class="modify-img " data-image-small="{{ asset('blog/blog-banner/' . $banner->image) }}"
            data-image-large="{{ asset('blog/blog-banner/' . $banner->image) }}"
            data-image-standard="{{ asset('blog/blog-banner/' . $banner->image) }}" alt="">
        <!--1366x400-->

        <div class="container">
            <div class="row">
                <h1 class="anim textOver">{{ $banner->title }}</h1>
            </div>
        </div>
    </div>

    <!--inner banner end-->


    <section class="blog pb100 pt100">
        <div class="container">
            <div class="row">
                <div class="bloginit anim-parent">
                    @foreach ($posts as $item)
                        <div class="col-md-4   blog_single_item">

                            <div id="post-615"
                                class="post-615 post type-post status-publish format-standard has-post-thumbnail hentry category-blog">



                                <div class="blog_image Loader mb30">
                                    <img class="modify-img "
                                        data-image-small="{{asset('blog/blog-post/'.$item->image)}}"
                                        data-image-large="{{asset('blog/blog-post/'.$item->image)}}"
                                        data-image-standard="{{asset('blog/blog-post/'.$item->image)}}"
                                        alt="">
                                </div>


                                <p>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</p>


                                <h5 class="blog-title">{{$item->title}}</h5>


                                <div class="clear"></div>


                                <a class="dcBtn mt30" href="{{route('blogs.details',['name'=>$item->slug])}}"><span>Explore</span></a>
                            </div><!-- #post-615 -->
                        </div>
                    @endforeach



                    <div class="clear"></div>

                    <div class="col-md-12 text-center mt30">
                        <span aria-current="page" class="page-numbers current">1</span>
                        <a class="page-numbers" href="page/2/index.html">2</a>
                        <a class="page-numbers" href="page/3/index.html">3</a>
                        <a class="next page-numbers" href="page/2/index.html">Next &raquo;</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
