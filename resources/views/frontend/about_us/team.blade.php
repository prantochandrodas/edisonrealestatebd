@extends('layouts.aboutus')
@section('aboutus-content')
    <!--inner banner start-->
    <div class="innerBanner Loader">
        <img class="modify-img "
            data-image-small="{{ asset('team-banner/'.$banner->image) }}"
            data-image-large="{{ asset('team-banner/'.$banner->image) }}"
            data-image-standard="{{ asset('team-banner/'.$banner->image) }}"
            data-src="" src="{{ asset('frontend/themes/cms/assets/images/static/blur.jpg') }}" alt="">
        <!--1366x400-->

        <div class="container">
            <div class="row">
                <h1 class="anim textOver"><span><span>{{$banner->title}}</span></span></h1>
            </div>
        </div>
    </div>
    <!--inner banner end-->


    <section class="Project pt80 pb80 asTeam ">
        <div class="container">
            <div class="Project__title anim-parent">
                <h2 class="Title anim textOver">
                    <span><span>Management Team</span></span>
                </h2>
            </div>

            <div class="Project-nav">
                <ul>
                    <li class="goLeft"><img src="{{ asset('frontend/themes/cms/assets/images/static/test_prev.svg') }}"
                            height="51" width="51" alt=""></li>
                    <li class="goRight"><img src="{{ asset('frontend/themes/cms/assets/images/static/test_next.svg') }}"
                            height="51" width="51" alt=""></li>
                </ul>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="Project__slider-wrap anim boxOver">
                    <div class="ProjectSlider-init">
                        @foreach ($teams as $item)
                            <div class="Project__slider-wrap__single ">
                                <div class="Project__slider-wrap__single__inner  modify-bg"
                                    data-image-small="{{ asset('about/team/' . $item->image) }}"
                                    data-image-large="{{ asset('about/team/' . $item->image) }}"
                                    data-image-standard="{{ asset('about/team/' . $item->image) }}"
                                    style="background-image: url({{ asset('about/team/' . $item->image) }});">
                                    <a href="javascript:void(0)" data-toggle="modal"
                                        data-target="#{{ $item->id }}"></a>

                                    <!-- 370x400-->
                                    <div class="Project__slider-wrap__single__inner__content">
                                        <div class="Project__slider-wrap__single__inner__content__slide">
                                            <h3>{{ $item->name }}</h3>
                                            <p>{{ $item->designation }}</p>
                                            <p class="explore_message">Explore Message</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>


        <div class="container ">
            <div class="Project__title anim-parent mt50">
                <h2 class="Title anim textOver">
                    <span><span>Dream Team</span></span>
                </h2>
            </div>
            <div class="clearfix"></div>


            <div class="row">
                <div class="image_wrapper Loader">
                    <img src="#" class="modify-img" style="position:relative;"
                        data-image-small="{{asset('about/dreamTeam/'.$dreamTeam->image)}}"
                        data-image-large="{{asset('about/dreamTeam/'.$dreamTeam->image)}}"
                        data-image-standard="{{asset('about/dreamTeam/'.$dreamTeam->image)}}"
                        data-src="" src="{{asset('about/dreamTeam/'.$dreamTeam->image)}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="Project__slider-wrap asTeamList">
                    <div class="anim-parent">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($teams as $item)
        <div class="modal fade careerModal asTeamMemberModal" id="{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content container">
                    <div class="modal-header">
                        <h2 class="Title">Management Board</h2>
                        <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>-->
                        <!--                </button>-->
                        <img src="{{ asset('frontend/themes/cms/assets/images/static/modal-close.svg') }}"
                            class="modalClose" alt="" data-dismiss="modal" aria-label="Close">
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-8 remembering-modal__dialog__content__body__text-wapper">
                                <h3 class="Title">{{ $item->name }}</h3>
                                <h5 class="modal-designation">{{ $item->designation }}</h5>

                                <p>{!!$item->about!!}</p>

                            </div>
                            <div class="col-sm-4 remembering-modal__dialog__content__body__image-wapper">
                                <div class="modal-image loader" data-dot-color="#3c6696">
                                    <img class="modify-img"
                                        data-image-small="{{ asset('about/team/' . $item->image) }}"
                                        data-image-large="{{ asset('about/team/' . $item->image) }}"
                                        data-image-standard="{{ asset('about/team/' . $item->image) }}"
                                        data-src="" src="{{ asset('about/team/' . $item->image) }}" alt="">
                                </div><!-- 500 x 600 -->
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection
