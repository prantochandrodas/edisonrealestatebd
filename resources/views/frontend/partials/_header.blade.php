<!--========fixed sections start========-->

<!--menubar-->
<header class="Header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 Header__left ">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="/edisonrealestatebd.com/index.html">
                            <img src="{{ asset('frontend/themes/cms/assets/images/static/logo-white.png') }}"
                                alt="" height="45 px" width="132 px">
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="menu-list">
                        <ul>
                            <li class="menu_items"><a href="/">Home</a>
                            </li>
                            <li class="menu_items"><a href="/about-us">About Us</a>
                                <ul>
                                    <li><a href="/about-us/team">Our Team</a></li>

                                    <li><a href="/about-us/privacy-policy">Privacy Policy</a></li>
                                </ul>
                            </li>
                            <li class="menu_items"><a href="/projects">Projects</a>
                                <ul>

                                    <li><a href="{{route('projects.index',['category' => 'ongoing'])}}">Ongoing</a>
                                    </li>



                                    <li><a href="{{route('projects.index',['category' => 'upcoming'])}}">Upcoming</a>
                                    </li>



                                    <li><a href="{{route('projects.index',['category' => 'completed'])}}">Completed</a>
                                    </li>


                                </ul>
                            </li>
                            <li class="menu_items"><a href="/blogs">Blog</a>
                            </li>
                            <li class="menu_items"><a href="javascript:void(0)">Gallery</a>
                                <ul>

                                    <li><a href="/newsletter">Newsletter</a></li>



                                    <li><a href="/image-gallery">Image Gallery</a></li>



                                    <li><a href="video-gallery.html">Video Gallery</a></li>


                                </ul>
                            </li>
                            <li class="menu_items"><a href="career.html">Career</a>
                            </li>
                            <li class="menu_items"><a href="contact-us.html">Contact</a>
                                <ul>

                                    <li><a href="javascript:void(0)" data-toggle="modal"
                                            data-target="#suggetions">Suggestion</a></li>


                                </ul>
                            </li>
                            <li class="menu_items"><a href="landowner.html">Landowner</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="Header__right ">
                        <a class="call-btn" href="tel:01310817493">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.64" height="20"
                                viewBox="0 0 18.64 20">
                                <path id="Path_2218" data-name="Path 2218"
                                    d="M17.424,13.92c-1.208-1.033-2.434-1.659-3.628-.628l-.713.624c-.521.453-1.491,2.568-5.239-1.744S6.328,7.2,6.85,6.747l.716-.624c1.187-1.034.739-2.336-.117-3.676l-.517-.812C6.072.3,5.136-.58,3.946.453L3.3,1.015a6.037,6.037,0,0,0-2.353,4C.52,7.849,1.874,11.1,4.977,14.669S11.109,20.031,13.983,20a6.053,6.053,0,0,0,4.282-1.773l.645-.563c1.187-1.032.45-2.082-.759-3.118Z"
                                    transform="translate(-0.872 0)" fill="#f8f8f8" />
                            </svg>
                            01310817493
                        </a>
                    </div>
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>



            </div>
        </div>



    </div>
</header>


<!--========fixed sections end========-->
