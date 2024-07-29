@extends('layouts.project_details_page')
@section('projectdetails-content')
    <div class="Project-detail-banner">
        <div class="container-fluid p0">
            <div class="row">

                <div class="col-md-6 ">
                    <div class="Project-detail-banner__left">
                        <div class="Project-detail-banner__left__top">
                            <div class="Project-detail-banner__left__top__slider">

                                <!--  top slider-->
                                <div class="top-slider-init MobileLight">
                                    @foreach ($data->images as $item)
                                        <!--  item-->
                                        <div class="Project-detail-banner__left__top__slider__single anim boxOver modify-bg"
                                            data-image-small="{{ asset('project/' . $item->image) }}"
                                            data-image-large="{{ asset('project/' . $item->image) }}"
                                            data-image-standard="{{ asset('project/' . $item->image) }}"
                                            data-src="{{ asset('project/' . $item->image) }}"
                                            style="background-image: url('{{ asset('project/' . $item->image) }}')">
                                            <!-- 698 x 650--> <!-- data-src for mobile light gallery -->
                                        </div>
                                        <!--  item-->
                                    @endforeach
                                </div>
                                <!--  bottom slider-->
                            </div>
                        </div>

                        <div class="Project-detail-banner__left__bottom">
                            <div class="bottom-slider-init">
                                @foreach ($data->images as $item)
                                    <!--  item-->
                                    <div class="Project-detail-banner__left__bottom__single  modify-bg"
                                        data-image-small="{{ asset('project/' . $item->image) }}"
                                        data-image-large="{{ asset('project/' . $item->image) }}"
                                        data-image-standard="{{ asset('project/' . $item->image) }}"
                                        style="background-image: url('{{ asset('project/' . $item->image) }}')">
                                        <!--100x100-->
                                    </div>
                                @endforeach
                                <!-- item-->
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 Project-detail-banner__right scrolls">
                    <div class="Project-detail-banner__right__overview">

                        <ul class="Bredcum">
                            <li><a href="../project">Projects</a></li>
                            <li>
                                <a
                                    href="../projectsbd51.html?category=1&amp;type=%23&amp;location=%23">{{ $data->category->name }}</a>
                            </li>
                        </ul>

                        <h1 class="Title anim textOver">
                            <span><span>{{ $data->name }}</span></span>
                        </h1>
                        <h4 class="anim textOver">
                            <span><span>{{ $data->short_title }}</span></span>
                        </h4>

                        <p class="location anim justFade">
                            <span><img src="../themes/cms/assets/images/static/location.svg" alt=""></span>
                            <span>Block {{ $data->block }}, {{ $data->location->name }}</span>
                        </p>






                        <div class="Specification" style="padding: 0px 0 0 0;">
                            <div class="Specification__inner">
                                <h2 class="Title anim textOver"><span><span>specification</span></span></h2>
                                <table class="table anim justFade">
                                    <tr>
                                        <td> {!! $data->specification !!}</td>

                                    </tr>
                                </table>
                            </div>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#browchure-download"
                                class="dcBtn">
                                <span>
                                    <img src="../themes/cms/assets/images/static/downloads.svg" alt="">
                                    Download Brochure
                                </span>
                            </a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#browchure-auto"
                                id="browchure-auto-btn"></a>
                            <a target="_blank" href="https://drive.google.com/file/d/1NUsaQpJfhEyRh0nK5BKPsHjvtIBa0zyh/view"
                                class="hide " id="brochure_link_download"> Download Brochure</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="clearfix"></div>


    <div class="modal fade careerModal" id="browchure-download" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content container">
                <div class="modal-header">
                    <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>-->
                    <!--                </button>-->
                    <img src="{{asset('frontend/themes/cms/assets/images/static/modal-close.svg')}}" class="modalClose" alt=""
                        data-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body">
                    <div class="content_wrapper_width">
                        <h2 class="Title">Fill Up the Information</h2>
                        <div class="clear">

                        </div>
                        <div class="form_wrapper">




                            <form id="brochure" class="dynamic_form "
                                action="https://edisonrealestatebd.com/site/dynamic_form" method="post" data-pjax="false">
                                <input type="hidden" name="_csrf-frontend"
                                    value="pG-qaZJx3OBCMScX1ZyJwVZ7UokdLreiZMpBFH29OvHvAvsC-SPphC91akWN-da3IB0-sFtNz8wVjzNaL8tStA==">
                                <input type="hidden" id="brochure" class="form-control" name="form_id" value="brochure">



                                <div class="form-message-container success_wrapper hide success_wrapper_brochure">
                                    <div class="form-message-body">
                                        <span class="success_container_brochure"></span>
                                    </div>
                                </div>
                                <div class="form-message-container error_wrapper hide error_wrapper_brochure">
                                    <div class="form-message-body">
                                        <span class="error_container_brochure"></span>
                                    </div>
                                </div>
                                <input type="text" name="Dynamicform[spam_protector]" style="display:none;">
                                <input type="text" id="project_title" style="display:none;" class="form-control"
                                    name="Dynamicform[project_title]" placeholder="">
                                <input type="hidden" id="project_title" class="form-control"
                                    name="Dynamicform[project_title]" value="Edison Hermia">
                                <input type="text" id="project_brochure_link" style="display:none;"
                                    class="form-control" name="Dynamicform[project_brochure_link]" placeholder="">
                                <input type="hidden" id="project_brochure_link" class="form-control"
                                    name="Dynamicform[project_brochure_link]"
                                    value="https://drive.google.com/file/d/1NUsaQpJfhEyRh0nK5BKPsHjvtIBa0zyh/view">
                                <div class="form-group">
                                    <label class="control-label" for="name">Full Name*</label>
                                    <input type="text" id="name" class="form-control" name="Dynamicform[name]">
                                    <div class="hint-block"></div>
                                    <div class="help-block"></div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="email">Email Address*</label>
                                    <input type="text" id="email" class="form-control" name="Dynamicform[email]">
                                    <div class="hint-block"></div>
                                    <div class="help-block"></div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="phone">Phone Number*</label>
                                    <input type="text" id="phone" class="form-control" name="Dynamicform[phone]">
                                    <div class="hint-block"></div>
                                    <div class="help-block"></div>
                                </div>



                                <div class="form-group">
                                    <button type="submit" class=" dynamic_submit_btn dcBtn"><span>Download
                                            Now</span></button>
                                </div>


                            </form>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade careerModal browchure-auto" id="browchure-auto" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content container">
                <div class="modal-header">
                    <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>-->
                    <!--                </button>-->
                    <img src="{{asset('frontend/themes/cms/assets/images/static/modal-close.svg')}}" class="modalClose" alt=""
                        data-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body">
                    <div class="content_wrapper_width">
                        <h2 class="Title">Get Brochure</h2>
                        <div class="clear">

                        </div>
                        <div class="form_wrapper">




                            <form id="brochure" class="dynamic_form "
                                action="https://edisonrealestatebd.com/site/dynamic_form" method="post"
                                data-pjax="false">
                                <input type="hidden" name="_csrf-frontend"
                                    value="pG-qaZJx3OBCMScX1ZyJwVZ7UokdLreiZMpBFH29OvHvAvsC-SPphC91akWN-da3IB0-sFtNz8wVjzNaL8tStA==">
                                <input type="hidden" id="brochure" class="form-control" name="form_id"
                                    value="brochure">



                                <div class="form-message-container success_wrapper hide success_wrapper_brochure">
                                    <div class="form-message-body">
                                        <span class="success_container_brochure"></span>
                                    </div>
                                </div>
                                <div class="form-message-container error_wrapper hide error_wrapper_brochure">
                                    <div class="form-message-body">
                                        <span class="error_container_brochure"></span>
                                    </div>
                                </div>
                                <input type="text" name="Dynamicform[spam_protector]" style="display:none;">
                                <input type="text" id="project_title" style="display:none;" class="form-control"
                                    name="Dynamicform[project_title]" placeholder="">
                                <input type="hidden" id="project_title" class="form-control"
                                    name="Dynamicform[project_title]" value="Edison Hermia">
                                <input type="text" id="project_brochure_link" style="display:none;"
                                    class="form-control" name="Dynamicform[project_brochure_link]" placeholder="">
                                <input type="hidden" id="project_brochure_link" class="form-control"
                                    name="Dynamicform[project_brochure_link]"
                                    value="https://drive.google.com/file/d/1NUsaQpJfhEyRh0nK5BKPsHjvtIBa0zyh/view">
                                <div class="form-group">
                                    <label class="control-label" for="name">Full Name*</label>
                                    <input type="text" id="name" class="form-control" name="Dynamicform[name]">
                                    <div class="hint-block"></div>
                                    <div class="help-block"></div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="email">Email Address*</label>
                                    <input type="text" id="email" class="form-control" name="Dynamicform[email]">
                                    <div class="hint-block"></div>
                                    <div class="help-block"></div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="phone">Phone Number*</label>
                                    <input type="text" id="phone" class="form-control" name="Dynamicform[phone]">
                                    <div class="hint-block"></div>
                                    <div class="help-block"></div>
                                </div>



                                <div class="form-group">
                                    <button type="submit" class=" dynamic_submit_btn dcBtn"><span>Download
                                            Now</span></button>
                                </div>


                            </form>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>





    <!------ Location map start ------>
    <section class="Location_map Location_map_load">
        <div class="container-fluid p0">
            <div class="row">
                <div class="col-md-5 Location_map__address pt100" style="padding-left: 119.5px;">
                    <h2 class="Title anim textOver"><span><span>project <br> location </span></span></h2>
                    <p class="anim justFade">Address: {{ $data->block }} Block, {{ $data->location->name }}</p>

                </div>

                <div class="col-md-7 Location_map__map">
                   
                    <iframe
                        src="{{$data->google_map}}"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    {{-- <div id="map"
                        data-map-pointer="{{ asset('/frontend/themes/cms/assets/images/static/pointer.png') }}"> --}}
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------ Location map start ------>


    <!---------- project list start---------->
    <section class="Projects pt100 pb100 asFeature">
        <div class="container">
            <div class="Projects__title">
                <h2 class="Title anim textOver"><span><span>related projects</span></span></h2>
            </div>

            <div class="Projects-nav">
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
                <div class="Projects__slider-wrap anim boxOver">
                    <div class="ProjectSlider-init">
                        @foreach ($relatedProjects as $item)
                            <div class="Project__slider-wrap__single ">
                                <div class="Project__slider-wrap__single__inner">
                                    <a href="apricus.html"></a>
                                    <div class="Project__slider-wrap__single__bg modify-bg bg-position"
                                        data-image-small="{{asset('project/'.$item->images[0]->image)}}"
                                        data-image-large="{{asset('project/'.$item->images[0]->image)}}"
                                        data-image-standard="{{asset('project/'.$item->images[0]->image)}}"
                                        style="background-image: url('{{asset('project/'.$item->images[0]->image)}}');">

                                    </div>

                                    <!-- 370x600  && mobile > 374x450-->
                                    <div class="Project__slider-wrap__single__inner__content">
                                        <div class="Project__slider-wrap__single__inner__content__slide">
                                            <div class="Project__slider-wrap__single__inner__content__slide__inner">
                                                <h3>Edison Apricus</h3>
                                                <h4>Bashundhara R/A</h4>
                                                <p>
                                                <p>Relish unmatched lifestyle experiences with<a href="amour_edison.html"
                                                        target="_blank"> </a><a href="amour_edison.html"
                                                        target="_blank">Edison</a> Apricus as you devour unprecedented
                                                    quality of facilities. It infuses all elements of opulence that enhances
                                                    your sense of inner peace.<br />
                                                    <br />
                                                    For Apartment Tour-<a href="http://<iframe src="
                                                        https://www.facebook.com/plugins/video.php?height=476&amp;href=https%3A%2F%2Fwww.facebook.com%2Fedisonrealestateltd%2Fvideos%2F944219292869764%2F&amp;show_text=false&amp;width=380&amp;t=0%22%20width=%22380%22%20height=%22476%22%20style=%22border:none;overflow:hidden%22%20scrolling=%22no%22%20frameborder=%220%22%20allowfullscreen=%22true%22%20allow=%22autoplay;%20clipboard-write;%20encrypted-media;%20picture-in-picture;%20web-share%22%20allowFullScreen=%22true%22></iframe>"
                                                        target="_blank"> </a><a href="https://youtu.be/kw0syW4_0m0"
                                                        target="_blank">Click here</a><br />
                                                    <br />
                                                    &nbsp;
                                                </p>
                                                </p>
                                            </div>

                                        </div>

                                        <a href="apricus.html" class="dcBtn"><span>Explore</span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
