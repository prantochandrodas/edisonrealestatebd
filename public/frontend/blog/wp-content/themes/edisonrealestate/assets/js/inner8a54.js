jQuery(document).ready(function () {
    var windowWidth = jQuery(window).width();
    var window_width = jQuery(window).width();
    var w_scroll = jQuery(window).scrollTop();
    var get_first = jQuery('.home-slider'),
        get_half = jQuery(window).height() / 1.2;
    var TM = TweenMax;
    var tl = new TimelineMax();
    console.log('Designed & Developed by Dcastalia');
    jQuery('body').prepend('<div class="Overlay"></div><div class="form-overlay"></div>');


    //------------ Light gallery
    if (jQuery('.Light').length > 0) {
        jQuery(".Light").lightGallery({
            selector: 'a',
            download: false,
            thumbnail: false
        });
    }


    //------------ Light gallery with thumbnail
    if (jQuery('.LightThumb').length > 0) {
        jQuery(".Light").lightGallery({
            selector: 'a',
            exThumbImage: 'data-exthumbimage',
            thumbnail: true
        });
    }

    //------------ nice select
    if (jQuery('.Select').length > 0) {
        jQuery('.Select select').niceSelect();
    }


    //------------ tab change in mobile using nice select
    jQuery('.TabSelect').on('change', function (e) {
        jQuery('.TabMenus li a').eq(jQuery(this).val()).tab('show');
    });


    //------ form validation
    jQuery('form .dynamic_submit_btn').click(function () {
        jQuery('.form-overlay').addClass('doit');
    });

    jQuery(document).on('click', '.form-overlay.doit,.ok-class', function () {
        jQuery('.form-overlay.doit, .form-message-container').hide();
    });

    jQuery('.btn , button').click(function () {
        jQuery('.form-overlay.doit, .form-message-container').removeAttr('style');
    });

    jQuery('.dynamic_submit_btn').on('click', function () {
        setTimeout(function () {
            jQuery('.form-overlay.doit').hide();
        }, 15000);
    });
    //------ form validation


    // faq expand
    jQuery('.Faq__content__single').each(function () {
        jQuery(this).find('.Faq__content__single__title').click(function () {
            jQuery(".Faq__content__single__title").not(this).next('div').slideUp();
            jQuery(".Faq__content__single__title").not(this).parent().removeClass('expand')
            jQuery(this).next('div').slideToggle(function () {
                // jQuery(this).parent().removeClass('open')
                jQuery('.Faq__content__single').removeClass('open')
            })
            if (jQuery(this).parent().hasClass('open')) {
                jQuery(this).parent().toggleClass('')
            } else {
                jQuery(this).parent().toggleClass('expand')
            }
        })
    })
    // FAQ Section end


    // sticky menu
    // screenPosition = 0;
    // jQuery(window).scroll(function () {
    //     scrolled = jQuery(window).scrollTop();
    //     if (screenPosition - scrolled > 0) {
    //         jQuery(".Header").addClass("ShowIt").removeClass('HideIt').addClass('Bg');
    //     } else {
    //         jQuery(".Header").removeClass("ShowIt").addClass('HideIt');
    //     }
    //     screenPosition = scrolled;
    // });
    // var first_section = jQuery('.Header').position().top + 250;
    // jQuery(window).scroll(function () {
    //     if (jQuery(window).scrollTop() <= first_section) {
    //         jQuery(".Header").removeClass("ShowIt").removeClass('Bg');
    //     }
    // });


    jQuery(window).scroll(function () {
        if (jQuery(window).scrollTop() > 2) {
            jQuery('.Header').addClass('ShowIt').addClass('Bg');
        } else {
            jQuery(".Header").removeClass("ShowIt").removeClass('Bg');
        }
    })


    //============== message box start

    jQuery(document).delegate('.msg_cont', 'click', function () {
        open_msg();
        jQuery(this).attr('disabled', 'disabled')
    });

    jQuery(document).delegate('.msg_icon', 'click', function () {
        open_msg();
        jQuery(this).attr('disabled', 'disabled')
    });

    function open_msg() {
        jQuery('.msg_cont_wrap').css({'width': '330px', 'height': '446px'});
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
                jQuery('.msg_cont_wrap').addClass('bx_shadow');
            }
        });

        jQuery('.msg_cont_wrap').addClass('msg_opened');
        jQuery('.msg_cont_wrap').removeClass('msg_closed');
    }

    jQuery(document).delegate('.close_btn', 'click', function () {
        close_msg();

    });

    function close_msg() {
        jQuery('.msg_cont_wrap').removeClass('bx_shadow');

        TM.to('.msg_cont', 0.2, {
            width: '50px',
            height: '50px',
            right: 35,
            bottom: 8,
            borderRadius: '100%',
            background: '#008C44',
            onComplete: function () {
                setTimeout(function () {
                    jQuery('.msg_cont_wrap').css({'width': '120px', 'height': '120px'});

                }, 500);

            }
        });

        TM.to('.msg_form', 0.5, {
            right: -500
        });

        setTimeout(function () {
            jQuery('.msg_cont_wrap').removeClass('msg_opened');
            jQuery('.msg_cont_wrap').addClass('msg_closed');
        }, 500);
    }


    jQuery('.msg_cont , .msg_icon').click(function () {
        jQuery('.msg_cont_wrap .title').fadeIn(2000);
        jQuery('.close_btn').fadeIn();
    })

    jQuery('.close_btn').click(function () {
        jQuery('.msg_cont_wrap .title,.close_btn').hide();
    })


    // line draw svg
    if (jQuery('#LineAnim').length > 0) {
        new Vivus('LineAnim', {duration: 80});
    }


