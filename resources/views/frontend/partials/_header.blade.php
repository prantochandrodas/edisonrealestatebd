<!--========fixed sections start========-->

<!--menubar-->
<header class="Header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 Header__left ">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{ asset('frontend/themes/cms/assets/images/static/logo-white.png') }}"
                                alt="" height="45 px" width="132 px">
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="menu-list">
                        <ul>
                            <li class="menu_items"><a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="menu_items"><a href="{{route('about.index')}}">About Us</a>
                                <ul>
                                    <li><a href="{{route('about.team.index')}}">Our Team</a></li>

                                    <li><a href="{{route('about.privacy-policy.index')}}">Privacy Policy</a></li>
                                </ul>
                            </li>
                            <li class="menu_items"><a href="{{route('projects.index')}}">Projects</a>
                                <ul>

                                    <li><a href="{{ route('projects.index', ['category' => 'ongoing']) }}">Ongoing</a>
                                    </li>



                                    <li><a href="{{ route('projects.index', ['category' => 'upcoming']) }}">Upcoming</a>
                                    </li>



                                    <li><a
                                            href="{{ route('projects.index', ['category' => 'completed']) }}">Completed</a>
                                    </li>


                                </ul>
                            </li>
                            <li class="menu_items"><a href="{{route('blog.index')}}">Blog</a>
                            </li>
                            <li class="menu_items"><a href="javascript:void(0)">Gallery</a>
                                <ul>

                                    <li><a href="{{route('newsletter.index')}}">Newsletter</a></li>



                                    <li><a href="{{route('image-gallery.index')}}">Image Gallery</a></li>



                                    <li><a href="{{route('video-gallery.index')}}">Video Gallery</a></li>


                                </ul>
                            </li>
                            <li class="menu_items"><a href="{{route('careers.index')}}">Career</a>
                            </li>
                            <li class="menu_items"><a href="{{route('contacts.index')}}">Contact</a>
                                <ul>
                                    <li><a href="javascript:void(0)" data-toggle="modal"
                                            data-target="#suggetions">Suggestion</a></li>
                                </ul>
                            </li>
                            <li class="menu_items"><a href="{{ route('landowners.index') }}">Landowner</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="Header__right ">
                        <a class="call-btn" href="tel:{{ $application->hotline }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.64" height="20"
                                viewBox="0 0 18.64 20">
                                <path id="Path_2218" data-name="Path 2218"
                                    d="M17.424,13.92c-1.208-1.033-2.434-1.659-3.628-.628l-.713.624c-.521.453-1.491,2.568-5.239-1.744S6.328,7.2,6.85,6.747l.716-.624c1.187-1.034.739-2.336-.117-3.676l-.517-.812C6.072.3,5.136-.58,3.946.453L3.3,1.015a6.037,6.037,0,0,0-2.353,4C.52,7.849,1.874,11.1,4.977,14.669S11.109,20.031,13.983,20a6.053,6.053,0,0,0,4.282-1.773l.645-.563c1.187-1.032.45-2.082-.759-3.118Z"
                                    transform="translate(-0.872 0)" fill="#f8f8f8" />
                            </svg>
                            {{ $application->hotline }}
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


