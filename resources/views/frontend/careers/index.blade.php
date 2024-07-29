@extends('layouts.career')
@section('career-content')
    <!--inner banner start-->
    <div class="innerBanner Loader">
        <img class="modify-img " data-image-small="{{ asset('career-banners/' . $banner->image) }}"
            data-image-large="{{ asset('career-banners/' . $banner->image) }}"
            data-image-standard="{{ asset('career-banners/' . $banner->image) }}" alt=""> <!--1366x400-->

        <div class="container">
            <div class="row">
                <h1 class="anim textOver"><span><span>{{ $banner->title }}</span></span></h1>
            </div>
        </div>
    </div>
    <!--inner banner end-->



    <!-- ----- product overview start  ------->
    <section class="ProductOverview pt100 pb100 asCareerText">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h2 class="Title anim textOver"><span><span>{{ $description->title }}</span></span></h2>
                    <p style="text-align: justify;">{!! $description->description !!}</p>
                    <gdiv></gdiv>
                </div>
            </div>
        </div>
    </section>
    <!-- ----- product overview end ------->


    <!------career section ------>
    <section class="CareerPost pt100 pb100 Loader">
        <img class=" modify-img " data-image-small="{{ asset('frontend/themes/cms/assets/images/static/landowner.svg') }}"
            data-image-large="{{ asset('frontend/themes/cms/assets/images/static/landowner.svg') }}"
            data-image-standard="{{ asset('frontend/themes/cms/assets/images/static/landowner.svg') }}" data-src=""
            src="{{ asset('frontend/themes/cms/assets/images/static/blur.jpg') }}" alt=""> <!-- 1366x700 -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="Title anim textOver"><span><span>Recent jobs</span></span></h2>
                </div>
                <div class="CareerPost__wrap anim-parent">
                        @foreach ($jobpost as $item)
                        <div class="col-md-4">
                            <div class="CareerPost__wrap__single anim boxOver">
                                <h4>{{ $item->title }}</h4>
                                <p>Vacancy: {{ $item->vacancy }}</p>
                                <p>Employment Status: {{ $item->employment_status }}</p>
                                <p>Experience: {{ $item->experience }} </p>
                                <a href="javascript:" data-toggle="modal" data-target="#deputy-manager_structural-engineer_design--development_{{ $item->id }}"
                                    class="dcBtn"><span>View Details</span></a>

                            </div>
                        </div>
                        @endforeach
                    </div>

            </div>
        </div>
    </section>
    <!------career section end ------>
    <!-- Modal -->
    @foreach ($jobpost as $item)
        <div class="modal fade careerModal" id="deputy-manager_structural-engineer_design--development_{{$item->id }}" tabindex="-1"
            role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content container">
                    <div class="modal-header">
                        <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>-->
                        <!--                </button>-->
                        <img src="{{asset('/frontend/themes/cms/assets/images/static/modal-close.svg')}}" class="modalClose" alt=""
                            data-dismiss="modal" aria-label="Close">
                    </div>
                    <div class="modal-body">
                        <h2 class="Title">{{$item->title}}</h2>

                        <strong>Job Title:</strong> {{$item->title}}<br />
                        <br />
                        {!!$item->description!!}
                        <a href="javascript:" job-position="Deputy Manager (Structural Engineer), Design & Development"
                            class="dcBtn applyBtn"> <span>Apply Now</span></a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach



    <!-------------form section start ------------->
    <section class="homeForm pt100 pb100 asContactForm asCareerForm" id="asCareerForm">
        <div class="container">
            <div class="row">

                <div class="Flex">
                    <div class="homeForm__left col-md-7 anim boxOver">
                        <div class="homeForm__left__inner ">
                            <img class=" modify-img "
                                data-image-small="{{asset('frontend/themes/cms/assets/images/dynamic/contact/contacts.jpg')}}"
                                data-image-large="{{asset('frontend/themes/cms/assets/images/dynamic/contact/contacts.jpg')}}"
                                data-image-standard="{{asset('frontend/themes/cms/assets/images/dynamic/contact/contacts.jpg')}}" data-src=""
                                src="{{asset('frontend/themes/cms/assets/images/static/blur.jpg')}}" alt=""> <!-- 600x500 -->
                        </div>
                    </div>


                    <div class="col-md-5 homeForm__right pl0">
                        <div class="homeForm__right__form ">
                            <h2 class="Title anim textOver"><span><span>apply now</span></span></h2>




                            <form id="career-form" class="dynamic_form "
                                action="https://edisonrealestatebd.com/site/dynamic_form" method="post" data-pjax="false">
                                <input type="hidden" name="_csrf-frontend"
                                    value="1XUEZ_JIHp_CjTMmRyMINS88rXkVeuQsW888auDgUJOeGFUMmRor-6_JfnQfRldDWVrBQFMZnEIqik4kspY41g==">
                                <input type="hidden" id="career-form" class="form-control" name="form_id"
                                    value="career-form">



                                <div class="form-message-container success_wrapper hide success_wrapper_career-form">
                                    <div class="form-message-body">
                                        <span class="success_container_career-form"></span>
                                    </div>
                                </div>
                                <div class="form-message-container error_wrapper hide error_wrapper_career-form">
                                    <div class="form-message-body">
                                        <span class="error_container_career-form"></span>
                                    </div>
                                </div>
                                <input type="text" name="Dynamicform[spam_protector]" style="display:none;">
                                <div class="form-group">
                                    <input type="text" name="Dynamicform[full_name]" class="form-control"
                                        id="full_name" placeholder="Full Name *">
                                </div>
                                <div class="form-group">
                                    <input type="number" name="Dynamicform[phone_number]" id="phone_number"
                                        class="form-control" placeholder="Phone Number *">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="Dynamicform[email_address]" name="email_address"
                                        class="form-control" placeholder="Email  Address*">
                                </div>
                                <div class="form-group Select">
                                    <input type="text" name="Dynamicform[apply_for_position]" id="apply_for_position"
                                        class="form-control" placeholder="Apply for the position *">
                                </div>
                                <div class="FormInline Select">
                                    <div class="form-group">
                                        <input type="text" name="Dynamicform[experience]" id="experience"
                                            class="form-control" placeholder="Year of Experience *">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="Dynamicform[cv]"
                                            class="dynamic_upload_file_input_cv"><input type="file"
                                            name="GlobalSettings[img]" class="dynamic_upload_file_cv DcFile"
                                            data-url="/admin/global/settings/upload_form_image?key=cv">
                                        <span class="file_name"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                        class=" dynamic_submit_btn dc-btn dcBtn"><span>submit</span></button>
                                </div>


                            </form>


                        </div>
                    </div>


                </div>
            </div>
    </section>
    <!-------------form section end ------------->
@endsection
