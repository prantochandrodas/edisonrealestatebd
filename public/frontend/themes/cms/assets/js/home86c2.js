$(document).ready(function () {
    var windowWidth = $(window).width();
    var window_width = $(window).width();
    var TM = TweenMax;
    var tl = new TimelineMax();
    console.log('Designed & Developed by Dcastalia');
    $('body').prepend('<div class="Overlay"></div><div class="form-overlay"></div>');
    let vh = window.innerHeight * 0.01;

	
	 if(window.location.href.indexOf('#suggetions') != -1){
		 $('#suggetions').modal('show'); 
	 }else{
		  $('#browchure').modal('show');
	 }
	
	
   

    // Then we set the value in the --vh custom property to the root of the document
    document.documentElement.style.setProperty('--vh', `${vh}px`);




    //------------ Light gallery
    if ($('.Light').length > 0) {
        $(".Light").lightGallery({
            selector: 'a'
        });
    }

    //------------ Light gallery with thumbnail
    if ($('.LightThumb').length > 0) {
        $(".LightThumb").lightGallery({
            selector: 'a',
            exThumbImage: 'data-exthumbimage'
        });
    }

    //------------ nice select
    if ($('.Select').length > 0) {
        $('.Select select').niceSelect();
    }


    //------------ tab change in mobile using nice select
    $('.TabSelect').on('change', function (e) {
        $('.TabMenus li a').eq($(this).val()).tab('show');
    });


    //------ form validation
    $('form .dynamic_submit_btn').click(function () {
        $('.form-overlay').addClass('doit');
    });

    $(document).on('click', '.form-overlay.doit,.ok-class', function () {
        $('.form-overlay.doit, .form-message-container').hide();
    });

    $('.btn , button').click(function () {
        $('.form-overlay.doit, .form-message-container').removeAttr('style');
    });

    $('.dynamic_submit_btn').on('click', function () {
        setTimeout(function () {
            $('.form-overlay.doit').hide();
        }, 15000);
    });
    //------ form validation




    // sticky menu
    // screenPosition = 0;
    // $(window).scroll(function () {
    //     scrolled = $(window).scrollTop();
    //     if (screenPosition - scrolled > 0) {
    //         $(".Header").addClass("ShowIt").removeClass('HideIt').addClass('Bg');
    //     } else {
    //         $(".Header").removeClass("ShowIt").addClass('HideIt');
    //     }
    //     screenPosition = scrolled;
    // });
    // var first_section = $('.Header').position().top + 250;
    // $(window).scroll(function () {
    //     if ($(window).scrollTop() <= first_section) {
    //         $(".Header").removeClass("ShowIt").removeClass('Bg');
    //     }
    // });


    $(window).scroll(function () {
        if ($(window).scrollTop() > 2) {
            $('.Header').addClass('ShowIt').addClass('Bg');
        }else{
            $(".Header").removeClass("ShowIt").removeClass('Bg');
        }
    })




  //  get_halff = $(window).height() / 1.2;







    // scroll to section
    $('#ScrollTo').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
            location.hostname == this.hostname) {
            var $target = $(this.hash);
            $target = $target.length && $target ||
                $('[name=' + this.hash.slice(1) + ']');
            if ($target.length) {
                var targetOffset = $target.offset().top;
                $('html,body')
                    .animate({scrollTop: targetOffset}, 1000);
                return false;
            }
        }
    });


