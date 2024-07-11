$(document).ready(function () {
   var windowWidth = $(window).width();
   var window_width = $(window).width();
   var w_scroll = $(window).scrollTop();
   var get_first = $(".home-slider"),
      get_half = $(window).height() / 1.2;
   var TM = TweenMax;
   var tl = new TimelineMax();
   console.log("Designed & Developed by Dcastalia");
   $("body").prepend('<div class="Overlay"></div><div class="form-overlay"></div>');

   //------------ Light gallery
   if ($(".Light").length > 0) {
      $(".Light").lightGallery({
         selector: "a",
         download: false,
         thumbnail: false,
      });
   }

   //------------ Light gallery with thumbnail
   if ($(".LightThumb").length > 0) {
      $(".Light").lightGallery({
         selector: "a",
         exThumbImage: "data-exthumbimage",
         thumbnail: true,
      });
   }

   //------------ nice select
   if ($(".Select").length > 0) {
      $(".Select select").niceSelect();
   }

   //------------ tab change in mobile using nice select
   $(".TabSelect").on("change", function (e) {
      $(".TabMenus li a").eq($(this).val()).tab("show");
   });

   //------ form validation
   $("form .dynamic_submit_btn").click(function () {
      $(".form-overlay").addClass("doit");
   });

   $(document).on("click", ".form-overlay.doit,.ok-class", function () {
      $(".form-overlay.doit, .form-message-container").hide();
   });

   $(".btn , button").click(function () {
      $(".form-overlay.doit, .form-message-container").removeAttr("style");
   });

   $(".dynamic_submit_btn").on("click", function () {
      setTimeout(function () {
         $(".form-overlay.doit").hide();
      }, 15000);
   });
   //------ form validation

   // faq expand
   $(".Faq__content__single").each(function () {
      $(this)
         .find(".Faq__content__single__title")
         .click(function () {
            $(".Faq__content__single__title").not(this).next("div").slideUp();
            $(".Faq__content__single__title").not(this).parent().removeClass("expand");
            $(this)
               .next("div")
               .slideToggle(function () {
                  // $(this).parent().removeClass('open')
                  $(".Faq__content__single").removeClass("open");
               });
            if ($(this).parent().hasClass("open")) {
               $(this).parent().toggleClass("");
            } else {
               $(this).parent().toggleClass("expand");
            }
         });
   });
   // FAQ Section end

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
         $(".Header").addClass("ShowIt").addClass("Bg");
      } else {
         $(".Header").removeClass("ShowIt").removeClass("Bg");
      }
   });

   //============== message box start

   $(document).delegate(".msg_cont", "click", function () {
      open_msg();
      $(this).attr("disabled", "disabled");
   });

   $(document).delegate(".msg_icon", "click", function () {
      open_msg();
      $(this).attr("disabled", "disabled");
   });

   function open_msg() {
      $(".msg_cont_wrap").css({ width: "330px", height: "446px" });
      TM.to(".msg_cont", 0.2, {
         height: 580,
         width: 580,
         right: -86,
         bottom: -86,
         borderRadius: 290,
         background: "rgba(255, 255, 255, 1)",
         onComplete: function () {},
      });

      TM.to(".msg_form", 0.5, {
         right: 0,
         delay: 0.2,
         onComplete: function () {
            $(".msg_cont_wrap").addClass("bx_shadow");
         },
      });

      $(".msg_cont_wrap").addClass("msg_opened");
      $(".msg_cont_wrap").removeClass("msg_closed");
   }

   $(document).delegate(".close_btn", "click", function () {
      close_msg();
   });

   function close_msg() {
      $(".msg_cont_wrap").removeClass("bx_shadow");

      TM.to(".msg_cont", 0.2, {
         width: "50px",
         height: "50px",
         right: 35,
         bottom: 8,
         borderRadius: "100%",
         background: "#008C44",
         onComplete: function () {
            setTimeout(function () {
               $(".msg_cont_wrap").css({ width: "120px", height: "120px" });
            }, 500);
         },
      });

      TM.to(".msg_form", 0.5, {
         right: -500,
      });

      setTimeout(function () {
         $(".msg_cont_wrap").removeClass("msg_opened");
         $(".msg_cont_wrap").addClass("msg_closed");
      }, 500);
   }

   $(".msg_cont , .msg_icon").click(function () {
      $(".msg_cont_wrap .title").fadeIn(2000);
      $(".close_btn").fadeIn();
   });

   $(".close_btn").click(function () {
      $(".msg_cont_wrap .title,.close_btn").hide();
   });

   // line draw svg
   if ($("#LineAnim").length > 0) {
      new Vivus("LineAnim", { duration: 80 });
   }

   //============== message box end

   //------- menu hamburger animation
   var menuLine = gsap.timeline({
      paused: true,
   });
   menuLine.to(".hamburger span:nth-child(2)", { opacity: 0, ease: "power1.out" });
   menuLine.to(
      ".hamburger span:nth-child(3)",
      {
         duration: 0.4,
         rotation: -48,
         transformOrigin: "3px -1px",
         ease: "power1.out",
         width: "28px",
      },
      "-=.3"
   );
   menuLine.to(
      ".hamburger span:nth-child(1)",
      {
         duration: 0.4,
         rotation: 45,
         transformOrigin: "0px 4px",
         ease: "power1.out",
         width: "29px",
      },
      "-=.3"
   );
   menuLine.reversed(true);

   $(".hamburger").click(function () {
      $(this).toggleClass("menuToggle");
      menuLine.reversed(!menuLine.reversed());
      if (menuLine.reversed()) {
         menuLine.reverse();
      } else {
         menuLine.play();
      }

      $("body").toggleClass("no-border no-msg no-scroll menuOpened");
      $(".MenuItems").fadeToggle(500);
   });

   // menu hover image change
   $(".MenuItems__top__single").each(function (e) {
      let $this = $(this);
      $this.hover(
         function () {
            $(".MenuItems__top__bg").addClass("bg-position");
            $(".MenuItems__top__bg li").css({ opacity: 0 });
            $(".MenuItems__top__bg li").eq(e).css({ opacity: 1 });
         },
         function () {
            $(".MenuItems__top__bg li").css({ opacity: 0 });
            $(".MenuItems__top__bg").removeClass("bg-position");
         }
      );
   });

   // menu click on mobile
   if (1005 > window_width) {
      $(".MenuItems__top__single").each(function () {
         $this = $(this);
         if ($this.find("ul").length > 0) {
            $this.addClass("hasChild");
         }
      });

      $(".hasChild").on("click", function () {
         var $this_ul = $(this).find("ul"),
            $this = $(this);
         $(".hasChild ul").not($this_ul).slideUp();
         $(".hasChild").not($this).removeClass("active");
         $this_ul.slideToggle();
         $this.toggleClass("active");
      });
   }

   // disable scroll
   $(".MenuItems ,.Header").bind("mousewheel DOMMouseScroll hover touchmove", function (e) {
      var scrollTo = null;

      if (e.type == "mousewheel") {
         scrollTo = e.originalEvent.wheelDelta * -1;
      } else if (e.type == "DOMMouseScroll") {
         scrollTo = 40 * e.originalEvent.detail;
      }

      if (scrollTo) {
         e.preventDefault();
         $(this).scrollTop(scrollTo + $(this).scrollTop());
      }
   });

   setTimeout(function () {
      $(".banner-loader").addClass("Loaded");
   }, 1000);

   setTimeout(function () {
      $(".Project-detail-banner").addClass("Loaded");
   }, 200);

   // project detail banner slide
   if ($(".top-slider-init").length > 0) {
      if (window_width > 767) {
         $(".top-slider-init").slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 900,
            dots: true,
            pauseOnFocus: false,
            pauseOnHover: false,
            autoplay: false,
            arrows: true,
            draggable: true,
            asNavFor: ".bottom-slider-init",
         });
      } else {
         $(".top-slider-init").slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 900,
            dots: false,
            pauseOnFocus: false,
            pauseOnHover: false,
            draggable: true,
            autoplay: true,
            autoplaySpeed: 2500,
         });
      }
   }

   if ($(".bottom-slider-init").length > 0) {
      $(".bottom-slider-init").slick({
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
         asNavFor: ".top-slider-init",
         centerMode: true,
         focusOnSelect: true,
         centerPadding: 0,
      });
   }

   // features and amenities slider
   if ($(".TextSlider-init").length > 0) {
      $(".TextSlider-init").slick({
         infinite: false,
         slidesToShow: 5,
         slidesToScroll: 2,
         rows:2,
         speed: 900,
         dots: false,
         pauseOnFocus: false,
         pauseOnHover: false,
         autoplay: false,
         arrows: true,
         draggable: true,
         prevArrow: ".goLeftFeature",
         nextArrow: ".goRightFeature",
         responsive: [
            {
               breakpoint: 768,
               settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  rows:1,
                  centerMode: false,
                  dots: false,
                  draggable: true,
               },
            },
         ],
      });
   }

   if ($(".promotion_init").length > 0) {
      $(".promotion_init").slick({
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
         prevArrow: ".navleft",
         nextArrow: ".navright",
         responsive: [
            {
               breakpoint: 992,
               settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  centerMode: false,
                  dots: true,
                  arrows: false,
                  draggable: true,
               },
            },
            {
               breakpoint: 768,
               settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  centerMode: false,
                  dots: true,
                  arrows: false,
                  draggable: true,
               },
            },
         ],
      });
   }

   // feature project slider
   if ($(" .Projects .ProjectSlider-init").length > 0) {
      $(" .Projects .ProjectSlider-init").slick({
         infinite: true,
         slidesToShow: 3,
         slidesToScroll: 3,
         speed: 900,
         dots: false,
         pauseOnFocus: false,
         pauseOnHover: false,
         autoplay: false,
         arrows: true,
         prevArrow: ".goLeft",
         nextArrow: ".goRight",
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
               },
            },
            {
               breakpoint: 768,
               settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  dots: true,
                  draggable: true,
                  centerMode: true,
               },
            },
         ],
      });

      $(".ProjectSlider-init").slick("slickSetOption", "slidesToScroll", 3, true);
   }

   // feature project slider
   if ($(" .asTeam .ProjectSlider-init").length > 0) {
      $(" .asTeam .ProjectSlider-init").slick({
         infinite: true,
         slidesToShow: 4,
         slidesToScroll: 4,
         speed: 900,
         dots: false,
         pauseOnFocus: false,
         pauseOnHover: false,
         autoplay: false,
         arrows: true,
         prevArrow: ".goLeft",
         nextArrow: ".goRight",
         //draggable: true,
         //centerMode: true,
         responsive: [
            {
               breakpoint: 768,
               settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  dots: true,
                  draggable: true,
                  centerMode: false,
               },
            },
         ],
      });

      $(".ProjectSlider-init").slick("slickSetOption", "slidesToScroll", 3, true);
   }

   //-------- progressbar
   let getProgress = $(".Progress__bar__line span").attr("data-progress");
   if (getProgress === "100") {
      $(".Progress__bar__end").addClass("fully");
      $(".Progress").addClass("fully-wrap");
   }
   $(".Progress__bar__line span:nth-child(1)").css("width", `${getProgress}%`);
   $(".Progress__bar__line span:nth-child(2)").css("left", `${getProgress}%`);
   //
   $(".Progress__bar__line span:nth-child(2)").hover(function () {
      $(".Progress__bar__popup").fadeToggle();
   });

   //-------- banner scroll pin

   var isSafari =
      /constructor/i.test(window.HTMLElement) ||
      (function (p) {
         return p.toString() === "[object SafariRemoteNotification]";
      })(!window["safari"] || (typeof safari !== "undefined" && window["safari"].pushNotification));

   if (window_width > 768 && !isSafari) {
      if ($(".Project-detail-banner__left").length > 0) {
         ScrollTrigger.create({
            trigger: ".Project-detail-banner__left",
            endTrigger: ".Specification",
            start: "center center",
            end: () => {
               const height = window.innerHeight;
               const chartHeight = document.querySelector(".Project-detail-banner__left").offsetHeight;
               return `bottom ${chartHeight + (height - chartHeight) / 2}px`;
            },
            pin: true,
            pinSpacing: false,
         });
      }
   }

   if (window_width > 991) {
      if (isSafari) {
         $(".Project-detail-banner").addClass("isSafari");
         $(".scrolls").css("height", "100vh");

         if ($(".scrolls").length > 0) {
            $(".scrolls").customScrollbar();
         }

         let Get_left = $(".container").offset().left + 15;

         if ($(".overview").length > 0) {
            $(".overview").css("padding-right", Get_left + 15);
         }
      }
   }

   // mobile gallery
   if (window_width < 768) {
      $(".MobileLight").prepend('<div class="MobileGallery">view all photos</div>');
      $(".MobileGallery").on("click", function () {
         $(".MobileLight .modify-bg").eq(1).click();
      });
      // light gallery mobile
      if ($(".MobileLight").length > 0) {
         $(".MobileLight").lightGallery({
            selector: ".modify-bg",
            thumbnail: true,
            exThumbImage: "data-src",
         });
      }
   }

   if (window_width > 767) {
      let Get_left = $(".container").offset().left + 15;

      if ($(".Location_map").length > 0) {
         $(".Location_map_load .Location_map__address").css("padding-left", Get_left + 15);
      }
      if ($(".ListingFour ").length > 0) {
         $(".ListingFour__single__left").css("padding-left", Get_left);
      }
      if ($(".ChairmanMessageText__right ").length > 0) {
         $(".ChairmanMessageText__right").css("padding-right", Get_left + 15);
         $(".ChairmanMessageText__left").css("padding-left", Get_left + 15);
      }

      if ($(".timeline__slider-bg__item__content ").length > 0) {
         $(".timeline__slider-bg__item__content").css("left", Get_left);
         $(".timeline__slider-bg__item__content").css("left", Get_left);
      }

      if ($(".Location_map__address ").length > 0) {
         $(".Location_map__address").css("padding-left", Get_left + 15);
      }

      if ($(".Project-detail-banner__right").length > 0) {
         $(".Project-detail-banner__right").css("padding-right", Get_left + 15);
      }
   }

   // location map
   // if($('.Location_map_load').length > 0){
   //     // map
   //     let get_offset = $('.Location_map').offset().top,
   //         get_start = $(window).height() / 1.01,
   //         CheckOnce = false;
   //     $(window).scroll(function () {
   //         if ($(window).scrollTop() > get_offset - get_start) {
   //             if (CheckOnce === false) {
   //                 initMap();
   //                 CheckOnce = true;
   //             }
   //         }
   //     })
   // }

   // project detail

   if ($(".slider-for").length > 0) {
      $(".slider-for").slick({
         slidesToShow: 1,
         slidesToScroll: 1,
         arrows: true,
         speed: 1000,
         // fade: true,
         asNavFor: ".slider-nav",
         infinite: false,
         prevArrow: $("#prev"),
         nextArrow: $("#next"),
      });

      $(".slider-nav").slick({
         slidesToShow: 6,
         slidesToScroll: 1,
         asNavFor: ".slider-for",
         dots: false,
         centerMode: true,
         focusOnSelect: true,
         infinite: false,
         speed: 900,
         variableWidth: true,
         draggable: false,
      });

      // on hover action
      $(".full-nav-wrapper").each(function () {
         $(this).hover(
            function () {
               $(this).addClass("hover-on-it");
            },
            function () {
               $(".full-nav-wrapper").removeClass("hover-on-it");
            }
         );
      });

      $(".full-nav-wrapper").hover(
         function () {
            $(".timeline__nav").find(".slick-current").addClass("remove-title");
         },
         function () {
            $(".timeline__nav").find(".slick-current").removeClass("remove-title");
         }
      );

      // first laod animation
      setTimeout(function () {
         $(".slick-current")
            .find(".timeline__slider-bg__item__content__loader")
            .addClass("stop_zoom")
            .removeClass("do_zoom");
      }, 1000);
      setTimeout(function () {
         $(".slick-current")
            .find(".timeline__slider-bg__item__content__zoom,.timeline__slider-bg__item__content__loader")
            .addClass("do_zoom")
            .removeClass("stop_zoom");
      }, 2000);

      // on change fire function
      $(".slider-for").on("afterChange", function () {
         $(".timeline__slider-bg__item__content__zoom,.timeline__slider-bg__item__content__loader").removeClass(
            "do_zoom"
         );
         setTimeout(function () {
            $(".slick-current")
               .find(".timeline__slider-bg__item__content__loader")
               .addClass("stop_zoom")
               .removeClass("do_zoom");
         }, 300);
         setTimeout(function () {
            $(".slick-current")
               .find(".timeline__slider-bg__item__content__zoom,.timeline__slider-bg__item__content__loader")
               .addClass("do_zoom")
               .removeClass("stop_zoom");
         }, 1200);
      });
   }

   // product transition

   function projecthover() {
      if (window_width > 768) {
         let Parents = $(".Project__slider-wrap__single__inner__content__slide__inner p");
         Parents.each(function () {
            let get_p = $(this);
            Parents.map((i) => {
               return get_p.eq(i).css({ "margin-bottom": -get_p.eq(i).height() });
            });
         });
      }
   }

   projecthover();
}); //document.ready

//------------ Device Image with background image
function deviceImage() {
   // window min width 1401 -- large screen
   var window_width = $(window).width();
   if (1400 < window_width) {
      $(".modify-bg").each(function () {
         var large = $(this).attr("data-image-large");
         $(this).css("background-image", "url(" + large + ")");
      });
      console.log("large");
   }
   // window max-width 1400 -- standard screen
   if (1400 >= window_width && 992 <= window_width) {
      $(".modify-bg").each(function () {
         var standard = $(this).attr("data-image-standard");
         $(this).css("background-image", "url(" + standard + ")");
      });
      console.log("standard");
   }
   // window max-width 991 -- mobile device
   if (991 >= window_width) {
      $(".modify-bg").each(function () {
         var small = $(this).attr("data-image-small");
         $(this).css("background-image", "url(" + small + ")");
      });
      console.log("small");
   }
}

deviceImage();
