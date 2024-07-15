@extends('layouts.projectpage')
@section('project-content')
    <!--inner banner start-->
    <div class="innerBanner Loader">
        <img class="modify-img " data-image-small="{{ asset('project_banner/' . $banner->image) }}"
            data-image-large="{{ asset('project_banner/' . $banner->image) }}"
            data-image-standard="{{ asset('project_banner/' . $banner->image) }}" data-src=""
            src="{{ asset('project_banner/' . $banner->image) }}" alt=""> <!--1366x400-->
        <div class="container">
            <div class="row"></div>
        </div>
    </div>

    <!--inner banner end-->

    <!-------------------T.A.1.0-Search-list-02 start ------------------->
    <section class="Products pt50 Project asProjectList">
        <!--   product short -->
        <div class="container">
            <div class="row">
                <div class="Products__short col-md-12 Select">
                    <form method="get" id="search" data-pjax action="https://edisonrealestatebd.com/projects">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="category">
                                <option value="">All</option>

                                @foreach ($projectCategories as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="type" name="type">
                                <option value="#">Type</option>
                                @foreach ($projectType as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="location" name="location">
                                <option value="#">Location</option>
                                @foreach ($projectLocation as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary search" style="display: none;">search</button>
                    </form>
                </div>

                <div class="clearfix"></div>


            </div>
        </div>


        <!--    project list -->
        <div class="Project-Lists pt100 pb100 ">
            <div class="container">
                <div class="row">
                    <div class="Project__slider-wrap">
                        <div class="ProjectSlider-init">
                            @foreach ($projects as $item)
                                <div class="Project__slider-wrap__single  col-xs-6 anim boxOver col-md-4">
                                    <div class="Project__slider-wrap__single__inner ">
                                        <a href="projects/edison-angelo.html"></a>
                                        <div class="Project__slider-wrap__single__bg modify-bg bg-position"
                                            data-image-small="{{asset('project/'.$item->images[0]->image)}}"
                                            data-image-large="{{asset('project/'.$item->images[0]->image)}}"
                                            data-image-standard="{{asset('project/'.$item->images[0]->image)}}"
                                            style="background-image: url({{asset('project/'.$item->images[0]->image)}});">

                                        </div>

                                        <!-- 370x600  && mobile > 374x450-->
                                        <div class="Project__slider-wrap__single__inner__content">
                                            <div class="Project__slider-wrap__single__inner__content__slide">
                                                <div class="Project__slider-wrap__single__inner__content__slide__inner">
                                                    <h3>{{$item->name}}</h3>
                                                    <h4>{{$item->short_title}}</h4>
                                                    <p>{{$item->overview}}<br />
                                                        <br />
                                                        @if ($item->apartment_tour)
                                                        For Apartment Tour-&nbsp;<a href="{{$item->apartment_tour}}"
                                                            target="_blank">click here</a><br />
                                                        <br />
                                                        @endif
                                                        @if ($item->virtual_experience)
                                                        For Virtual experience -&nbsp;&nbsp;<a
                                                        href="{{$item->virtual_experience}}"
                                                        target="_blank">click here</a>
                                                        @endif
                                                       
                                                    </p>
                                                </div>

                                            </div>

                                            <a href="projects/edison-angelo.html" class="dcBtn"><span>Explore</span></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="loaddata"></div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="caseStudy__loadMore load-btn text-center">
                            <a href="javascript:" data-href="" class="dcBtn loadBtn"><span>Load more</span></a>
                        </div>

                        <div class="pagination-div hide">
                            <ul class="pagination">
                                <li class="prev disabled"><span>&laquo;</span></li>
                                <li class="active"><a href="projects2679.html?page=1" data-page="0">1</a></li>
                                <li class="next"><a href="projects4658.html?page=2" data-page="1">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-------------------T.A.1.0-Search-list-02 end ------------------->
@endsection
