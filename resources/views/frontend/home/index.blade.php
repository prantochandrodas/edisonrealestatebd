   @extends('layouts.frontend')
   @section('frontend-content')
     


       <div class="modal fade careerModal" id="suggetions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           <div class="modal-dialog" role="document">
               <div class="modal-content container">
                   <div class="modal-header">
                       <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>-->
                       <!--                </button>-->
                       <img src="themes/cms/assets/images/static/modal-close.svg" class="modalClose" alt=""
                           data-dismiss="modal" aria-label="Close">
                   </div>
                   <div class="modal-body">
                       <div class="content_wrapper_width">
                           <h2 class="Title">Fill Up the Information</h2>
                           <div class="clear">

                           </div>
                           <div class="form_wrapper">




                               <form id="suggestion-form" class="dynamic_form "
                                   action="https://putulproperties.com/site/dynamic_form" method="post"
                                   data-pjax="false">
                                   <input type="hidden" name="_csrf-frontend"
                                       value="ZgA4YD8GyPpqra7NkpOxMiLbSk5HyznVoT7NmWeO9g4tbWkLVFT9ngfp45_K9u5EVL0mdwGoQbvQe7_XNfieSw==">
                                   <input type="hidden" id="suggestion-form" class="form-control" name="form_id"
                                       value="suggestion-form">



                                   <div
                                       class="form-message-container success_wrapper hide success_wrapper_suggestion-form">
                                       <div class="form-message-body">
                                           <span class="success_container_suggestion-form"></span>
                                       </div>
                                   </div>
                                   <div class="form-message-container error_wrapper hide error_wrapper_suggestion-form">
                                       <div class="form-message-body">
                                           <span class="error_container_suggestion-form"></span>
                                       </div>
                                   </div>
                                   <input type="text" name="Dynamicform[spam_protector]" style="display:none;">
                                   <div class="form-group">
                                       <textarea name="Dynamicform[message]" id="message" cols="30" rows="10" class="form-control"
                                           placeholder="Write your message here*"></textarea>
                                   </div>
                                   <div class="form-group">
                                       <input type="text" id="name" name="Dynamicform[name]"
                                           class="form-control" placeholder="Full Name*">
                                   </div>
                                   <div class="form-group">
                                       <input type="number" class="form-control" id="phone"
                                           name="Dynamicform[phone]" placeholder="Phone Number*">
                                   </div>
                                   <div class="form-group">
                                       <input type="email" class="form-control" id="email"
                                           name="Dynamicform[email]" placeholder="Email Address*">
                                   </div>


                                   <div class="form-group">
                                       <button type="submit"
                                           class=" dynamic_submit_btn dcBtn"><span>submit</span></button>
                                   </div>


                               </form>


                           </div>
                       </div>
                   </div>

               </div>
           </div>
       </div>


       <!-----------------banner slider----------------->

       <section class="home-slider Banner-slider p0">
           <span>sdfadf</span>
           <div class="baner-slider revslider-wrap tp-overflow-hidden slider-parallax clearfix" id="slider">
               <div id="rev_slider_202_1_wrapper" class="rev_slider_wrapper tp-overflow-hidden" data-alias="concept1"
                   style="background-color:transparent;padding:0px;">
                   <!-- START REVOLUTION SLIDER 5.1.1RC fullscreen mode -->

                   <div id="rev_slider_202_1" class="rev_slider tp-overflow-hidden" style="display:none;"
                       data-version="5.4.5">
                       <ul>
                           @foreach ($sliders as $item)
                               <!-- SLIDE  1-->
                               <li data-index="rs-{{ $item->id }}" class="dark"
                                   data-transition="slidingoverlayhorizontal" data-slotamount="default"
                                   data-easein="Power1.easeInOut" data-easeout="default" data-masterspeed="default"
                                   data-speed="1.5" data-thumb="" data-rotate="0" data-saveperformance="off"
                                   data-title="your dream our passion" data-description="">
                                   <!-- MAIN IMAGE -->
                                   <img src="{{ asset('home/slider/' . $item->image) }}" alt=""
                                       data-bgposition="bottom" data-bgfit="cover" style="height: 100% !important;"
                                       data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                   <!-- LAYERS -->
                                   <!--                        <div class="overlay"></div>-->


                                   <div class="container">
                                       <!-- LAYER NR. 2 -->
                                       <div class="tp-caption   tp-resizeme" id="slide-101-layer-{{ $item->id }}"
                                           data-x="['left']" data-hoffset="['0']"
                                           data-y="['bottom','bottom','bottom','bottom']"
                                           data-voffset="['550','200','350','280']" data-fontsize="['35','35','40','30']"
                                           data-lineheight="['35','35','40','30']"
                                           data-width="['none','none','700','300']" data-height="auto,auto,auto,auto"
                                           data-whitespace="['nowrap','nowrap','nowrap','nowrap']" data-type="text"
                                           data-responsive_offset="on"
                                           data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"power2.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                           data-textAlign="['inherit','inherit','inherit','inherit']"
                                           data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                           data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                           style="margin-top: 90px; z-index: 7; white-space: nowrap;text-align:center;text-transform: uppercase; font-size: 35px !important; color: #fff; letter-spacing: 1px; font-weight: 400;">
                                           <!-- <span style="font-size: 15px;">Welcome to Putul Properties Limited</span> -->
                                           <p class="h_title" style="margin-top: 0px !important;">{{ $item->heading }}
                                           </p>
                                           <span style="font-size: 14px !important">{{ $item->short_description }}</span>
                                           <br>
                                           <button class="custom-button">More Details</button>
                                       </div>


                                       <!-- LAYER NR. 3 -->
                                       <div class="tp-caption   tp-resizeme" id="slide-102-layer-{{ $item->id }}"
                                           data-x="['left']" data-hoffset="['0']"
                                           data-y="['bottom','bottom','bottom','bottom']"
                                           data-voffset="['500','280','500','210']" data-fontsize="['35','35','40','30']"
                                           data-lineheight="['60','60','50','40']" data-width="['900','none','700','300']"
                                           data-height="none" data-whitespace="['normal','nowrap','nowrap','normal']"
                                           data-type="text" data-responsive_offset="on"
                                           data-frames='[{"delay":300,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"power2.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                           data-textAlign="['inherit','inherit','inherit','inherit']"
                                           data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                           data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                           style="z-index: 7; white-space: nowrap;text-align:center; text-transform: uppercase; font-size: 35px !important; color: #fff; letter-spacing: 1px; font-weight: 500;">
                                           <p class="p_title"></p>
                                       </div>
                                   </div>
                               </li>
                           @endforeach
                       </ul>
                       <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;color:#FFF;"></div>
                   </div>
               </div>
           </div>


           <div class="Banner-slider__menu">
               <div class="container">
                   <ul>
                       <li><img src="{{ asset('frontend/themes/cms/assets/images/static/project.svg') }}" alt=""
                               height="20" width="20"><span><a href="{{route('projects.index')}}">Explore Projects
                               </a></span><img src="themes/cms/assets/images/static/caret.svg" alt=""
                               height="9 px" width="8 px">
                       </li>
                       @foreach ($projectCategories as $item)
                           <li><a href={{route('projects.index',['category' => $item->slug])}}>{{ $item->name }}</a>
                       @endforeach
                   </ul>
               </div>

           </div>
       </section>

       <!-----------------banner slider----------------->

       <!-------------home about us start------------->
       <section class="MissionVision asHomeAbout">

           <div class="MissionVision__single pt100 pb100">
               <div class="container">
                   <div class="row Flex">

                       <div class="col-md-6 col-sm-6 MissionVision__single__right anim-parent">
                           <h3 class="subTitle textOver anim"><span><span>About Us</span></span></h3>
                           <h2 class="Title textOver anim">
                               <span><span>{{ $aboutCompanyInformation->title }}</span></span>
                           </h2>
                           <p style="text-align: justify;">{!! $aboutCompanyInformation->short_description !!}</p>

                           <a href="/about-us" class="dcBtn anim justFade"><span>learn more</span></a>
                       </div>

                       <div class="col-md-6 col-sm-6">
                           <div class="MissionVision__single__left Loader Light boxOver anim">
                               <img class="modify-img "
                                   data-image-small="{{ asset('about_us/thumbnail/' . $aboutCompanyInformation->thumbnail_image) }}"
                                   data-image-large="{{ asset('about_us/thumbnail/' . $aboutCompanyInformation->thumbnail_image) }}"
                                   data-image-standard="{{ asset('about_us/thumbnail/' . $aboutCompanyInformation->thumbnail_image) }}"
                                   data-src="{{ asset('about_us/thumbnail/' . $aboutCompanyInformation->thumbnail_image) }}"
                                   src="{{ asset('about_us/thumbnail/' . $aboutCompanyInformation->thumbnail_image) }}"
                                   alt=""><!-- 570x460 -->
                               <a href="{{ $aboutCompanyInformation->video_url }}">
                                   <span class="Play">
                                       <!--<img class="Play" height="37" width="37"
                                                                                                                                       src="<? //= $this->theme->baseUrl . '/assets/images/static/play.svg'; ?>"
                                                                                                                                       alt=""> -->
                                       <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                           viewBox="0 0 130 130" class="Play">
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
                                           <g id="Component_27_3" data-name="Component 27 – 3"
                                               transform="translate(30 25)">
                                               <g transform="matrix(1, 0, 0, 1, -30, -25)" filter="url(#Ellipse_6)">
                                                   <circle id="Ellipse_6-2" data-name="Ellipse 6" cx="35"
                                                       cy="35" r="35" transform="translate(30 25)" fill="#ff0000">
                                                   </circle>
                                               </g>
                                               <circle class="hover-init-btn" id="Ellipse_7" data-name="Ellipse 7"
                                                   cx="1" cy="1" r="1" transform="translate(34 34)"
                                                   fill="#fff"></circle>
                                               <path id="Polygon_1" data-name="Polygon 1"
                                                   d="M9.419,1.872a1.5,1.5,0,0,1,2.5,0l7.864,11.8A1.5,1.5,0,0,1,18.531,16H2.8a1.5,1.5,0,0,1-1.248-2.332Z"
                                                   transform="translate(44 24) rotate(90)" fill="#fff"></path>
                                           </g>
                                       </svg>
                                   </span>
                               </a>
                           </div>
                       </div>


                   </div>
               </div>
           </div>

       </section>
       <!-------------home about us end------------->


       <!----------home Ongoing Projects list start---------->
       <section class="Project pt80 pb80">
           <div class="container">
               <div class="Project__title anim-parent">
                   <h4 class="Title anim textOver"><span><span>Ongoing Projects </span></span></h4>
                   <!-- <h2 class="Title anim textOver">Ongoing Projects -->
                   </h2>
               </div>

               <div class="Project-nav">
                   <ul>
                       <li class="goLeft"><img
                               src="{{ asset('frontend/themes/cms/assets/images/static/test_prev.svg') }}" height="51"
                               width="51" alt=""></li>
                       <li class="goRight"><img
                               src="{{ asset('frontend/themes/cms/assets/images/static/test_next.svg') }}" height="51"
                               width="51" alt=""></li>
                   </ul>
               </div>

           </div>


           <div class="container-fluid">
               <div class="row">
                   <div class="Project__slider-wrap anim boxOver">
                       <div class="ProjectSlider-init">

                           @foreach ($ongoingProjects as $item)
                               <div class="Project__slider-wrap__single">
                                   <div class="Project__slider-wrap__single__inner">
                                       {{-- <a href="{{ route('projects.details', ['name' => $item->slug]) }}"></a> --}}
                                       <div class="Project__slider-wrap__single__bg modify-bg bg-position"
                                           data-image-small="{{ asset('project/' . $item->images[0]->image) }}"
                                           data-image-large="{{ asset('project/' . $item->images[0]->image) }}"
                                           data-image-standard="{{ asset('project/' . $item->images[0]->image) }}"
                                           style="background-image: url('{{ asset('project/' . $item->images[0]->image) }}');">

                                       </div>

                                       <!-- 370x600  && mobile > 374x450-->
                                       <div class="Project__slider-wrap__single__inner__content">
                                           <div class="Project__slider-wrap__single__inner__content__slide">
                                               <div class="Project__slider-wrap__single__inner__content__slide__inner">
                                                   <h3>
                                                       @if ($item->name)
                                                           {{ $item->name }}
                                                       @endif
                                                   </h3>
                                                   <h4>
                                                       @if ($item->plot)
                                                           Plot {{ $item->plot }},
                                                       @endif

                                                       @if ($item->block)
                                                           Block {{ $item->block }},
                                                       @endif

                                                       @if ($item->location->name)
                                                           {{ $item->location->name }}
                                                       @endif
                                                   </h4>
                                                   <p>
                                                       @if ($item->overview)
                                                           {{ $item->overview }}
                                                       @endif
                                                       <br /><br />
                                                       @if ($item->apartment_tour)
                                                           For Apartment Tour-&nbsp;
                                                           <a href="{{$item->apartment_tour}}" target="_blank">click
                                                               here</a>
                                                       @endif
                                                       <br />
                                                       <br />

                                                       @if ($item->virtual_experience)
                                                           For Virtual experience -&nbsp;&nbsp;
                                                           <a href="{{ $item->virtual_experience }}"
                                                               target="_blank">click here</a>
                                                       @endif

                                                   </p>
                                                   <div
                                                       style="color: white; font-size: 18px; display: flex; margin-top: 5px">
                                                       <span id="mytooltip" data-toggle="tooltip" title="Beds"
                                                           style="margin-right: 20px;"><i class="fa fa-bed"
                                                               aria-hidden="true"></i><span
                                                               style="margin-left: 6px;">{{ number_format($item->beds, 0) }}</span></span>
                                                       <span id="mytooltip" data-toggle="tooltip" title="Baths"
                                                           style="margin-right: 20px;"><i class="fa fa-bath"
                                                               aria-hidden="true"></i><span
                                                               style="margin-left: 6px;">{{ number_format($item->baths, 0) }}</span></span>
                                                       <span id="mytooltip" data-toggle="tooltip" title="Verandas"
                                                           style="margin-right: 20px;"><i class="fa fa-square"
                                                               aria-hidden="true"></i><span
                                                               style="margin-left: 6px;">{{ number_format($item->verandas, 0) }}</span></span>
                                                       <span id="mytooltip" data-toggle="tooltip" title="Area"
                                                           style="margin-right: 20px;"><i class="fa fa-share-square-o"
                                                               aria-hidden="true"></i><span
                                                               style="margin-left: 6px;">{{ number_format($item->area, 0) }}</span></span>
                                                   </div>
                                               </div>

                                           </div>
                                           <a href="{{ route('projects.details', ['name' => $item->slug]) }}" class="dcBtn"><span>Explore</span></a>
                                           
                                       </div>
                                   </div>
                               </div>
                           @endforeach

                       </div>
                   </div>
               </div>
               <div class="d-flex justify-content-center" style="display: flex; justify-content: center;">
                 <a href="{{route('projects.index',['category' => 'ongoing'])}}"><button class="custom-button">View All Projects</button></a>  
               </div>

           </div>
       </section>
       <!----------home Ongoing Projects list end---------->


       <!----------home Upcoming Projects list start---------->
       <section class="Project pt80 pb80" style="background-color: #222222;">
           <div class="container">
               <div class="Project__title anim-parent">
                   <h4 class="Title anim textOver" style="color: white;"><span><span>Upcoming Projects </span></span>
                   </h4>
                   <!-- <h2 class="Title anim textOver">Ongoing Projects -->
                   </h2>
               </div>

               <div class="Project-nav">
                   <ul>
                       <li class="goLeftUpcoming"><img
                               src="{{ asset('/frontend/themes/cms/assets/images/static/icon-left.png') }}"
                               height="51" width="51" alt=""></li>
                       <li class="goRightUpcoming"><img
                               src="{{ asset('/frontend/themes/cms/assets/images/static/icon-right.png') }}"
                               height="51" width="51" alt=""></li>
                   </ul>
               </div>

           </div>


           <div class="container-fluid">
               <div class="row">
                   <div class="Project__slider-wrap anim boxOver">
                       <div class="ProjectSliderUpcoming-init">
                           @foreach ($upcomingProjects as $item)
                               <div class="Project__slider-wrap__single ">
                                   <div class="Project__slider-wrap__single__inner ">
                                       {{-- <a href="{{ route('projects.details', ['name' => $item->slug]) }}"></a> --}}
                                       <div class="Project__slider-wrap__single__bg modify-bg bg-position"
                                           data-image-small="{{ asset('project/' . $item->images[0]->image) }}"
                                           data-image-large="{{ asset('project/' . $item->images[0]->image) }}"
                                           data-image-standard="{{ asset('project/' . $item->images[0]->image) }}"
                                           style="background-image: url('{{ asset('project/' . $item->images[0]->image) }}');">

                                       </div>

                                       <!-- 370x600  && mobile > 374x450-->
                                       <div class="Project__slider-wrap__single__inner__content">
                                           <div class="Project__slider-wrap__single__inner__content__slide">
                                               <div class="Project__slider-wrap__single__inner__content__slide__inner">
                                                   <h3>
                                                       @if ($item->name)
                                                           {{ $item->name }}
                                                       @endif
                                                   </h3>
                                                   <h4>
                                                       @if ($item->plot)
                                                           Plot {{ $item->plot }},
                                                       @endif

                                                       @if ($item->block)
                                                           Block {{ $item->block }},
                                                       @endif

                                                       @if ($item->location->name)
                                                           {{ $item->location->name }}
                                                       @endif
                                                   </h4>
                                                   <p>
                                                       @if ($item->overview)
                                                           {{ $item->overview }}
                                                       @endif
                                                       <br /><br />
                                                       @if ($item->apartment_tour)
                                                           For Apartment Tour-&nbsp;
                                                           <a href="{{ $item->apartment_tour }}" target="_blank">click
                                                               here</a>
                                                       @endif
                                                       <br />
                                                       <br />

                                                       @if ($item->virtual_experience)
                                                           For Virtual experience -&nbsp;&nbsp;
                                                           <a href="{{ $item->virtual_experience }}"
                                                               target="_blank">click here</a>
                                                       @endif

                                                   </p>
                                                   <div
                                                       style="color: white; font-size: 18px; display: flex; margin-top: 5px">
                                                       <span id="mytooltip" data-toggle="tooltip" title="Beds"
                                                           style="margin-right: 20px;"><i class="fa fa-bed"
                                                               aria-hidden="true"></i><span
                                                               style="margin-left: 6px;">{{ number_format($item->beds, 0) }}</span></span>
                                                       <span id="mytooltip" data-toggle="tooltip" title="Baths"
                                                           style="margin-right: 20px;"><i class="fa fa-bath"
                                                               aria-hidden="true"></i><span
                                                               style="margin-left: 6px;">{{ number_format($item->baths, 0) }}</span></span>
                                                       <span id="mytooltip" data-toggle="tooltip" title="Verandas"
                                                           style="margin-right: 20px;"><i class="fa fa-square"
                                                               aria-hidden="true"></i><span
                                                               style="margin-left: 6px;">{{ number_format($item->verandas, 0) }}</span></span>
                                                       <span id="mytooltip" data-toggle="tooltip" title="Area"
                                                           style="margin-right: 20px;"><i class="fa fa-share-square-o"
                                                               aria-hidden="true"></i><span
                                                               style="margin-left: 6px;">{{ number_format($item->area, 0) }}
                                                               sqft</span></span>
                                                   </div>
                                               </div>

                                           </div>

                                           <a href="{{ route('projects.details', ['name' => $item->slug]) }}"
                                               class="dcBtn"><span>Explore</span></a>
                                       </div>
                                   </div>
                               </div>
                           @endforeach
                       </div>
                   </div>
               </div>
               <div class="d-flex justify-content-center" style="display: flex; justify-content: center;">
                <a href="{{route('projects.index',['category' => 'upcoming'])}}"><button class="custom-button">View All Projects</button></a>  
               </div>

           </div>
       </section>
       <!----------home Upcoming Projects list end---------->

       <!----------home Handed Over Projects Projects list start---------->
       <section class="Project pt80 pb80">
           <div class="container">
               <div class="Project__title anim-parent">
                   <h4 class="anim textOver"><span><span>Where your Work Comes to Fruition </span></span></h4>
                   <h2 class="Title anim textOver">Handed Over Projects
                   </h2>
               </div>

               <div class="Project-nav">
                   <ul>
                       <li class="goLeftHandOver"><img
                               src="{{ asset('/frontend/themes/cms/assets/images/static/test_prev.svg') }}"
                               height="51" width="51" alt=""></li>
                       <li class="goRightHandOver"><img
                               src="{{ asset('/frontend/themes/cms/assets/images/static/test_next.svg') }}"
                               height="51" width="51" alt=""></li>
                   </ul>
               </div>

           </div>


           <div class="container-fluid">
               <div class="row">
                   <div class="Project__slider-wrap anim boxOver">
                       <div class="ProjectSliderHandOver-init">

                           @foreach ($handedOverProjects as $item)
                               <div class="Project__slider-wrap__single ">
                                   <div class="Project__slider-wrap__single__inner ">
                                       {{-- <a href="{{ route('projects.details', ['name' => $item->slug]) }}"></a> --}}
                                       <div class="Project__slider-wrap__single__bg modify-bg bg-position"
                                           data-image-small="{{ asset('project/' . $item->images[0]->image) }}"
                                           data-image-large="{{ asset('project/' . $item->images[0]->image) }}"
                                           data-image-standard="{{ asset('project/' . $item->images[0]->image) }}"
                                           style="background-image: url('{{ asset('project/' . $item->images[0]->image) }}');">

                                       </div>

                                       <!-- 370x600  && mobile > 374x450-->
                                       <div class="Project__slider-wrap__single__inner__content">
                                           <div class="Project__slider-wrap__single__inner__content__slide">
                                               <div class="Project__slider-wrap__single__inner__content__slide__inner">
                                                   <h3>
                                                       @if ($item->name)
                                                           {{$item->name}}
                                                       @endif
                                                   </h3>
                                                   <h4>
                                                       @if ($item->plot)
                                                           Plot {{ $item->plot }},
                                                       @endif

                                                       @if ($item->block)
                                                           Block {{ $item->block }},
                                                       @endif

                                                       @if ($item->location->name)
                                                           {{ $item->location->name }}
                                                       @endif
                                                   </h4>
                                                   <p>
                                                       @if ($item->overview)
                                                           {{ $item->overview }}
                                                       @endif
                                                       <br /><br />
                                                       @if ($item->apartment_tour)
                                                           For Apartment Tour-&nbsp;
                                                           <a href="{{ $item->apartment_tour }}" target="_blank">click
                                                               here</a>
                                                       @endif
                                                       <br />
                                                       <br />

                                                       @if ($item->virtual_experience)
                                                           For Virtual experience -&nbsp;&nbsp;
                                                           <a href="{{ $item->virtual_experience }}"
                                                               target="_blank">click here</a>
                                                       @endif

                                                   </p>
                                                   <div
                                                       style="color: white; font-size: 18px; display: flex; margin-top: 5px">
                                                       <span id="mytooltip" data-toggle="tooltip" title="Beds"
                                                           style="margin-right: 20px;"><i class="fa fa-bed"
                                                               aria-hidden="true"></i><span
                                                               style="margin-left: 6px;">{{ number_format($item->beds, 0) }}</span></span>
                                                       <span id="mytooltip" data-toggle="tooltip" title="Baths"
                                                           style="margin-right: 20px;"><i class="fa fa-bath"
                                                               aria-hidden="true"></i><span
                                                               style="margin-left: 6px;">{{ number_format($item->baths, 0) }}</span></span>
                                                       <span id="mytooltip" data-toggle="tooltip" title="Verandas"
                                                           style="margin-right: 20px;"><i class="fa fa-square"
                                                               aria-hidden="true"></i><span
                                                               style="margin-left: 6px;">{{ number_format($item->verandas, 0) }}</span></span>
                                                       <span id="mytooltip" data-toggle="tooltip" title="Area"
                                                           style="margin-right: 20px;"><i class="fa fa-share-square-o"
                                                               aria-hidden="true"></i><span
                                                               style="margin-left: 6px;">{{ number_format($item->area, 0) }}
                                                               sqft</span></span>
                                                   </div>
                                               </div>
                                           </div>
                                           <a href="{{ route('projects.details', ['name' => $item->slug]) }}"
                                               class="dcBtn"><span>Explore</span></a>
                                       </div>
                                   </div>
                               </div>
                           @endforeach
                       </div>
                   </div>
               </div>
               <div class="d-flex justify-content-center" style="display: flex; justify-content: center;">
                <a href="{{route('projects.index',['category' => 'completed'])}}"><button class="custom-button">View All Projects</button></a>  
               </div>

           </div>
       </section>
       <!----------home Handed Over Projects Projects list end---------->

       <!--   -------------------Home Testimonial Start---------------------------->

       <section class="testimonial pt80 pb80">
           <div class="container">
               <div class="row testimonial-row">
                   <div class="col-md-5">
                       <div class="testimonial__title anim-parent">
                           <h4 class="subTitle anim textOver"><span><span>Testimonial </span></span></h4>
                           <h2 class="Title anim textOver"><span><span>What customers <br> say about us</span></span>
                           </h2>
                       </div>
                   </div>

               </div>

               <div class="testimonial-slider">
                   @foreach ($testimonials as $item)
                       <div class="row testimonial__data">
                           <div class="col-md-5">
                               <div class="testimonial__data__left Light boxOver anim">

                                   <img class=" modify-img "
                                       data-image-small="{{ asset('home/testimonial/' . $item->thumbnail_image) }}"
                                       data-image-large="{{ asset('home/testimonial/' . $item->thumbnail_image) }}"
                                       data-image-standard="{{ asset('home/testimonial/' . $item->thumbnail_image) }}"
                                       style="background-image: url('{{ asset('home/testimonial/' . $item->thumbnail_image) }}');"><!-- 570x460 -->
                                   <a href="{{ $item->video }}">
                                       <span class="Play">
                                           <svg id="Group_369" data-name="Group 369" xmlns="http://www.w3.org/2000/svg"
                                               width="60" height="60" viewBox="0 0 60 60">
                                               <circle id="Ellipse_36" data-name="Ellipse 36" cx="30"
                                                   cy="30" r="30" fill="#fff" />
                                               <path id="Polygon_1" data-name="Polygon 1" d="M8.5,0,17,14H0Z"
                                                   transform="translate(39 21) rotate(90)" fill="#003a71" />
                                           </svg>
                                       </span>

                                   </a>
                               </div>
                           </div>
                           <div class="col-md-7">
                               <div class="testimonial__data__right">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="46.75" height="40"
                                       viewBox="0 0 46.75 40">
                                       <g id="Group_22489" data-name="Group 22489" transform="translate(-674.623 -3249)">
                                           <path id="Path_720" data-name="Path 720"
                                               d="M411.174,390.694v20.047h19.953V390.694H421.1q.374-9.6,10.023-9.93V370.741Q411.174,373.037,411.174,390.694Z"
                                               transform="translate(263.449 2878.259)" fill="#f8f8f8" />
                                           <path id="Path_721" data-name="Path 721"
                                               d="M515.432,380.765V370.741q-19.953,2.3-19.953,19.953v20.047h19.953V390.694H505.409Q505.783,381.093,515.432,380.765Z"
                                               transform="translate(205.941 2878.259)" fill="#f8f8f8" />
                                       </g>
                                   </svg>

                                   <h3>{{ $item->title }}</h3>
                                   <p>{{ $item->description }}</p>
                                   <p class="name">{{ $item->owner_name }}</p>
                                   <p>{{ $item->owner_title }} </p>
                               </div>
                           </div>

                       </div>
                   @endforeach
               </div>
               <div class="col-md-7">
                   <div class="testimonial__nav">
                       <ul>
                           <li class="goLeftTestimonial"><svg xmlns="http://www.w3.org/2000/svg" width="20.354"
                                   height="10.707" viewBox="0 0 20.354 10.707">
                                   <g id="Component_10_10" data-name="Component 10 – 10"
                                       transform="translate(20.354 10.354) rotate(180)">
                                       <line id="Line_25" data-name="Line 25" x2="20"
                                           transform="translate(0 5)" fill="none" stroke="#1a1818"
                                           stroke-width="1" />
                                       <line id="Line_26" data-name="Line 26" x2="5" y2="5"
                                           transform="translate(15)" fill="none" stroke="#1a1818" stroke-width="1" />
                                       <line id="Line_27" data-name="Line 27" y1="5" x2="5"
                                           transform="translate(15 5)" fill="none" stroke="#1a1818"
                                           stroke-width="1" />
                                   </g>
                               </svg>
                           </li>
                           <li class="goRightTestimonial"><svg xmlns="http://www.w3.org/2000/svg" width="20.354"
                                   height="10.707" viewBox="0 0 20.354 10.707">
                                   <g id="Component_10_9" data-name="Component 10 – 9" transform="translate(0 0.354)">
                                       <line id="Line_25" data-name="Line 25" x2="20"
                                           transform="translate(0 5)" fill="none" stroke="#1a1818"
                                           stroke-width="1" />
                                       <line id="Line_26" data-name="Line 26" x2="5" y2="5"
                                           transform="translate(15)" fill="none" stroke="#1a1818" stroke-width="1" />
                                       <line id="Line_27" data-name="Line 27" y1="5" x2="5"
                                           transform="translate(15 5)" fill="none" stroke="#1a1818"
                                           stroke-width="1" />
                                   </g>
                               </svg>
                           </li>
                       </ul>
                   </div>
               </div>

           </div>
       </section>



       <!-------------landowner & buyer section ------------->
       <section class="landOwner Loader pt100 pb100" style="display:none">
           <img class=" modify-img " data-image-small="themes/cms/assets/images/static/landowner.svg"
               data-image-large="themes/cms/assets/images/static/landowner.svg"
               data-image-standard="themes/cms/assets/images/static/landowner.svg" data-src=""
               src="themes/cms/assets/images/static/blur.jpg" alt=""> <!-- 1366x700 -->
           <div class="container">
               <div class="row ">
                   <div class="Flex">
                       <div class="col-md-6 landOwner__left anim boxOver Loader">

                           <img class=" modify-img "
                               data-image-small="themes/cms/assets/images/static/landowner-buyer.jpg"
                               data-image-large="themes/cms/assets/images/static/landowner-buyer.jpg"
                               data-image-standard="themes/cms/assets/images/dynamic/home/text.jpg" data-src=""
                               src="themes/cms/assets/images/static/blur.jpg" alt=""> <!-- 500x500 -->

                           <div class="landOwner__left__single">
                               <a href="contact-us/landowner.html"></a>
                               <h4 class="subTitle">landowners</h4>
                               <h3 class="Title">Build your sanctuary <br>with credibility</h3>
                               <img src="themes/cms/assets/images/static/landowner-right.svg" alt="">
                           </div>

                           <div class="landOwner__left__single">
                               <a href="contact-us/buyer.html"></a>
                               <h4 class="subTitle">buyers</h4>
                               <h3 class="Title">invest for a better <br> tomorrow</h3>
                               <img src="themes/cms/assets/images/static/landowner-right.svg" alt="">
                           </div>
                       </div>

                       <div class="col-md-6 landOwner__right">
                           <div class="landOwner__right__slider">
                               <div class="landOwner-init"> <!-- landOwner-init -->
                                   <div class="landOwner__right__slider__single">
                                       <div class="landOwner__right__slider__single__text">
                                           <h2>Hear from our homeowners sharing their tales of happiness. From dreams
                                               taking shape to keys unlocking a world of joy, discovering the true
                                               satisfaction and warmth that defines their experience.</h2>
                                       </div>

                                       <div class="landOwner__right__slider__single__bottom">
                                           <h4>Homeowner’s Reflections on Apartments </h4>
                                           <p>Apartment Owner</p>
                                       </div>
                                   </div>

                                   <div class="landOwner__right__slider__single">
                                       <div class="landOwner__right__slider__single__text">
                                           <h2>Hear from our homeowners sharing their tales of happiness. From dreams
                                               taking shape to keys unlocking a world of joy, discovering the true
                                               satisfaction and warmth that defines their experience.</h2>
                                       </div>

                                       <div class="landOwner__right__slider__single__bottom">
                                           <h4>Homeowner’s Reflections on Apartments </h4>
                                           <p>Apartment Owner</p>
                                       </div>
                                   </div>

                                   <div class="landOwner__right__slider__single">
                                       <div class="landOwner__right__slider__single__text">
                                           <h2>Hear from our homeowners sharing their tales of happiness. From dreams
                                               taking shape to keys unlocking a world of joy, discovering the true
                                               satisfaction and warmth that defines their experience.</h2>
                                       </div>

                                       <div class="landOwner__right__slider__single__bottom">
                                           <h4>Homeowner’s Reflections on Apartments </h4>
                                           <p>Apartment Owner</p>
                                       </div>
                                   </div>

                                   <div class="landOwner__right__slider__single">
                                       <div class="landOwner__right__slider__single__text">
                                           <h2>Hear from our homeowners sharing their tales of happiness. From dreams
                                               taking shape to keys unlocking a world of joy, discovering the true
                                               satisfaction and warmth that defines their experience.</h2>
                                       </div>

                                       <div class="landOwner__right__slider__single__bottom">
                                           <h4>Homeowner’s Reflections on Apartments </h4>
                                           <p>Apartment Owner</p>
                                       </div>
                                   </div>

                                   <div class="landOwner__right__slider__single">
                                       <div class="landOwner__right__slider__single__text">
                                           <h2>Hear from our homeowners sharing their tales of happiness. From dreams
                                               taking shape to keys unlocking a world of joy, discovering the true
                                               satisfaction and warmth that defines their experience.</h2>
                                       </div>

                                       <div class="landOwner__right__slider__single__bottom">
                                           <h4>Homeowner’s Reflections on Apartments </h4>
                                           <p>Apartment Owner</p>
                                       </div>
                                   </div>

                                   <div class="landOwner__right__slider__single">
                                       <div class="landOwner__right__slider__single__text">
                                           <h2>Hear to the inspiring journey of our Irida Landowners, Dr. Mustafizur Rahman
                                               and Dr. Tahmina Akter as they graciously share their experience with Edison
                                               Real Estate. Their words highlight what makes us truly unique. Their
                                               appreciation for our work ethic, steadfast dedication, and commitment to
                                               delivering timely, authentic service fills us with joy and pride.</h2>
                                       </div>

                                       <div class="landOwner__right__slider__single__bottom">
                                           <h4>Landowner’s Review</h4>
                                       </div>
                                   </div>

                                   <div class="landOwner__right__slider__single">
                                       <div class="landOwner__right__slider__single__text">
                                           <h2>Tune in to what homeowners have to say about their experience with Edison
                                               Real Estate. We&#39;re dedicated to making your journey to owning a home as
                                               smooth and enjoyable as possible, because your happiness is our priority.
                                           </h2>
                                       </div>

                                       <div class="landOwner__right__slider__single__bottom">
                                           <h4>Homeowner’s Reflections on Apartments </h4>
                                           <p>Apartment Owner</p>
                                       </div>
                                   </div>

                                   <div class="landOwner__right__slider__single">
                                       <div class="landOwner__right__slider__single__text">
                                           <h2>Tune in to what homeowners have to say about their experience with Edison
                                               Real Estate. We&#39;re dedicated to making your journey to owning a home as
                                               smooth and enjoyable as possible, because your happiness is our priority.
                                           </h2>
                                       </div>

                                       <div class="landOwner__right__slider__single__bottom">
                                           <h4>Homeowner’s Reflections on Apartments </h4>
                                       </div>
                                   </div>

                                   <div class="landOwner__right__slider__single">
                                       <div class="landOwner__right__slider__single__text">
                                           <h2>Tune in to what homeowners have to say about their experience with Edison
                                               Real Estate. We&#39;re dedicated to making your journey to owning a home as
                                               smooth and enjoyable as possible, because your happiness is our priority.
                                           </h2>
                                       </div>

                                       <div class="landOwner__right__slider__single__bottom">
                                           <h4>Homeowner’s Reflections on Apartments </h4>
                                       </div>
                                   </div>

                               </div>
                           </div>

                       </div>
                   </div>

               </div>
           </div>
       </section>
       <!-------------landowner & buyer section  end------------->






       <section class="investor-information">
           <img class=" modify-img "
               data-image-small="{{ asset('frontend/themes/cms/assets/images/static/landowner.svg') }}"
               data-image-large="{{ asset('frontend/themes/cms/assets/images/static/landowner.svg') }}"
               data-image-standard="{{ asset('frontend/themes/cms/assets/images/static/landowner.svg') }}" data-src=""
               src="{{ asset('frontend/themes/cms/assets/images/static/blur.jpg') }}" alt=""> <!-- 1366x700 -->
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <div class="investor-information__wrap Light">
                           <div class="investor-information__wrap__img modify-img"
                               data-image-small="{{ asset('home/InvestorInformation/' . $investorInformation->thumbnail_image) }}"
                               data-image-large="{{ asset('home/InvestorInformation/' . $investorInformation->thumbnail_image) }}"
                               data-image-standard="{{ asset('home/InvestorInformation/' . $investorInformation->thumbnail_image) }}"
                               style="background: url('{{ asset('home/InvestorInformation/' . $investorInformation->thumbnail_image) }}');"
                               data-src="">
                           </div>
                           <!-- 1170 x 500 -->
                           <a href="{{ $investorInformation->video }}">

                               <div class="youtube-btn">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="130" height="130"
                                       viewBox="0 0 130 130">
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
                                               <circle id="Ellipse_6-2" data-name="Ellipse 6" cx="35"
                                                   cy="35" r="35" transform="translate(30 25)" fill="#ff0000">
                                               </circle>
                                           </g>
                                           <circle class="hover-init-btn" id="Ellipse_7" data-name="Ellipse 7"
                                               cx="1" cy="1" r="1" transform="translate(34 34)"
                                               fill="#fff"></circle>
                                           <path id="Polygon_1" data-name="Polygon 1"
                                               d="M9.419,1.872a1.5,1.5,0,0,1,2.5,0l7.864,11.8A1.5,1.5,0,0,1,18.531,16H2.8a1.5,1.5,0,0,1-1.248-2.332Z"
                                               transform="translate(44 24) rotate(90)" fill="#fff"></path>
                                       </g>
                                   </svg>
                               </div>
                           </a>
                       </div>

                   </div>
               </div>
           </div>
       </section>







       <!-------------form section start ------------->
       <section class="homeForm pt100 pb100 Loader">
           <img class=" modify-img "
               data-image-small="{{ asset('frontend/themes/cms/assets/images/static/landowner.svg') }}"
               data-image-large="{{ asset('frontend/themes/cms/assets/images/static/landowner.svg') }}"
               data-image-standard="{{ asset('frontend/themes/cms/assets/images/static/landowner.svg') }}" data-src=""
               src="{{ asset('frontend/themes/cms/assets/images/static/blur.jpg') }}" alt=""> <!-- 1366x700 -->
           <div class="container">
               <div class="row">

                   <div class="Flex">
                       <div class="homeForm__left col-md-7 anim boxOver">
                           <div class="homeForm__left__inner">
                               <img class=" modify-img "
                                   data-image-small="{{ asset('home/schedulemetting/' . $ScheduleMettings->image) }}"
                                   data-image-large="{{ asset('home/schedulemetting/' . $ScheduleMettings->image) }}"
                                   data-image-standard="{{ asset('home/schedulemetting/' . $ScheduleMettings->image) }}"
                                   data-src="{{ asset('home/schedulemetting/' . $ScheduleMettings->image) }}"
                                   src="{{ asset('home/schedulemetting/' . $ScheduleMettings->image) }}" alt="">
                               <!-- 670x500 -->
                           </div>
                       </div>


                       <div class="col-md-5 homeForm__right pl0">
                           <div class="homeForm__right__form">
                               <h2 class="Title anim textOver"><span><span>{{ $ScheduleMettings->title }}</span></span>
                               </h2>




                               <form id="schedule-a-meeting" class="dynamic_form "
                                   action="https://putulproperties.com/site/dynamic_form" method="post"
                                   data-pjax="false">
                                   <input type="hidden" name="_csrf-frontend"
                                       value="ZgA4YD8GyPpqra7NkpOxMiLbSk5HyznVoT7NmWeO9g4tbWkLVFT9ngfp45_K9u5EVL0mdwGoQbvQe7_XNfieSw==">
                                   <input type="hidden" id="schedule-a-meeting" class="form-control" name="form_id"
                                       value="schedule-a-meeting">



                                   <div
                                       class="form-message-container success_wrapper hide success_wrapper_schedule-a-meeting">
                                       <div class="form-message-body">
                                           <span class="success_container_schedule-a-meeting"></span>
                                       </div>
                                   </div>
                                   <div class="form-message-container error_wrapper hide error_wrapper_schedule-a-meeting">
                                       <div class="form-message-body">
                                           <span class="error_container_schedule-a-meeting"></span>
                                       </div>
                                   </div>
                                   <input type="text" name="Dynamicform[spam_protector]" style="display:none;">
                                   <div class="form-group">
                                       <input type="text" id="Dynamicform[full_name]" name="Dynamicform[full_name]"
                                           class="form-control" placeholder="Full Name*">
                                   </div>
                                   <div class="form-group">
                                       <input type="text" id="phone_number" name="Dynamicform[phone_number]"
                                           class="form-control" placeholder="Phone Number*">
                                   </div>
                                   <div class="form-group">
                                       <input type="email" id="email_address" name="Dynamicform[email_address]"
                                           class="form-control" placeholder="Email Address">
                                   </div>

                                   <div class="form-group Select">
                                       <select name="Dynamicform[time_slot]" id="time_slot">
                                           <option value="''"> Select a time</option>
                                           <option value="10AM">10AM</option>
                                           <option value="12PM">12PM</option>
                                           <option value="2PM">2PM</option>
                                           <option value="4PM">4PM</option>
                                           <option value="6PM">6PM</option>
                                       </select>
                                   </div>

                                   <div class="form-group">
                                       <button type="submit"
                                           class=" dynamic_submit_btn dcBtn"><span>submit</span></button>
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
