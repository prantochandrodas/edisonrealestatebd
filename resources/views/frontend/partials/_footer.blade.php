 <!------------footer start ------------>

 <!-- Your Chat Plugin code -->
 <div class="fb-customerchat" attribution="install_email" attribution_version="biz_inbox" page_id="329218885142661">
 </div>
 <section class="Footer pt100 pb100 Loader">
     <img class=" modify-img " data-image-small="{{ asset('footer-background-image/' . $application->footer_bg_image) }}"
         data-image-large="{{ asset('footer-background-image/' . $application->footer_bg_image) }}"
         data-image-standard="{{ asset('footer-background-image/' . $application->footer_bg_image) }}" data-src=""
         src="{{ asset('frontend/themes/cms/assets/images/static/blur.jpg') }}" alt="">1366x550
     <div class="container ">
         <div class="row">
             <div class="col-md-5 Footer__top-left">
                 <img src="{{ asset('application/logo/' . $application->logo) }}" alt="">
                 <!--<p>HOTLINE: <a href="tel:16760">16760</a></p> -->
                 <p>HOTLINE: <a href="tel:{{ $application->hotline }}" target="_blank">{{ $application->hotline }}</a>
                 </p>
                 <p>EMAIL: <a href="mailto:{{ $application->email }}">{{ $application->email }}</a></p>
             </div>

             <div class="col-md-7 Footer__top-right">
                 <!-- <img class="logo_rehab" src="themes/cms/assets/images/static/rehab.jpg" alt=""> -->
             </div>
         </div>

         <div class="clearfix"></div>


         <div class="row">
             <div class="Footer__social col-md-12">
                 <ul>
                     @foreach ($socialLink as $item)
                         <li>
                             <a target="_blank" href="{{$item->url}}"
                                 style="background-image: url('{{ asset('application/social-link/'.$item->logo) }}')"></a>
                         </li>
                     @endforeach

                     {{-- <li>
                        <a target="_blank" href=""
                            style="background-image: url('{{asset('frontend/themes/cms/assets/images/static/social_icons.svg')}}')"></a>
                    </li>
                    <li>
                        <a target="_blank" href=""
                            style="background-image: url('{{asset('frontend/themes/cms/assets/images/static/social_icons.svg')}}')"></a>
                    </li>
                    <li>
                        <a target="_blank" href=""
                            style="background-image: url('{{asset('frontend/themes/cms/assets/images/static/social_icons.svg')}}')"></a>
                    </li> --}}

                 </ul>

             </div>

             <div class="Footer__copyright col-md-12">
                 <p>© 2024 {{ $application->company_name }}. All Rights Reserved. <a
                         href="https://www.stitbd.com/">Designed
                         &amp; Developed by STITBD</a></p>
             </div>

         </div>

     </div>
 </section>
 <!------------footer end ------------>