//============== message box start

    $(document).delegate('.msg_cont', 'click', function () {
        $('.msg_cont, .msg_icon').addClass('disabled')
        open_msg();

    });

    $(document).delegate('.msg_icon', 'click', function () {
        open_msg();
        $('.msg_cont, .msg_icon').addClass('disabled')
    });

    function open_msg() {
        $('.msg_cont_wrap').css({'width': '330px', 'height': '407px'});
        TM.to('.msg_cont', 0.2, {
            height: 580,
            width: 580,
            right: -86,
            bottom: -86,
            borderRadius: 290,
            background: 'rgba(255, 255, 255, 1)',
            onComplete: function () {

            }
        });

        TM.to('.msg_form', 0.5, {
            right: 0,
            delay: 0.2,
            onComplete: function () {
                $('.msg_cont_wrap').addClass('bx_shadow');
            }
        });

        $('.msg_cont_wrap').addClass('msg_opened');
        $('.msg_cont_wrap').removeClass('msg_closed');
    }

    $(document).delegate('.close_btn', 'click', function () {
        close_msg();
        $('.msg_cont, .msg_icon').removeClass('disabled')
    });

    function close_msg() {
        $('.msg_cont_wrap').removeClass('bx_shadow');

        if (window_width > 767) {
            var fromRight = 35
        } else {
            var fromRight = 20
        }

        TM.to('.msg_cont', 0.2, {
            width: '40',
            height: '40',
            right: fromRight,
            bottom: 23,
            borderRadius: '100%',
            background: '#0055A4',
            onComplete: function () {
                setTimeout(function () {
                    $('.msg_cont_wrap').css({'width': '95px', 'height': '90px'});

                }, 500);

            }
        });

        TM.to('.msg_form', 0.5, {
            right: -500
        });

        setTimeout(function () {
            $('.msg_cont_wrap').removeClass('msg_opened');
            $('.msg_cont_wrap').addClass('msg_closed');
        }, 500);
    }


    $('.msg_cont , .msg_icon').click(function () {
        $('.msg_cont_wrap .title').fadeIn(2000);
        $('.close_btn').fadeIn();
    })

    $('.close_btn').click(function () {
        $('.msg_cont_wrap .title,.close_btn').hide();
    })


    // line draw svg
    if ($('#LineAnim').length > 0) {
        new Vivus('LineAnim', {duration: 80});
    }

//============== message box end


//------------ rev slider
    var sliderHeight = $('.home-slider').outerHeight();
    if ($('#rev_slider_202_1').length > 0) {
        var tpj = jQuery;
        var revapi202;
        tpj(document).ready(function () {
            if (tpj('#rev_slider_202_1').revolution == undefined) {
                revslider_showDoubleJqueryError('#rev_slider_202_1');
            } else {
                revapi202 = tpj('#rev_slider_202_1').show().revolution({
                    sliderType: 'standard',
                    jsFileLocation: 'js',
                    sliderLayout: 'auto',
                    dottedOverlay: 'none',
                    delay: 3000,
                    navigation: {
                        bullets: {
                            enable: true,
                            style: 'persephone',
                        },
                    },
                    navigationType: "bullet",
                    navigationVAlign: "bottom",
                    navigationHAlign: "center",
                    responsiveLevels: [1600, 1537, 992, 700],
                    visibilityLevels: [1600, 1000, 750, 320],
                    gridwidth: [1300, 1000, 750, 320],
                    gridheight: [sliderHeight, sliderHeight, sliderHeight, sliderHeight],
                    lazyType: 'none',
                    shadow: 0,
                    spinner: 'off',
                    stopLoop: 'off',
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: 'off',
                    autoHeight: 'off',
                    fullScreenAutoWidth: 'off',
                    fullScreenAlignForce: 'off',
                    fullScreenOffsetContainer: '',
                    fullScreenOffset: '',
                    disableProgressBar: 'on',
                    hideThumbsOnMobile: 'off',
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: 'off',
                        nextSlideOnWindowFocus: 'on',
                        disableFocusListener: false,
                    }
                });

            }
        });
    }
