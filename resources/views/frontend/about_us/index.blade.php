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
                                <span><span>{{$chairman->title}}</span></span>
                            </h4>
                            <h2 class="Title anim textOver">
                                <span><span>{{$chairman->name}}</span></span>
                            </h2>
                            <p>{!!$chairman->company_information!!}</p>

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
                                    data-image-small="/edisonrealestatebd.com/themes/cms/assets/images/static/book_demo_man.webp"
                                    data-image-large="/edisonrealestatebd.com/themes/cms/assets/images/static/book_demo_man.webp"
                                    data-image-standard="/edisonrealestatebd.com/themes/cms/assets/images/static/book_demo_man.webp"
                                    data-src="" src="themes/cms/assets/images/static/blur.jpg"
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
                        <img class=" modify-img" data-image-small="themes/cms/assets/images/static/ch-bg.png"
                            data-image-large="themes/cms/assets/images/static/ch-bg.png"
                            data-image-standard="themes/cms/assets/images/static/ch-bg.png" data-src=""
                            src="themes/cms/assets/images/static/blur.jpg" alt=""> <!-- 570x550 -->

                        <div class="ChairmanMessageText__left__logo">
                            <img class=" modify-img no-pos"
                                data-image-small="/edisonrealestatebd.com/themes/cms/assets/images/static/Chicago-University-Logo.png"
                                data-image-large="/edisonrealestatebd.com/themes/cms/assets/images/static/Chicago-University-Logo.png"
                                data-image-standard="/edisonrealestatebd.com/themes/cms/assets/images/static/Chicago-University-Logo.png"
                                data-src="" src="themes/cms/assets/images/static/blur.jpg" alt="">
                            <!-- 570x550 -->
                        </div>
                    </div>


                    <div class="col-md-7 ChairmanMessageText__right">
                        <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                            mollitia nemo neque dolores quibusdam cumque quis fuga explicabo unde esse.</p>

                        <p style="text-align: justify;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo
                            corporis atque totam tempore voluptatem ex illum cum molestiae nihil soluta! Animi in
                            necessitatibus tempora quia laudantium. Id unde molestias, quas doloribus necessitatibus
                            laborum animi asperiores dolor pariatur esse vero tenetur delectus veniam? Ad quos
                            voluptatum in esse totam odit nisi ipsam nam culpa voluptas dolor minima, numquam asperiores
                            deserunt ex, quis reprehenderit doloribus, veniam vitae necessitatibus. Rerum odio corporis
                            libero.</p>

                        <!-- <p style="text-align: justify;">Reference: <a
                                                href="https://mittalsouthasiainstitute.harvard.edu/bangladesh-rising-speakers/">https://mittalsouthasiainstitute.harvard.edu/bangladesh-rising-speakers/</a>
                                        </p>
                                    -->
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
                <div class="timeline__slider-bg__item">
                    <div class="timeline__slider-bg__item__bg-zoom"
                        style="background: url('admin/uploads/page/timeline/1920x914/1614574959YpZj7_l.jpg')"></div>
                    <!--1366x650-->
                    <div class="timeline__slider-bg__item__content">
                        <div class="timeline__slider-bg__item__content__loader">
                            <img src="themes/cms/assets/images/static/loader.gif" alt="">
                        </div>
                        <div class="timeline__slider-bg__item__content__zoom triangle">
                            <h3>2025</h3>
                            <h1>Lorem ipsum dolor sit amet.</h1>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam impedit facilis perferendis
                                consequatur, fugiat enim.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline__slider-bg__item">
                    <div class="timeline__slider-bg__item__bg-zoom"
                        style="background: url('admin/uploads/page/timeline/1920x914/1637674556rvDtv_l.jpg')"></div>
                    <!--1366x650-->
                    <div class="timeline__slider-bg__item__content">
                        <div class="timeline__slider-bg__item__content__loader">
                            <img src="themes/cms/assets/images/static/loader.gif" alt="">
                        </div>
                        <div class="timeline__slider-bg__item__content__zoom triangle">
                            <h3>2025</h3>
                            <h1>lorem ipsum</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos pariatur, aperiam vitae possimus
                                voluptate nostrum cupiditate totam voluptatem eum recusandae.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline__slider-bg__item">
                    <div class="timeline__slider-bg__item__bg-zoom"
                        style="background: url('admin/uploads/page/timeline/1920x914/1637746387DPJvY_l.jpg')"></div>
                    <!--1366x650-->
                    <div class="timeline__slider-bg__item__content">
                        <div class="timeline__slider-bg__item__content__loader">
                            <img src="themes/cms/assets/images/static/loader.gif" alt="">
                        </div>
                        <div class="timeline__slider-bg__item__content__zoom triangle">
                            <h3>2024</h3>
                            <h1>Lorem ipsum</h1>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline__slider-bg__item">
                    <div class="timeline__slider-bg__item__bg-zoom"
                        style="background: url('admin/uploads/page/timeline/1920x914/1637582137Rbqik_l.jpg')"></div>
                    <!--1366x650-->
                    <div class="timeline__slider-bg__item__content">
                        <div class="timeline__slider-bg__item__content__loader">
                            <img src="themes/cms/assets/images/static/loader.gif" alt="">
                        </div>
                        <div class="timeline__slider-bg__item__content__zoom triangle">
                            <h3>2023</h3>
                            <h1>Lorem ipsum</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt accusamus repudiandae
                                architecto commodi illo non officia magni ducimus quas quos.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline__slider-bg__item">
                    <div class="timeline__slider-bg__item__bg-zoom"
                        style="background: url('admin/uploads/page/timeline/1920x914/1637746566EI63A_l.jpg')"></div>
                    <!--1366x650-->
                    <div class="timeline__slider-bg__item__content">
                        <div class="timeline__slider-bg__item__content__loader">
                            <img src="themes/cms/assets/images/static/loader.gif" alt="">
                        </div>
                        <div class="timeline__slider-bg__item__content__zoom triangle">
                            <h3>2022</h3>
                            <h1>Lorem ipsum dolor sit amet.</h1>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem amet dolore in odit
                                temporibus perspiciatis!</p>
                        </div>
                    </div>
                </div>
                <div class="timeline__slider-bg__item">
                    <div class="timeline__slider-bg__item__bg-zoom"
                        style="background: url('admin/uploads/page/timeline/1920x914/1637746738BvHy0_l.jpg')"></div>
                    <!--1366x650-->
                    <div class="timeline__slider-bg__item__content">
                        <div class="timeline__slider-bg__item__content__loader">
                            <img src="themes/cms/assets/images/static/loader.gif" alt="">
                        </div>
                        <div class="timeline__slider-bg__item__content__zoom triangle">
                            <h3>2022</h3>
                            <h1>lorem ipsum</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea adipisci corporis sunt non vero,
                                dolores quisquam quos praesentium minima mollitia.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline__slider-bg__item">
                    <div class="timeline__slider-bg__item__bg-zoom"
                        style="background: url('admin/uploads/page/timeline/1920x914/1613286431Xo7Sf_l.jpg')"></div>
                    <!--1366x650-->
                    <div class="timeline__slider-bg__item__content">
                        <div class="timeline__slider-bg__item__content__loader">
                            <img src="themes/cms/assets/images/static/loader.gif" alt="">
                        </div>
                        <div class="timeline__slider-bg__item__content__zoom triangle">
                            <h3>2022</h3>
                            <h1>Lorem ipsum dolor sit amet.</h1>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum, enim.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline__slider-bg__item">
                    <div class="timeline__slider-bg__item__bg-zoom"
                        style="background: url('admin/uploads/page/timeline/1920x914/1613287125wWoGH_l.jpg')"></div>
                    <!--1366x650-->
                    <div class="timeline__slider-bg__item__content">
                        <div class="timeline__slider-bg__item__content__loader">
                            <img src="themes/cms/assets/images/static/loader.gif" alt="">
                        </div>
                        <div class="timeline__slider-bg__item__content__zoom triangle">
                            <h3>2022</h3>
                            <h1>Lorem ipsum dolor sit amet.</h1>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo error nihil repellendus odit
                                non asperiores!</p>
                        </div>
                    </div>
                </div>
                <div class="timeline__slider-bg__item">
                    <div class="timeline__slider-bg__item__bg-zoom"
                        style="background: url('admin/uploads/page/timeline/1920x914/16132869089F2Oo_l.jpg')"></div>
                    <!--1366x650-->
                    <div class="timeline__slider-bg__item__content">
                        <div class="timeline__slider-bg__item__content__loader">
                            <img src="themes/cms/assets/images/static/loader.gif" alt="">
                        </div>
                        <div class="timeline__slider-bg__item__content__zoom triangle">
                            <h3>2021</h3>
                            <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h1>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam, delectus?</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="timeline__nav">
            <div class="slider-nav">
                <div class="full-nav-wrapper">
                    <div class="single-nav-wrapper">
                        <div class="single-nav">
                            <img src='admin/uploads/page/timeline/1920x914/1614574959YpZj7_s.jpg' alt="">
                        </div>
                        <div class="single-counter">2025</div>
                    </div>
                    <div class="single-title">2025</div>
                </div>
                <div class="full-nav-wrapper">
                    <div class="single-nav-wrapper">
                        <div class="single-nav">
                            <img src='admin/uploads/page/timeline/1920x914/1637674556rvDtv_s.jpg' alt="">
                        </div>
                        <div class="single-counter">2025</div>
                    </div>
                    <div class="single-title">2025</div>
                </div>
                <div class="full-nav-wrapper">
                    <div class="single-nav-wrapper">
                        <div class="single-nav">
                            <img src='admin/uploads/page/timeline/1920x914/1637746387DPJvY_s.jpg' alt="">
                        </div>
                        <div class="single-counter">2024</div>
                    </div>
                    <div class="single-title">2024</div>
                </div>
                <div class="full-nav-wrapper">
                    <div class="single-nav-wrapper">
                        <div class="single-nav">
                            <img src='admin/uploads/page/timeline/1920x914/1637582137Rbqik_s.jpg' alt="">
                        </div>
                        <div class="single-counter">2023</div>
                    </div>
                    <div class="single-title">2023</div>
                </div>
                <div class="full-nav-wrapper">
                    <div class="single-nav-wrapper">
                        <div class="single-nav">
                            <img src='admin/uploads/page/timeline/1920x914/1637746566EI63A_s.jpg' alt="">
                        </div>
                        <div class="single-counter">2022</div>
                    </div>
                    <div class="single-title">2022</div>
                </div>
                <div class="full-nav-wrapper">
                    <div class="single-nav-wrapper">
                        <div class="single-nav">
                            <img src='admin/uploads/page/timeline/1920x914/1637746738BvHy0_s.jpg' alt="">
                        </div>
                        <div class="single-counter">2022</div>
                    </div>
                    <div class="single-title">2022</div>
                </div>
                <div class="full-nav-wrapper">
                    <div class="single-nav-wrapper">
                        <div class="single-nav">
                            <img src='admin/uploads/page/timeline/1920x914/1613286431Xo7Sf_s.jpg' alt="">
                        </div>
                        <div class="single-counter">2022</div>
                    </div>
                    <div class="single-title">2022</div>
                </div>
                <div class="full-nav-wrapper">
                    <div class="single-nav-wrapper">
                        <div class="single-nav">
                            <img src='admin/uploads/page/timeline/1920x914/1613287125wWoGH_s.jpg' alt="">
                        </div>
                        <div class="single-counter">2022</div>
                    </div>
                    <div class="single-title">2022</div>
                </div>
                <div class="full-nav-wrapper">
                    <div class="single-nav-wrapper">
                        <div class="single-nav">
                            <img src='admin/uploads/page/timeline/1920x914/16132869089F2Oo_s.jpg' alt="">
                        </div>
                        <div class="single-counter">2021</div>
                    </div>
                    <div class="single-title">2021</div>
                </div>

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
                    <li class="goLeft"><img src="themes/cms/assets/images/static/test_prev.svg" height="51"
                            width="51" alt=""></li>
                    <li class="goRight"><img src="themes/cms/assets/images/static/test_next.svg" height="51"
                            width="51" alt=""></li>
                </ul>
            </div>

        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="Project__slider-wrap anim boxOver">
                    <div class="ProjectSlider-init">
                        <div class="Project__slider-wrap__single ">
                            <div class="Project__slider-wrap__single__inner  modify-bg"
                                data-image-small="/edisonrealestatebd.com/themes/cms/assets/images/static/book_demo_man.webp"
                                data-image-large="/edisonrealestatebd.com/themes/cms/assets/images/static/book_demo_man.webp"
                                data-image-standard="/edisonrealestatebd.com/themes/cms/assets/images/static/book_demo_man.webp"
                                style="background-image: url('themes/cms/assets/images/static/blur.jpg');">
                                <!-- 370x400-->
                                <div class="Project__slider-wrap__single__inner__content">
                                    <div class="Project__slider-wrap__single__inner__content__slide">
                                        <h3>MD. IMRANUL KABIR</h3>
                                        <p>Chairman & CEO</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="Project__slider-wrap__single ">
                            <div class="Project__slider-wrap__single__inner  modify-bg"
                                data-image-small="/edisonrealestatebd.com/themes/cms/assets/images/static/person11.jpg"
                                data-image-large="/edisonrealestatebd.com/themes/cms/assets/images/static/person11.jpg"
                                data-image-standard="/edisonrealestatebd.com/themes/cms/assets/images/static/person11.jpg"
                                style="background-image: url('themes/cms/assets/images/static/blur.jpg');">
                                <!-- 370x400-->
                                <div class="Project__slider-wrap__single__inner__content">
                                    <div class="Project__slider-wrap__single__inner__content__slide">
                                        <h3>Md Karim</h3>
                                        <p>Director </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="Project__slider-wrap__single ">
                            <div class="Project__slider-wrap__single__inner  modify-bg"
                                data-image-small="/edisonrealestatebd.com/themes/cms/assets/images/static/person13.jpg"
                                data-image-large="/edisonrealestatebd.com/themes/cms/assets/images/static/person13.jpg"
                                data-image-standard="/edisonrealestatebd.com/themes/cms/assets/images/static/person13.jpg"
                                style="background-image: url('themes/cms/assets/images/static/blur.jpg');">
                                <!-- 370x400-->
                                <div class="Project__slider-wrap__single__inner__content">
                                    <div class="Project__slider-wrap__single__inner__content__slide">
                                        <h3>Rahim Khan</h3>
                                        <p>Additional Director</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="Project__slider-wrap__single ">
                            <div class="Project__slider-wrap__single__inner  modify-bg"
                                data-image-small="/edisonrealestatebd.com/themes/cms/assets/images/static/person14.jpg"
                                data-image-large="/edisonrealestatebd.com/themes/cms/assets/images/static/person14.jpg"
                                data-image-standard="/edisonrealestatebd.com/themes/cms/assets/images/static/person14.jpg"
                                style="background-image: url('themes/cms/assets/images/static/blur.jpg');">
                                <!-- 370x400-->
                                <div class="Project__slider-wrap__single__inner__content">
                                    <div class="Project__slider-wrap__single__inner__content__slide">
                                        <h3>Nabila</h3>
                                        <p>Assistant Director</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="Project__slider-wrap__single ">
                            <div class="Project__slider-wrap__single__inner  modify-bg"
                                data-image-small="/edisonrealestatebd.com/themes/cms/assets/images/static/person15.jpg"
                                data-image-large="/edisonrealestatebd.com/themes/cms/assets/images/static/person15.jpg"
                                data-image-standard="admin/uploads/page/team/555x600/1684304569D1VVD_m.jpg"
                                style="background-image: url('themes/cms/assets/images/static/blur.jpg');">
                                <!-- 370x400-->
                                <div class="Project__slider-wrap__single__inner__content">
                                    <div class="Project__slider-wrap__single__inner__content__slide">
                                        <h3>Riazul Islam</h3>
                                        <p>Additional Director </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="Project__slider-wrap__single ">
                            <div class="Project__slider-wrap__single__inner  modify-bg"
                                data-image-small="/edisonrealestatebd.com/themes/cms/assets/images/static/person16.jpg"
                                data-image-large="/edisonrealestatebd.com/themes/cms/assets/images/static/person16.jpg"
                                data-image-standard="admin/uploads/page/team/555x600/1693299084AX773_m.jpg"
                                style="background-image: url('themes/cms/assets/images/static/blur.jpg');">
                                <!-- 370x400-->
                                <div class="Project__slider-wrap__single__inner__content">
                                    <div class="Project__slider-wrap__single__inner__content__slide">
                                        <h3>Sariful Islam</h3>
                                        <p>Assistant Director</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="Project__slider-wrap__single ">
                            <div class="Project__slider-wrap__single__inner  modify-bg"
                                data-image-small="/edisonrealestatebd.com/themes/cms/assets/images/static/person17.jpg"
                                data-image-large="/edisonrealestatebd.com/themes/cms/assets/images/static/person17.jpg"
                                data-image-standard="/edisonrealestatebd.com/themes/cms/assets/images/static/person17.jpg"
                                style="background-image: url('themes/cms/assets/images/static/blur.jpg');">
                                <!-- 370x400-->
                                <div class="Project__slider-wrap__single__inner__content">
                                    <div class="Project__slider-wrap__single__inner__content__slide">
                                        <h3>Shakil Khan</h3>
                                        <p>Advisor</p>
                                    </div>

                                </div>
                            </div>
                        </div>
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

    <!------------footer start ------------>


    <section class="Footer pt100 pb100 Loader">
        <img class=" modify-img " data-image-small="themes/cms/assets/images/static/footer.jpg"
            data-image-large="themes/cms/assets/images/static/footer.jpg"
            data-image-standard="themes/cms/assets/images/static/footer.jpg" data-src=""
            src="themes/cms/assets/images/static/blur.jpg" alt="">1366x550
        <div class="container ">
            <div class="row">
                <div class="col-md-5 Footer__top-left">
                    <img src="themes/cms/assets/images/static/logo-white.png" alt="">
                    <!--<p>HOTLINE: <a href="tel:16760">16760</a></p> -->
                    <p>HOTLINE: <a href="tel:01310817493" target="_blank">01310817493</a> </p>
                    <p>EMAIL: <a href="mailto:info@putulproperties.com">info@putulproperties.com</a></p>
                </div>

                <div class="col-md-7 Footer__top-right">
                    <!-- <img class="logo_rehab" src="themes/cms/assets/images/static/rehab.jpg" alt=""> -->
                </div>
            </div>

            <div class="clearfix"></div>


            <div class="row">
                <div class="Footer__social col-md-12">
                    <ul>
                        <li>
                            <a target="_blank" href=""
                                style="background-image: url('themes/cms/assets/images/static/social_icons.svg')"></a>
                        </li>
                        <li>
                            <a target="_blank" href=""
                                style="background-image: url('themes/cms/assets/images/static/social_icons.svg')"></a>
                        </li>
                        <li>
                            <a target="_blank" href=""
                                style="background-image: url('themes/cms/assets/images/static/social_icons.svg')"></a>
                        </li>
                        <li>
                            <a target="_blank" href=""
                                style="background-image: url('themes/cms/assets/images/static/social_icons.svg')"></a>
                        </li>

                    </ul>

                </div>

                <div class="Footer__copyright col-md-12">
                    <p>© 2024 Putul Properties Limited. All Rights Reserved. <a href="https://www.stitbd.com/">Designed
                            &amp; Developed by STITBD</a></p>
                </div>

            </div>

        </div>
    </section>
@endsection