//============== message box end


    //------- menu hamburger animation
    var menuLine = gsap.timeline({
        paused: true
    })
    menuLine.to('.Header__right span:nth-child(2)', {opacity: 0, ease: 'power1.out'})
    menuLine.to('.Header__right span:nth-child(3)', {
        duration: .4,
        rotation: -48,
        transformOrigin: '3px -1px',
        ease: 'power1.out',
        width: '28px'
    }, "-=.3");
    menuLine.to('.Header__right span:nth-child(1)', {
        duration: .4,
        rotation: 45,
        transformOrigin: '0px 4px',
        ease: 'power1.out',
        width: '29px'
    }, "-=.3");
    menuLine.reversed(true);

    jQuery('.Header__right').click(function () {
        jQuery(this).toggleClass('menuToggle')
        menuLine.reversed(!menuLine.reversed())
        if (menuLine.reversed()) {
            menuLine.reverse()
        } else {
            menuLine.play()
        }

        jQuery('body').toggleClass('no-border no-msg no-scroll menuOpened')
        jQuery('.MenuItems').fadeToggle(500);

    })


    // menu hover image change
    jQuery('.MenuItems__top__single').each(function (e) {
        let jQuerythis = jQuery(this);
        jQuerythis.hover(function () {
                jQuery('.MenuItems__top__bg').addClass('bg-position');
                jQuery('.MenuItems__top__bg li').css({'opacity': 0})
                jQuery('.MenuItems__top__bg li').eq(e).css({'opacity': 1})
            },
            function () {
                jQuery('.MenuItems__top__bg li').css({'opacity': 0})
                jQuery('.MenuItems__top__bg').removeClass('bg-position');
            }
        )
    })


    // menu click on mobile
    if (767 > window_width) {
        jQuery('.MenuItems__top__single').each(function () {
            jQuerythis = jQuery(this);
            if (jQuerythis.find('ul').length > 0) {
                jQuerythis.addClass('hasChild')
            }
        });

        jQuery('.hasChild').on('click', function () {
            var jQuerythis_ul = jQuery(this).find('ul'),
                jQuerythis = jQuery(this);
            jQuery('.hasChild ul').not(jQuerythis_ul).slideUp()
            jQuery('.hasChild').not(jQuerythis).removeClass('active')
            jQuerythis_ul.slideToggle()
            jQuerythis.toggleClass('active')
        });
    }


    // disable scroll
    jQuery('.MenuItems ,.Header').bind('mousewheel DOMMouseScroll hover touchmove', function (e) {
        var scrollTo = null;

        if (e.type == 'mousewheel') {
            scrollTo = (e.originalEvent.wheelDelta * -1);
        } else if (e.type == 'DOMMouseScroll') {
            scrollTo = 40 * e.originalEvent.detail;
        }

        if (scrollTo) {
            e.preventDefault();
            jQuery(this).scrollTop(scrollTo + jQuery(this).scrollTop());
        }
    });


    setTimeout(function () {
        jQuery('.banner-loader').addClass('Loaded')
    }, 1000)


    setTimeout(function () {
        jQuery('.Project-detail-banner').addClass('Loaded')
    }, 200)


    // project detail banner slide
    if (jQuery('.top-slider-init').length > 0) {
        if (window_width > 767) {
            jQuery('.top-slider-init').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 900,
                dots: false,
                pauseOnFocus: false,
                pauseOnHover: false,
                autoplay: false,
                arrows: false,
                draggable: true,
                asNavFor: '.bottom-slider-init',
            });
        } else {
            jQuery('.top-slider-init').slick({
                infinite: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 900,
                dots: true,
                pauseOnFocus: false,
                pauseOnHover: false,
                draggable: true,
                autoplay: true,
                autoplaySpeed: 2500
            });
        }

    }

    if (jQuery('.bottom-slider-init').length > 0) {
        jQuery('.bottom-slider-init').slick({
            infinite: true,
            slidesToShow: 7,
            slidesToScroll: 1,
            speed: 900,
            dots: false,
            pauseOnFocus: false,
            pauseOnHover: false,
            autoplay: false,
            arrows: false,
            draggable: false,
            asNavFor: '.top-slider-init',
            centerMode: true,
            focusOnSelect: true,
            centerPadding: 0,

        });
    }


    // features and amenities slider
    if (jQuery('.TextSlider-init').length > 0) {
        jQuery('.TextSlider-init').slick({
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 2,
            speed: 900,
            dots: true,
            pauseOnFocus: false,
            pauseOnHover: false,
            autoplay: false,
            arrows: false,
            draggable: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: false,
                        dots: true,
                        draggable: true
                    }
                }


            ]
        });
    }




    if (jQuery('.promotion_init').length > 0) {
        jQuery('.promotion_init').slick({
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 2,
            speed: 900,
            dots: false,
            pauseOnFocus: false,
            pauseOnHover: false,
            autoplay: false,
            arrows: true,
            draggable: true,
            prevArrow: '.navleft',
            nextArrow: '.navright',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        centerMode: false,
                        dots: true,
                        arrows: false,
                        draggable: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: false,
                        dots: true,
                        arrows:false,
                        draggable: true
                    }
                }



            ]
        });
    }


    // feature project slider
    if (jQuery(' .Projects .ProjectSlider-init').length > 0) {
        jQuery(' .Projects .ProjectSlider-init').slick({
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
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: false,
                        draggable: true,
                        centerMode: true,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        draggable: true,
                        centerMode: true,
                    }
                }
            ]
        });

        jQuery('.ProjectSlider-init').slick('slickSetOption', 'slidesToScroll', 3, true);

    }


    // feature project slider
    if (jQuery(' .asTeam .ProjectSlider-init').length > 0) {
        jQuery(' .asTeam .ProjectSlider-init').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
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
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        draggable: true,
                        centerMode: false,
                    }
                }
            ]
        });

        jQuery('.ProjectSlider-init').slick('slickSetOption', 'slidesToScroll', 3, true);

    }


    //-------- progressbar
    let getProgress = jQuery('.Progress__bar__line span').attr('data-progress');
    if (getProgress === '100') {
        jQuery('.Progress__bar__end').addClass('fully')
        jQuery('.Progress').addClass('fully-wrap')
    }
    jQuery('.Progress__bar__line span:nth-child(1)').css('width', `jQuery{getProgress}%`);
    jQuery('.Progress__bar__line span:nth-child(2)').css('left', `jQuery{getProgress}%`);

    jQuery('.Progress__bar__line span:nth-child(2)').click(function () {
        jQuery('.Progress__bar__popup').fadeToggle()
    });


    //-------- banner scroll pin

    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) {
        return p.toString() === "[object SafariRemoteNotification]";
    })(!window['safari'] || (typeof safari !== 'undefined' && window['safari'].pushNotification));


    if (window_width > 768 && !isSafari) {
        if (jQuery('.Project-detail-banner__left').length > 0) {
            ScrollTrigger.create({
                trigger: '.Project-detail-banner__left',
                endTrigger: '.Specification',
                start: 'center center',
                end: () => {
                    const height = window.innerHeight;
                    const chartHeight = document.querySelector('.Project-detail-banner__left').offsetHeight;
                    return `bottom jQuery{chartHeight + (height - chartHeight) / 2}px`;
                },
                pin: true,
                pinSpacing: false
            });
        }
    }


    if (window_width > 991) {
        if (isSafari) {
            jQuery('.Project-detail-banner').addClass('isSafari');
            jQuery('.scrolls').css('height', '100vh')

            if (jQuery('.scrolls').length > 0) {
                jQuery(".scrolls").customScrollbar();
            }


            let Get_left = jQuery('.container').offset().left + 15;

            if (jQuery('.overview').length > 0) {
                jQuery('.overview').css('padding-right', Get_left + 15)
            }
        }

    }


    // mobile gallery
    if (window_width < 768) {
        jQuery('.MobileLight').prepend('<div class="MobileGallery">view all photos</div>');
        jQuery('.MobileGallery').on('click', function () {
            jQuery('.MobileLight .modify-bg').eq(1).click()
        })
        // light gallery mobile
        if (jQuery('.MobileLight').length > 0) {
            jQuery(".MobileLight").lightGallery({
                selector: '.modify-bg',
                thumbnail: true,
                exThumbImage: 'data-src',
            });
        }
    }


    if (window_width > 767) {
        let Get_left = jQuery('.container').offset().left + 15;

        if (jQuery('.Location_map').length > 0) {
            jQuery('.Location_map_load .Location_map__address').css('padding-left', Get_left + 15)
        }
        if (jQuery('.ListingFour ').length > 0) {
            jQuery('.ListingFour__single__left').css('padding-left', Get_left)
        }
        if (jQuery('.ChairmanMessageText__right ').length > 0) {
            jQuery('.ChairmanMessageText__right').css('padding-right', Get_left + 15)
            jQuery('.ChairmanMessageText__left').css('padding-left', Get_left + 15)
        }

        if (jQuery('.timeline__slider-bg__item__content ').length > 0) {
            jQuery('.timeline__slider-bg__item__content').css('left', Get_left)
            jQuery('.timeline__slider-bg__item__content').css('left', Get_left)
        }

        if (jQuery('.Location_map__address ').length > 0) {
            jQuery('.Location_map__address').css('padding-left', Get_left + 15)
        }

        if (jQuery('.Project-detail-banner__right').length > 0) {
            jQuery('.Project-detail-banner__right').css('padding-right', Get_left + 15)
        }

    }


    // location map
    // if(jQuery('.Location_map_load').length > 0){
    //     // map
    //     let get_offset = jQuery('.Location_map').offset().top,
    //         get_start = jQuery(window).height() / 1.01,
    //         CheckOnce = false;
    //     jQuery(window).scroll(function () {
    //         if (jQuery(window).scrollTop() > get_offset - get_start) {
    //             if (CheckOnce === false) {
    //                 initMap();
    //                 CheckOnce = true;
    //             }
    //         }
    //     })
    // }


    // project detail


    if (jQuery('.slider-for').length > 0) {

        jQuery('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            speed: 1000,
            // fade: true,
            asNavFor: '.slider-nav',
            infinite: false,
            prevArrow: jQuery('#prev'),
            nextArrow: jQuery('#next')
        });

        jQuery('.slider-nav').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            centerMode: true,
            focusOnSelect: true,
            infinite: false,
            speed: 900,
            variableWidth: true,
            draggable: false
        });


        // on hover action
        jQuery('.full-nav-wrapper').each(function () {
            jQuery(this).hover(function () {
                jQuery(this).addClass('hover-on-it');
            }, function () {
                jQuery('.full-nav-wrapper').removeClass('hover-on-it')
            })
        });

        jQuery('.full-nav-wrapper').hover(function () {
            jQuery('.timeline__nav').find('.slick-current').addClass('remove-title');
        }, function () {
            jQuery('.timeline__nav').find('.slick-current').removeClass('remove-title');
        });

        // first laod animation
        setTimeout(function () {
            jQuery('.slick-current').find('.timeline__slider-bg__item__content__loader').addClass('stop_zoom').removeClass('do_zoom');
        }, 1000);
        setTimeout(function () {
            jQuery('.slick-current').find('.timeline__slider-bg__item__content__zoom,.timeline__slider-bg__item__content__loader').addClass('do_zoom').removeClass('stop_zoom');
        }, 2000);

        // on change fire function
        jQuery('.slider-for').on('afterChange', function () {
            jQuery(".timeline__slider-bg__item__content__zoom,.timeline__slider-bg__item__content__loader").removeClass('do_zoom');
            setTimeout(function () {
                jQuery('.slick-current').find('.timeline__slider-bg__item__content__loader').addClass('stop_zoom').removeClass('do_zoom');
            }, 300);
            setTimeout(function () {
                jQuery('.slick-current').find('.timeline__slider-bg__item__content__zoom,.timeline__slider-bg__item__content__loader').addClass('do_zoom').removeClass('stop_zoom');
            }, 1200);
        });
    }


    // product transition


    function projecthover() {
        if (window_width > 768) {
            let Parents = jQuery('.Project__slider-wrap__single__inner__content__slide__inner p');
            Parents.each(function () {
                let get_p = jQuery(this);
                Parents.map((i) => {
                    return get_p.eq(i).css({'margin-bottom': -get_p.eq(i).height()})

                })
            })
        }
    }

    projecthover()


});//document.ready


//------------ Device Image with background image
function deviceImage() {
    // window min width 1401 -- large screen
    var window_width = jQuery(window).width();
    if (1400 < window_width) {
        jQuery('.modify-bg').each(function () {
            var large = jQuery(this).attr('data-image-large');
            jQuery(this).css('background-image', "url(" + large + ")");
        });
        console.log('large');
    }
    // window max-width 1400 -- standard screen
    if (1400 >= window_width && 992 <= window_width) {
        jQuery('.modify-bg').each(function () {
            var standard = jQuery(this).attr('data-image-standard');
            jQuery(this).css('background-image', "url(" + standard + ")");
        });
        console.log('standard');
    }
    // window max-width 991 -- mobile device
    if (991 >= window_width) {
        jQuery('.modify-bg').each(function () {
            var small = jQuery(this).attr('data-image-small');
            jQuery(this).css('background-image', "url(" + small + ")");
        });
        console.log('small');
    }
}

deviceImage();