<!------------- Menu items start ------------->
<section class="MenuItems">
    <!--    menu item -->
    <div class="container">
        <div class="MenuItems__top">

            <div class="MenuItems__top__bg">
                <ul>
                    <li class="modify-bg active" data-image-small="themes/cms/assets/images/static/menuBg.jpg"
                        data-image-large="themes/cms/assets/images/static/menuBg.jpg"
                        data-image-standard="themes/cms/assets/images/static/menuBg.jpg"
                        style="background-image: url('themes/cms/assets/images/static/blur.jpg');"></li>
                    <!--1170x450-->
                    <li class="modify-bg " data-image-small="admin/uploads/page/about-us/1920x562/1614763810PrYbs_s.jpg"
                        data-image-large="admin/uploads/page/about-us/1920x562/1614763810PrYbs_l.jpg"
                        data-image-standard="admin/uploads/page/about-us/1920x562/1614763810PrYbs_m.jpg"
                        style="background-image: url('themes/cms/assets/images/static/blur.jpg');"></li>
                    <!--1170x450-->
                    <li class="modify-bg " data-image-small="admin/uploads/page/projects/1920x562/1718271867Vy5Z1_s.jpg"
                        data-image-large="admin/uploads/page/projects/1920x562/1718271867Vy5Z1_l.jpg"
                        data-image-standard="admin/uploads/page/projects/1920x562/1718271867Vy5Z1_m.jpg"
                        style="background-image: url('themes/cms/assets/images/static/blur.jpg');"></li>
                    <!--1170x450-->
                    <li class="modify-bg " data-image-small="admin/uploads/page/blog/1920x562/1684333424hC1kj_s.jpg"
                        data-image-large="admin/uploads/page/blog/1920x562/1684333424hC1kj_l.jpg"
                        data-image-standard="admin/uploads/page/blog/1920x562/1684333424hC1kj_m.jpg"
                        style="background-image: url('themes/cms/assets/images/static/blur.jpg');"></li>
                    <!--1170x450-->
                    <li class="modify-bg " data-image-small="themes/cms/assets/images/static/menuBg.jpg"
                        data-image-large="themes/cms/assets/images/static/menuBg.jpg"
                        data-image-standard="themes/cms/assets/images/static/menuBg.jpg"
                        style="background-image: url('themes/cms/assets/images/static/blur.jpg');"></li>
                    <!--1170x450-->
                    <li class="modify-bg " data-image-small="admin/uploads/page/career/1920x562/1614763063ucuJb_s.jpg"
                        data-image-large="admin/uploads/page/career/1920x562/1614763063ucuJb_l.jpg"
                        data-image-standard="admin/uploads/page/career/1920x562/1614763063ucuJb_m.jpg"
                        style="background-image: url('themes/cms/assets/images/static/blur.jpg');"></li>
                    <!--1170x450-->
                    <li class="modify-bg "
                        data-image-small="admin/uploads/page/contact-us/1920x562/1614763491y3nFE_s.jpg"
                        data-image-large="admin/uploads/page/contact-us/1920x562/1614763491y3nFE_l.jpg"
                        data-image-standard="admin/uploads/page/contact-us/1920x562/1614763491y3nFE_m.jpg"
                        style="background-image: url('themes/cms/assets/images/static/blur.jpg');"></li>
                    <!--1170x450-->
                    <li class="modify-bg "
                        data-image-small="admin/uploads/page/landowner/1920x562/1701934264EnkdB_s.jpg"
                        data-image-large="admin/uploads/page/landowner/1920x562/1701934264EnkdB_l.jpg"
                        data-image-standard="admin/uploads/page/landowner/1920x562/1701934264EnkdB_m.jpg"
                        style="background-image: url('themes/cms/assets/images/static/blur.jpg');"></li>
                    <!--1170x450-->
                </ul>
            </div>
            <!-- single-->
            <div class="MenuItems__top__single">
                <a href="{{route('home')}}">Home</a>

            </div>
            <!-- single-->
            <div class="MenuItems__top__single">
                <a href="{{route('about.index')}}">About</a>

                <ul>

                    <li><a href="{{route('about.team.index')}}">Our Team</a></li>


                    <li><a href="{{route('about.privacy-policy.index')}}">Privacy Policy</a></li>

                </ul>
            </div>
            <!-- single-->
            <div class="MenuItems__top__single">
                <a href="{{route('projects.index')}}">Projects</a>

                <ul>

                    <li><a href="{{ route('projects.index', ['category' => 'ongoing']) }}">Ongoing</a></li>


                    <li><a href="{{ route('projects.index', ['category' => 'upcoming']) }}">Upcoming</a></li>


                    <li><a href="{{ route('projects.index', ['category' => 'completed']) }}">Completed</a></li>

                </ul>
            </div>
            <!-- single-->
            <div class="MenuItems__top__single">
                <a href="{{route('blog.index')}}">Blog</a>

            </div>
            <!-- single-->
            <div class="MenuItems__top__single">
                <a href="javascript:void(0)">Gallery</a>

                <ul>

                    <li><a href="{{route('newsletter.index')}}">Newsletter</a></li>


                    <li><a href="{{route('image-gallery.index')}}">Image Gallery</a></li>


                    <li><a href="{{route('video-gallery.index')}}">Video Gallery</a></li>

                </ul>
            </div>
            <!-- single-->
            <div class="MenuItems__top__single">
                <a href="{{route('careers.index')}}">Career</a>

            </div>
            <!-- single-->
            <div class="MenuItems__top__single">
                <a href="{{route('contacts.index')}}">Contact</a>

                <ul>

                    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#suggetions">Suggestion</a>
                    </li>


                </ul>
            </div>
            <!-- single-->
            <div class="MenuItems__top__single">
                <a href="{{ route('landowners.index') }}">Landowner</a>

            </div>

        </div>


        <div class="MenuItems__bottom">
            <div class="Footer__social col-md-12">
                <ul>
                    <li><a href="javascript:" style="background-image: url('assets/images/static/social.html')"></a>
                    </li>
                    <li><a href="javascript:" style="background-image: url('assets/images/static/social.html')"></a>
                    </li>
                    <li><a href="javascript:" style="background-image: url('assets/images/static/social.html')"></a>
                    </li>
                    <li><a href="javascript:" style="background-image: url('assets/images/static/social.html')"></a>
                    </li>
                    <li><a href="javascript:" style="background-image: url('assets/images/static/social.html')"></a>
                    </li>
                </ul>

            </div>
        </div>

    </div>

</section>
<!------------- Menu items end ------------->

<div class="modal fade careerModal" id="suggetions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content container">
            <div class="modal-header">
                <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>-->
                <!--                </button>-->
                <img src="{{ asset('/frontend/themes/cms/assets/images/static/modal-close.svg') }}"
                    class="modalClose" alt="" data-dismiss="modal" aria-label="Close">
            </div>
            <div class="modal-body">
                <div class="content_wrapper_width">
                    <h2 class="Title">Fill Up the Information</h2>
                    <div class="clear">

                    </div>
                    <div class="form_wrapper">




                        <form id="suggestion-form" class="dynamic_form "
                            action="https://edisonrealestatebd.com/site/dynamic_form" method="post"
                            data-pjax="false">
                            <input type="hidden" name="_csrf-frontend"
                                value="StdZoUSRlcwuaAt_2vFQh2NxXToKLvXjAGcxOzcHA6ABugjKL8OgqEMsRi2ClA_xFRcxA0xNjY1xIkN1ZXFr5Q==">
                            <input type="hidden" id="suggestion-form" class="form-control" name="form_id"
                                value="suggestion-form">



                            <div class="form-message-container success_wrapper hide success_wrapper_suggestion-form">
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
                                <button type="submit" class=" dynamic_submit_btn dcBtn"><span>submit</span></button>
                            </div>


                        </form>


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!--========fixed sections end========-->