//--------- rev slider end


    // feature project slider
    if ($('.ProjectSlider-init').length > 0) {
        $('.ProjectSlider-init').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            speed: 900,
            dots: false,
            pauseOnFocus: false,
            pauseOnHover: false,
            autoplay: false,
            arrows: true,
            prevArrow: '.goLeft',
            nextArrow: '.goRight',
            draggable: true,
            centerMode: true,
            accessibility: true,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: false,
                        draggable: true,
                        centerMode: false
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        draggable: true,
                        centerMode: false
                    }
                }
            ]
        });

        $('.ProjectSlider-init').slick('slickSetOption', 'slidesToScroll', 3, true);

    }

    //Home Testimonial Slider
    if ($('.ProjectSliderUpcoming-init').length > 0) {
        $('.ProjectSliderUpcoming-init').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            speed: 900,
            dots: false,
            pauseOnFocus: false,
            pauseOnHover: false,
            autoplay: false,
            arrows: true,
            prevArrow: '.goLeftUpcoming',
            nextArrow: '.goRightUpcoming',
            draggable: true,
            centerMode: false,
            accessibility: true,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: false,
                        draggable: true,
                        centerMode: false
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        draggable: true,
                        centerMode: false
                    }
                }
            ]
        });

        // $('.ProjectSlider-init').slick('slickSetOption', 'slidesToScroll', 3, true);

    }

    if ($('.ProjectSliderHandOver-init').length > 0) {
        $('.ProjectSliderHandOver-init').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            speed: 900,
            dots: false,
            pauseOnFocus: false,
            pauseOnHover: false,
            autoplay: false,
            arrows: true,
            prevArrow: '.goLeftHandOver',
            nextArrow: '.goRightHandOver',
            draggable: true,
            centerMode: false,
            accessibility: true,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: false,
                        draggable: true,
                        centerMode: false
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        draggable: true,
                        centerMode: false
                    }
                }
            ]
        });

        // $('.ProjectSlider-init').slick('slickSetOption', 'slidesToScroll', 3, true);

    }

    if ($('.testimonial-slider').length > 0) {
        $('.testimonial-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 900,
            dots: false,
            pauseOnFocus: false,
            pauseOnHover: false,
            autoplay: false,
            arrows: true,
            prevArrow: '.goLeftTestimonial',
            nextArrow: '.goRightTestimonial',
            draggable: true,
            centerMode: false,
            accessibility: true,
        });

        // $('.ProjectSlider-init').slick('slickSetOption', 'slidesToScroll', 3, true);

    }



    if(window_width < 992){
        if ($('.modal_slider_init').length > 0) {
            $('.modal_slider_init').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 900,
                dots: false,
                pauseOnFocus: false,
                pauseOnHover: false,
                autoplay: false,
                draggable: true,
                centerMode: false,
                accessibility: true,

            });

            $('.modal_slider_init').slick('slickSetOption', 'slidesToScroll', 3, true);

        }
    }


    // feature project slider
    if ($('.landOwner-init').length > 0) {
        $('.landOwner-init').slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 900,
            dots: true,
            pauseOnFocus: false,
            pauseOnHover: false,
            autoplay: false,
            arrows: false,
            draggable: true,

        });
    }


    //--------- count down
    // if ($('.count-it').length > 0) {
    //     var get_count = $('.homeForm').offset().top;
    //     $(window).scroll(function () {
    //         if ($(window).scrollTop() > get_count) {
    //             // count down
    //             $('.count-it').each(function () {
    //                 var $this = $(this),
    //                     countTo = $this.attr('data-count');
    //
    //                 $({countNum: $this.text()}).animate({
    //                         countNum: countTo
    //                     },
    //
    //                     {
    //                         duration: 900,
    //                         easing: 'linear',
    //                         step: function () {
    //                             $this.text(Math.floor(this.countNum));
    //                         },
    //                         complete: function () {
    //                             $this.text(this.countNum);
    //                             //alert('finished');
    //                         }
    //
    //                     });
    //             });
    //         }
    //     })
    // }





    function DataCounter(){
        $('.count-it').each(function(e){
            var start = $(this).attr("data-count-start");
            var end = $(this).attr("data-count");
            $(this).countTo({
                from: 0,
                to:end ,
                speed: 800,
                onComplete: null
            });
        })
    }
    var CheckOnce = false;

	if($('.homeForm__left__inner__content__count').length > 0){
	if(window_width > 1440) {
      // var count_offset = $('.homeForm__left__inner__content__count').offset().top / 1.5
    }else{
       // var count_offset = $('.homeForm__left__inner__content__count').offset().top / 1.2
    }	
		
		
		
	/*	  if ($('.homeForm__left__inner__content__count').length > 0) {
        $(window).scroll(function () {
            if ($(window).scrollTop() >= count_offset  ){
                if(CheckOnce == false) {
                    DataCounter();
                    CheckOnce = true;
                }

            }
        });
    }*/

	
	}

  





    //------- menu hamburger animation
    var menuLine = gsap.timeline({
        paused: true
    })
    menuLine.to('.hamburger span:nth-child(2)', {opacity: 0, ease: 'power1.out'})
    menuLine.to('.hamburger span:nth-child(3)', {
        duration: .4,
        rotation: -48,
        transformOrigin: '3px -1px',
        ease: 'power1.out',
        width:'28px'
    }, "-=.3");
    menuLine.to('.hamburger span:nth-child(1)', {
        duration: .4,
        rotation: 45,
        transformOrigin: '0px 4px',
        ease: 'power1.out',
        width:'29px'
    }, "-=.3");
    menuLine.reversed(true);

    $('.hamburger').click(function () {
        $(this).toggleClass('menuToggle')
        menuLine.reversed(!menuLine.reversed())
        if (menuLine.reversed()) {
            menuLine.reverse()
        } else {
            menuLine.play()
        }

        $('body').toggleClass('no-border no-msg no-scroll menuOpened')
        $('.MenuItems').fadeToggle(500);


    })








    // menu hover image change
    $('.MenuItems__top__single').each(function (e) {
        let $this = $(this);
        $this.hover(function () {
                $('.MenuItems__top__bg').addClass('bg-position');
                $('.MenuItems__top__bg li').css({'opacity':0})
                $('.MenuItems__top__bg li').eq(e).css({'opacity':1})
            },
            function () {
                $('.MenuItems__top__bg li').css({'opacity':0})
                $('.MenuItems__top__bg').removeClass('bg-position');
            }
        )
    })


    // menu click on mobile
    if(1005 > window_width){
        $('.MenuItems__top__single').each(function () {
            $this = $(this);
            if ($this.find('ul').length > 0) {
                $this.addClass('hasChild')
            }
        });

        $('.hasChild').on('click', function () {
            var $this_ul = $(this).find('ul'),
                $this = $(this);
            $('.hasChild ul').not($this_ul).slideUp()
            $('.hasChild').not($this).removeClass('active')
            $this_ul.slideToggle()
            $this.toggleClass('active')
        });
    }


    // disable scroll
    $('.MenuItems ,.Header').bind('mousewheel DOMMouseScroll hover touchmove', function(e) {
        var scrollTo = null;

        if (e.type == 'mousewheel') {
            scrollTo = (e.originalEvent.wheelDelta * -1);
        }
        else if (e.type == 'DOMMouseScroll') {
            scrollTo = 40 * e.originalEvent.detail;
        }

        if (scrollTo) {
            e.preventDefault();
            $(this).scrollTop(scrollTo + $(this).scrollTop());
        }
    });



    // product transition
    if(window_width > 768){

        function ProjectHover(){
            let Parents = $('.Project__slider-wrap__single__inner__content__slide__inner p');
            Parents.each(function () {
                let get_p = $(this);
                Parents.map( (i)=> {
                    return   get_p.eq(i).css({'margin-bottom': - get_p.eq(i).height() })

                })
            })
        }
        ProjectHover()
    }


    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && window['safari'].pushNotification));
    console.log(isSafari)







    // var get_halff = $(window).height() / 1.2;
    // console.log(get_halff);
    // if($('.Project').length > 0){
    //
    //     $(window).scroll(function () {
    //         var w_scroll = $(window).scrollTop();
    //         if (w_scroll >  $('.Project').offset().top - get_halff) {
    //             console.log('click');
    //             var tabindex = 0;
    //          //   $('.tabindexClick').trigger('click');
    //             $('.tabindexClick').attr("tabindex", tabindex);
    //
    //         }
    //     })
    //
    //
    // }
});//document.ready


//------------ Device Image
function deviceImage() {
    // window min width 1401 -- large screen
    var window_width = $(window).width();
    if (1400 < window_width) {
        $('.modify-bg').each(function () {
            var large = $(this).attr('data-image-large');
            $(this).css('background-image', "url(" + large + ")");
        });
    }
    // window max-width 1400 -- standard screen
    if (1400 >= window_width && 992 <= window_width) {
        $('.modify-bg').each(function () {
            var standard = $(this).attr('data-image-standard');
            $(this).css('background-image', "url(" + standard + ")");
        });
    }
    // window max-width 991 -- mobile device
    if (991 >= window_width) {
        $('.modify-bg').each(function () {
            var small = $(this).attr('data-image-small');
            $(this).css('background-image', "url(" + small + ")");
        });
    }
}

deviceImage();


