@extends('layouts.frontend')
@section('frontend-content')
    <!------------------fixed sections end --------------->
    <!--inner banner start-->
    <div class="innerBanner Loader">
        <img class="modify-img " data-image-small="{{ asset($banner->image) }}"
            data-image-large="{{ asset('about/about-us-banner/' . $banner->image) }}"
            data-image-standard="{{ asset('about/about-us-banner/' . $banner->image) }}" alt=""> <!--1366x400-->

        <div class="container">
            <div class="row">
                <h1 class="anim textOver"><span><span>About Us</span></span></h1>
            </div>
        </div>
    </div>
    <!--inner banner end-->

    <!------------- about text start------------->
    <section class="AboutText">
        <div class="MissionVision">
            <div class="MissionVision__single pt100 pb100">
                <div class="container">
                    <div class="row Flex">

                        <div class="col-md-6 col-sm-6 MissionVision__single__right ">
                            <h2 class="Title anim textOver">
                                <span><span>{{ $aboutCompanyInformation->title }}</span></span>
                            </h2>
                            <p>{!! $aboutCompanyInformation->long_description !!}</p>
                        </div>

                        <div class="col-md-6 col-sm-6 anim boxOver">
                            <div class="MissionVision__single__left Loader Light">
                                <img class=" modify-img "
                                    data-image-small="{{ asset('about_us/thumbnail/' . $aboutCompanyInformation->thumbnail_image) }}"
                                    data-image-large="{{ asset('about_us/thumbnail/' . $aboutCompanyInformation->thumbnail_image) }}"
                                    data-image-standard="{{ asset('about_us/thumbnail/' . $aboutCompanyInformation->thumbnail_image) }}"
                                    data-src=""
                                    src="{{ asset('about_us/thumbnail/' . $aboutCompanyInformation->thumbnail_image) }}"
                                    alt=""><!-- 570x460 -->
                                <a href="{{ $aboutCompanyInformation->video_url }}">
                                    <span class="Play">
                                        <img class="Play" height="37" width="37"
                                            src="{{ asset('frontend/themes/cms/assets/images/static/play.svg') }}"
                                            alt="">
                                    </span>
                                </a>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------------about text end------------->

    <!-- Modal -->
    <div class="modal fade careerModal" id="whoWeAre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content container">
                <div class="modal-header">
                    <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>-->
                    <!--                </button>-->
                    <img src="{{ asset('frontend/themes/cms/assets/images/static/modal-close.svg') }}" class="modalClose"
                        alt="" data-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body">
                    <h2 class="Title">who <br> we are</h2>

                    <p><strong>EDISON Group</strong></p>

                    <p style="text-align: justify;">EDISON Group is a leading local conglomerate in Bangladesh, known
                        for its commitment to enhancing customers&#39; lives through reliable products and services.
                        Established in 2009, the group has rapidly expanded its portfolio in the technology,
                        communication, power, electronics, real estate, value-added services, e-commerce, appliances,
                        gadget and accessories, and footwear sectors. With a focus on powerful brands and diversified
                        investments, Edison Group is committed to driving innovation and growth in Bangladesh&#39;s
                        dynamic business landscape.<br />
                        &nbsp;</p>

                    <p><br />
                        &nbsp;</p>

                    <p><strong>EDISON Real Estate</strong></p>

                    <p style="text-align: justify;">EDISON Group ventured into the real estate sector in 2015 with a
                        dream team dedicated to merging value and innovation in evolving real estate sector of
                        Bangladesh. We aim to satisfy our customers and be the country&#39;s most trusted and<br />
                        respected real estate brand. Infusing biophilic and elegant design, modern amenities,
                        cutting-edge technologies, best-in-class materials, total quality control, timely execution, and
                        unparalleled services, we try to maximize customers&rsquo; value. The sumptuous amenities of our
                        creations ensure that customers&rsquo; upscaled living standard is not limited to square feet of
                        3/4-bedroom apartments. As we develop our projects in owned land, we offer optimum value for
                        luxury so that life is celebrated to its fullest at the dream homes. Our customer-centric
                        approaches, innovation, and financial strength have made us the largest developer in Bashundhara
                        R/A in less than three years of operation there. This enabled us to expand our horizon across
                        the country and address customers&rsquo; growing demand for improvised residences.</p>

                </div>

            </div>
        </div>
    </div>


    <!--------- mission vision --------->
    <section class="AboutMissionVision pt100 pb100 Loader">
        <img class=" modify-img " data-image-small="{{ asset('frontend/themes/cms/assets/images/static/landowner.svg') }}"
            data-image-large="{{ asset('frontend/themes/cms/assets/images/static/landowner.svg') }}"
            data-image-standard="{{ asset('frontend/themes/cms/assets/images/static/landowner.svg') }}" data-src=""
            src="{{ asset('frontend/themes/cms/assets/images/static/blur.jpg') }}" alt=""> <!-- 1366x700 -->
        <div class="container">
            <div class="row ">
                <div class="Flex">
                    <div class="col-sm-6">
                        <div class="AboutMissionVision__left AboutMissionVision-text anim-parent">
                            <h2 class="subTitle anim textOver">
                                <span><span>{{ $purpose->title }}</span></span>
                            </h2>
                            <p class="anim textOver">
                                <span><span>
                                        <p>{{ $purpose->description }}</p>
                                        <div id="gtx-trans" style="position: absolute; left: 548px; top: 38px;">
                                            <div class="gtx-trans-icon">&nbsp;</div>
                                        </div>
                                    </span></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="AboutMissionVision__left AboutMissionVision-text anim-parent">
                            <h2 class="subTitle anim textOver">
                                <span><span>{{ $vision->title }}</span></span>
                            </h2>
                            <p class="anim textOver">
                                <span><span>
                                        <p>{{ $vision->description }}</p>
                                    </span></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- values -->
            <div class="row AboutMissionVision__values">
                <div class="col-md-12">
                    <div class="AboutMissionVision__values__wrap">
                        <h4 class="subTitle anim textOver">
                            <span><span>OUR VALUES</span></span>
                        </h4>
                        <div class="AboutMissionVision__values__wrap__inner">
                            @foreach ($ourvalues as $item)
                                <div class="AboutMissionVision__values__wrap__inner__single">
                                    <h4 class="anim textOver">
                                        <span><span>{{ $item->value }}</span></span>
                                    </h4>
                                    <p class="anim justFade"></p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!--------- mission vision --------->


    <!------------- about text start------------->
    <section class="ChairmanMessage">
        <div class="MissionVision">
            <div class="MissionVision__single pt100 pb100">
                <div class="container">
                    <div class="row Flex">

                        <div class="col-md-6 col-sm-6 MissionVision__single__right anim-parent">
                            <h4 class="subTitle anim textOver">
                                <span><span>{{ $chairman->title }}</span></span>
                            </h4>
                            <h2 class="Title anim textOver">
                                <span><span>{{ $chairman->name }}</span></span>
                            </h2>
                            <p>{!! $chairman->company_information !!}</p>

                            <a href="javascript:" class="dcBtn hidden anim justFade"><span>Learn More</span></a>
                        </div>

                        <div class="col-md-6 col-sm-6 col-md-5 col-md-offset-1 pl0  anim boxOver">

                            <div class="InMobile">
                                <h4 class="subTitle anim textOver">
                                    <span><span>Chairman</span></span>
                                </h4>
                                <h2 class="Title anim textOver">
                                    <span><span>Md. Imranul Kabir</span></span>
                                </h2>
                            </div>

                            <div class="MissionVision__single__left Loader">
                                <img class=" modify-img "
                                    data-image-small="{{ asset('about/chairman-image/' . $chairman->chairman_image) }}"
                                    data-image-large="{{ asset('about/chairman-image/' . $chairman->chairman_image) }}"
                                    data-image-standard="{{ asset('about/chairman-image/' . $chairman->chairman_image) }}"
                                    data-src="" src="{{ asset('about/chairman-image/' . $chairman->chairman_image) }}"
                                    alt=""><!-- 470x500 -->

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------------about text end------------->

    <!--chariman message text -->
    <section class="ChairmanMessageText">
        <div class="container-fluid p0">
            <div class="row ">
                <div class="Flex">
                    <div class="col-md-5 ChairmanMessageText__left Loader anim boxOver">
                        <img class=" modify-img"
                            data-image-small="{{ asset('frontend/themes/cms/assets/images/static/ch-bg.png') }}"
                            data-image-large="{{ asset('frontend/themes/cms/assets/images/static/ch-bg.png') }}"
                            data-image-standard="{{ asset('frontend/themes/cms/assets/images/static/ch-bg.png') }}"
                            data-src="" src="{{ asset('frontend/themes/cms/assets/images/static/blur.jpg') }}"
                            alt=""> <!-- 570x550 -->

                        <div class="ChairmanMessageText__left__logo">
                            <img class=" modify-img no-pos"
                                data-image-small="{{ asset('about/institute-logo/' . $chairman->institute_logo) }}"
                                data-image-large="{{ asset('about/institute-logo/' . $chairman->institute_logo) }}"
                                data-image-standard="{{ asset('about/institute-logo/' . $chairman->institute_logo) }}"
                                data-src="" src="{{ asset('about/institute-logo/' . $chairman->institute_logo) }}"
                                alt="">
                            <!-- 570x550 -->
                        </div>
                    </div>


                    <div class="col-md-7 ChairmanMessageText__right">
                        <p style="text-align: justify;">{!! $chairman->chairman_information !!}</p>

                        <p style="text-align: justify;">Reference: <a
                                href="{{ $chairman->reference }}">https://mittalsouthasiainstitute.harvard.edu/bangladesh-rising-speakers/</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!------------ timeline start ------------>
    <section class="timeline pt100 pb100">
        <div class="timeline__slider-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="Title mb30">Timeline</h3>
                    </div>
                </div>
            </div>
            <div class="slider-for">
                @foreach ($timelines as $item)
                    <div class="timeline__slider-bg__item">
                        <div class="timeline__slider-bg__item__bg-zoom"
                            style="background: url({{ asset('about/timeline/' . $item->image) }})"></div>
                        <!--1366x650-->
                        <div class="timeline__slider-bg__item__content">
                            <div class="timeline__slider-bg__item__content__loader">
                                <img src="{{ asset('frontend/themes/cms/assets/images/static/loader.gif') }}"
                                    alt="">
                            </div>
                            <div class="timeline__slider-bg__item__content__zoom triangle">
                                <h3>{{ $item->year }}</h3>
                                <h1>{{ $item->title }}</h1>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>


        <div class="timeline__nav">
            <div class="slider-nav">
                @foreach ($timelines as $item)
                    <div class="full-nav-wrapper">
                        <div class="single-nav-wrapper">
                            <div class="single-nav">
                                <img src='{{ asset('about/timeline/' . $item->image) }}' alt="">
                            </div>
                            <div class="single-counter">{{ $item->year }}</div>
                        </div>
                        <div class="single-title">{{ $item->year }}</div>
                    </div>
                @endforeach
            </div>
            <div class="timeline__nav__horizontal-line"></div>
        </div>

    </section>
    <!------------ timeline end ------------>

    <!----------home project list start---------->
    <section class="Project pt80 pb80 asTeam">
        <div class="container">
            <div class="Project__title anim-parent">
                <h4 class="subTitle anim textOver">
                    <span><span>Team</span></span>
                </h4>
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
                                    style="background-image: url('{{ asset('about/team/' . $item->image) }}');">
                                    <!-- 370x400-->
                                    <div class="Project__slider-wrap__single__inner__content">
                                        <div class="Project__slider-wrap__single__inner__content__slide">
                                            <h3>{{ $item->name }}</h3>
                                            <p>{{ $item->designation }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="container">
            <a href="about-us/team.html" class="dcBtn anim justFade anim-active"><span>More about our team</span></a>

        </div>
    </section>
    <!----------home project list end---------->

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution="install_email" attribution_version="biz_inbox" page_id="329218885142661">
    </div>

  
@endsection
