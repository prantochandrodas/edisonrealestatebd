@extends('layouts.contact')
@section('contact-content')
  <!------------------fixed sections end --------------->

    <!--inner banner start-->
    <div class="innerBanner Loader">
        <img class="modify-img " data-image-small="{{asset('contact-banners/'.$banner->image)}}"
            data-image-large="{{asset('contact-banners/'.$banner->image)}}"
            data-image-standard="{{asset('contact-banners/'.$banner->image)}}" alt=""> <!--1366x400-->

        <div class="container">
            <div class="row">
                <h1 class="anim textOver"><span><span>{{$banner->title}}</span></span></h1>
            </div>
        </div>
    </div>
    <!--inner banner end-->



    <!------ Location map start ------>
    <section class="Location_map asContactMap">
        <div class="container-fluid p0">
            <div class="row Flex">
                <div class="col-md-5 Location_map__address pt100">
                    <div class="Location_map__address__inner">
                        <!-- <h2 class="Title anim textOver"><span><span>Keep in Touch</span></span></h2>-->
                        <p class="anim justFade"><img src="{{asset('frontend/themes/cms/assets/images/static/location-pointer.svg')}}" alt="">
                            <span>{{$applicationInfo->address}}</span>
                        </p>
                        <p class="anim justFade"><img src="{{asset('frontend/themes/cms/assets/images/static/call-icon.svg')}}" alt=""><a
                                href="tel:+88 01310 817493" target="_blank">+88 {{$applicationInfo->hotline}}</a> </p>
                        <p class="anim justFade"><img src="{{asset('frontend/themes/cms/assets/images/static/icon-whatsapp.svg')}}" alt=""><a
                                href="https://api.whatsapp.com/send/?phone=%2B8801310817493&amp;text&amp;type=phone_number&amp;app_absent=0"
                                target="_blank" class="">+88 {{$applicationInfo->hotline}}</a> </p>

                        <p class="anim justFade"><img src="{{asset('frontend/themes/cms/assets/images/static/message-icon.svg')}}" alt=""> <a
                                href="mailto:hello@edisonrealestatebd.com">{{$applicationInfo->email}}</a></p>
                    </div>

                </div>

                <div class="col-md-7 Location_map__map" style="margin: 30px 0">
                    <iframe
                        src="{{$applicationInfo->map}}"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!------ Location map start ------>


    <!--===============faq section start ===============-->
    <!-- <section class="Faq pt100 pb100 asClientRelation">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="Title anim textOver"><span><span>Frequently Asked Questions</span></span></h2>
                </div>
                <div class="Faq-wrap">
                    <div class="col-md-8">
                        <div class="Faq__content anim-parent"> -->
    <!--  single-->
    <!-- <div class="Faq__content__single  anim fadeUp">
                                    <div class="Faq__content__single__title"> -->
    <!-- <h4></h4>
                                    </div> -->

    <!-- <div class="Faq__content__single__content">
                                                                            </div>
                                </div> -->

    <!-- </div>

                    </div>
                </div>

            </div>
        </div>
    </section> -->
    <!--===============faq section end ===============-->


    <!-------------form section start ------------->
    <section class="homeForm pt100 pb100 asContactForm Loader">
        <img class=" modify-img " data-image-small="{{asset('frontend/themes/cms/assets/images/static/landowner.svg')}}"
            data-image-large="{{asset('frontend/themes/cms/assets/images/static/landowner.svg')}}"
            data-image-standard="{{asset('frontend/themes/cms/assets/images/static/landowner.svg')}}" data-src=""
            src="{{asset('frontend/themes/cms/assets/images/static/blur.jpg')}}" alt=""> <!-- 1366x700 -->
        <div class="container">
            <div class="row">

                <div class="Flex">
                    <div class="homeForm__left col-md-7 anim boxOver">
                        <div class="homeForm__left__inner">
                            <img class=" modify-img"
                                data-image-small="{{asset('frontend/admin/uploads/page/contact-us/900x750/1614763453J9EfS_m.jpg')}}"
                                data-image-large="{{asset('frontend/admin/uploads/page/contact-us/900x750/1614763453J9EfS_m.jpg')}}"
                                data-image-standard="{{asset('frontend/admin/uploads/page/contact-us/900x750/1614763453J9EfS_m.jpg')}}"
                                data-src="" src="{{asset('frontend/themes/cms/assets/images/static/blur.jpg')}}" alt=""> <!-- 600x500 -->
                        </div>
                    </div>


                    <div class="col-md-5 homeForm__right pl0">
                        <div class="homeForm__right__form">
                            <h2 class="Title anim textOver"><span><span>contact us</span></span></h2>




                            <form id="contact-form" class="dynamic_form "
                                action="https://edisonrealestatebd.com/site/dynamic_form" method="post"
                                data-pjax="false">
                                <input type="hidden" name="_csrf-frontend"
                                    value="StdZoUSRlcwuaAt_2vFQh2NxXToKLvXjAGcxOzcHA6ABugjKL8OgqEMsRi2ClA_xFRcxA0xNjY1xIkN1ZXFr5Q==">
                                <input type="hidden" id="contact-form" class="form-control" name="form_id"
                                    value="contact-form">



                                <div class="form-message-container success_wrapper hide success_wrapper_contact-form">
                                    <div class="form-message-body">
                                        <span class="success_container_contact-form"></span>
                                    </div>
                                </div>
                                <div class="form-message-container error_wrapper hide error_wrapper_contact-form">
                                    <div class="form-message-body">
                                        <span class="error_container_contact-form"></span>
                                    </div>
                                </div>
                                <input type="text" name="Dynamicform[spam_protector]" style="display:none;">
                                <div class="form-group">
                                    <input type="text" id="name" name="Dynamicform[name]" class="form-control"
                                        placeholder="Full Name*">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="phone" name="Dynamicform[phone]"
                                        placeholder="Phone Number*">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="Dynamicform[email]"
                                        placeholder="Email Address*">
                                </div>
                                <div class="form-group">
                                    <textarea name="Dynamicform[message]" id="message" cols="30" rows="10"
                                        class="form-control" placeholder="Message*"></textarea>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class=" dynamic_submit_btn dcBtn"><span>submit</span></button>
                                </div>


                            </form>


                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-------------form section end ------------->
    @endsection