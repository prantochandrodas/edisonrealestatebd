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
                        <li data-index="rs-{{$item->id}}" class="dark" data-transition="slidingoverlayhorizontal"
                            data-slotamount="default" data-easein="Power1.easeInOut" data-easeout="default"
                            data-masterspeed="default" data-speed="1.5" data-thumb="" data-rotate="0"
                            data-saveperformance="off" data-title="your dream our passion" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{$item->image}}"
                                alt="" data-bgposition="bottom" data-bgfit="cover"
                                style="height: 100% !important;" data-bgrepeat="no-repeat" data-bgparallax="5"
                                class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                            <!--                        <div class="overlay"></div>-->


                            <div class="container">
                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption   tp-resizeme" id="slide-101-layer-{{$item->id}}" data-x="['left']"
                                    data-hoffset="['0']" data-y="['bottom','bottom','bottom','bottom']"
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
                                    <p class="h_title" style="margin-top: 0px !important;">{{$item->heading}}
                                    </p>
                                    <span style="font-size: 14px !important">{{$item->short_description}}</span>
                                    <br>
                                    <button class="custom-button">More Details</button>
                                </div>


                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption   tp-resizeme" id="slide-102-layer-{{$item->id}}" data-x="['left']"
                                    data-hoffset="['0']" data-y="['bottom','bottom','bottom','bottom']"
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
                        height="20" width="20"><span><a href="projects.html">Explore Projects
                        </a></span><img src="themes/cms/assets/images/static/caret.svg" alt=""
                        height="9 px" width="8 px">
                </li>
                <li><a href="projects/ongoingb907.html?&amp;type=%23&amp;location=%23">Ongoing</a>
                </li>
                <li><a href="projects/completedb907.html?&amp;type=%23&amp;location=%23">Completed</a>
                </li>
                <li><a href="projects/upcomingb907.html?&amp;type=%23&amp;location=%23">Upcoming</a>
                </li>
            </ul>
        </div>

    </div>
</section>

<!-----------------banner slider----------------->