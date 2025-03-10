/*-----------------------------------------------------------------------------------

 Template Name:Sheltos
 Template URI: themes.pixelstrap.com/Sheltos
 Description: This is Real Estate website
 Author: Pixelstrap
 Author URI: https://themeforest.net/user/pixelstrap

 ----------------------------------------------------------------------------------- */
// 01. Loader js
// 02.Tap to top
// 03.Footer js
// 04.Menu js
// 05.Image to background js
// 06.liked js
// 07.filter js
// 08.search js
// 09.responsive setting js
// 10.fixed header js
// 11.Add to wishlist
// 12. Grid Layout view
// 13. nav-menu JS



(function ($) {
    "use strict";

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })

        $('.like').on('click', function (e) {
            $(this).toggleClass('added');
        });

        $('button.add').on('click', function (e) {
            $('.add-more').toggleClass('open');
        });
        // Language icon
        $('.language').on('click', function () {
            $(this).toggleClass("active");
            $('.language ul.nav-submenu').toggleClass("open");
            $('.cart ul.nav-submenu').removeClass("open");
            $(".currency ul.nav-submenu").removeClass("open");
        });
        // cart icon
        $('.cart').on('click', function () {
            $(this).toggleClass("active");
            $('.cart ul.nav-submenu').toggleClass("open");
            $('.language ul.nav-submenu').removeClass("open");
            $(".currency ul.nav-submenu").removeClass("open");
        });

        // cart icon
        $('.currency').on('click', function () {
            $(this).toggleClass("active");
            $('.currency ul.nav-submenu').toggleClass("open");
            $('.cart ul.nav-submenu').removeClass("open");
            $(".language ul.nav-submenu").removeClass("open");
        });

    /*=====================
     01. Loader js
     ==========================*/
    $(window).on('load', function () {
        setTimeout(function(){
            $('.loader-wrapper').fadeOut('slow');
            $('.box').addClass('text-affect');
        }, 1000);
        $('.loader-wrapper').remove('slow');
    });

    /*=====================
     02. Tap to Top
     ==========================*/
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 600) {
            $('.tap-top').addClass('top');
        } else {
            $('.tap-top').removeClass('top');
        }
    });

    $('.tap-top').on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });


    /*=====================
     03. Footer js
     ==========================*/


    var contentwidth = $(window).width();
    $(window).on('load', function(){
        checkPosition();
        function checkPosition() {
            if (window.matchMedia('(max-width: 767px)').matches) {
                $('.footer-title h5').append('<span class="according-menu"><i class="fas fa-chevron-down"></i></span>');
                $('.footer-title').on('click', function() {
                    $('.footer-title').removeClass('active').find('span').replaceWith('<span class="according-menu"><i class="fas fa-chevron-down"></i></span>');
                    $('.footer-content').slideUp('normal');
                    if ($(this).next().is(':hidden') == true) {
                        $(this).addClass('active');
                        $(this).find('span').replaceWith('<span class="according-menu"><i class="fas fa-chevron-up"></i></span>');
                        $(this).next().slideDown('normal');
                    } else {
                        $(this).find('span').replaceWith('<span class="according-menu"><i class="fas fa-chevron-down"></i></span>');
                    }
                });
                $('.footer-content').hide();

            } else {
                $('.footer-content').show();

            }
        }
    });

    /*=====================
     04. Menu js
     ==========================*/
    $(".toggle-nav, .sidebar-toggle").on('click', function() {
        $('.nav-menu').addClass("open");
        $(".customizer-wrap").removeClass("open");
        $('.left-sidebar').css("left","-365px").removeClass("open");
        $('.left-sidebar').removeClass("open");
        if ($('.nav-menu').hasClass("open")) {
            $('.bg-overlay').addClass("active");
        }
    });
    $(".mobile-back").on('click', function() {
        $('.nav-menu').removeClass("open");
        $('.bg-overlay').removeClass("active");
    });

    var contentwidth = $(window).width();
    if ((contentwidth) <= '1199') {
        $('<div class="bg-overlay"></div>').appendTo($('header'));
        $('.menu-title').append('<span class="according-menu">+</span>');
        $('.menu-title').on('click', function() {
            $('.menu-title').removeClass('active').find('span').replaceWith('<span class="according-menu">+</span>');
            $('.menu-content').slideUp('normal');
            if ($(this).next().is(':hidden') == true) {
                $(this).addClass('active');
                $(this).find('span').replaceWith('<span class="according-menu">-</span>');
                $(this).next().slideDown('normal');
            } else {
                $(this).find('span').replaceWith('<span class="according-menu">+</span>');
            }
        });
        $('.menu-content').hide();
    }

    var contentwidth = $(window).width();
    if ((contentwidth) <= '1199') {
        $('.menu-title-level1').append('<span class="according-menu">+</span>');
        $('.menu-title-level1').on('click', function() {
            $('.menu-title-level1').removeClass('active').find('span').replaceWith('<span class="according-menu">+</span>');
            $('.level1').slideUp('normal');
            if ($(this).next().is(':hidden') == true) {
                $(this).addClass('active');
                $(this).find('span').replaceWith('<span class="according-menu">-</span>');
                $(this).next().slideDown('normal');
            } else {
                $(this).find('span').replaceWith('<span class="according-menu">+</span>');
            }
        });
        $('.nav-sub-childmenu .level1').hide();
    }

    var contentwidth = $(window).width();
    if ((contentwidth) <= '1199') {
        $('.submenu-title').append('<span class="according-menu">+</span>');
        $('.submenu-title').on('click', function() {
            $('.submenu-title').removeClass('active').find('span').replaceWith('<span class="according-menu">+</span>');
            $('.submenu-content').slideUp('normal');
            if ($(this).next().is(':hidden') == true) {
                $(this).addClass('active');
                $(this).find('span').replaceWith('<span class="according-menu">-</span>');
                $(this).next().slideDown('normal');
            } else {
                $(this).find('span').replaceWith('<span class="according-menu">+</span>');
            }
        });
        $('.submenu-content').hide();
    }

    window.addEventListener("resize", function() {
        $('.menu-title').append('<span class="according-menu">+</span>');
        $('.nav-menu').removeClass("open");
        $('.bg-overlay').removeClass("active");
        $('.menu-title').removeClass('active').find('span').replaceWith('<span class="according-menu">+</span>');
        $('.menu-title-level1').removeClass('active').find('span').replaceWith('<span class="according-menu">+</span>');
        $('.submenu-title').removeClass('active').find('span').replaceWith('<span class="according-menu">+</span>');
        $('.dropdown').find('ul').css("display", "none");
        $('.mega-menu').each(function() {
            $(this).find('div:first').css({
                "display": "none",
            });
        });
        $('.submenu-content').css("display", "none");

        $('.menu-title').append('<span class="according-menu">+</span>');
        $('.menu-title').on('click', function() {
            $('.menu-title').removeClass('active').find('span').replaceWith('<span class="according-menu">+</span>');
            $('.menu-content').slideUp('normal');
            if ($(this).next().is(':hidden') == true) {
                $(this).addClass('active');
                $(this).find('span').replaceWith('<span class="according-menu">-</span>');
                $(this).next().slideDown('normal');
            } else {
                $(this).find('span').replaceWith('<span class="according-menu">+</span>');
            }
        });
        $('.menu-content').hide();

        $('.menu-title-level1').append('<span class="according-menu">+</span>');
        $('.menu-title-level1').on('click', function() {
            $('.menu-title-level1').removeClass('active').find('span').replaceWith('<span class="according-menu">+</span>');
            $('.level1').slideUp('normal');
            if ($(this).next().is(':hidden') == true) {
                $(this).addClass('active');
                $(this).find('span').replaceWith('<span class="according-menu">-</span>');
                $(this).next().slideDown('normal');
            } else {
                $(this).find('span').replaceWith('<span class="according-menu">+</span>');
            }
        });
        $('.nav-sub-childmenu .level1').hide();

        $('.submenu-title').append('<span class="according-menu">+</span>');
        $('.submenu-title').on('click', function() {
            $('.submenu-title').removeClass('active').find('span').replaceWith('<span class="according-menu">+</span>');
            $('.submenu-content').slideUp('normal');
            if ($(this).next().is(':hidden') == true) {
                $(this).addClass('active');
                $(this).find('span').replaceWith('<span class="according-menu">-</span>');
                $(this).next().slideDown('normal');
            } else {
                $(this).find('span').replaceWith('<span class="according-menu">+</span>');
            }
        });
        $('.submenu-content').hide();
    });


    /*=====================
     05. Image to background js
     ==========================*/
    $(".bg-top").parent().addClass('b-top');
    $(".bg-bottom").parent().addClass('b-bottom');
    $(".bg-center").parent().addClass('b-center');
    $(".bg-left").parent().addClass('b-left');
    $(".bg-right").parent().addClass('b-right');
    $(".bg_size_content").parent().addClass('b_size_content');
    $(".bg-img").parent().addClass('bg-size');
    $(".bg-img.blur-up").parent().addClass('blur-up lazyload');
    $('.bg-img').each(function () {

        var el = $(this),
            src = el.attr('src'),
            parent = el.parent();


        parent.css({
            'background-image': 'url(' + src + ')',
            'background-size': 'cover',
            'background-position': 'center',
            'background-repeat': 'no-repeat',
            'display': 'block'
        });

        el.hide();
    });

     /*=====================
     06. liked js
     ==========================*/
     $(".like-bottom").on('click', function() {
        $(this).parents(".property-box").toggleClass('liked-img');
     });

     /*=====================
     07. filter js
     ==========================*/
     $(".dropdown-menu a").on('click', function() {
        var a = $(this).closest("a");
        var getSampling = a.text();
        $(this).closest(".dropdown-menu").prev('.dropdown-toggle').find('span').text(getSampling);
     });

     $('.mobile-filter').on('click', function(e) {
        $('.left-sidebar').css("left","-1px");
        $(".customizer-wrap").removeClass("open");
        $('.nav-menu').removeClass("open");
      });
     $('.back-btn').on('click', function(e) {
        $('.left-sidebar').css("left","-365px");
     });

     $(".view-map").on('click', function() {
        $('.onclick-map').slideToggle('show');
     });

     // advance filter js
    var width_content = $(window).width();
    if ((width_content) > '991') {

        $(".filter-bottom-title").on('click', function() {
            $(".filter-bottom-content").slideToggle("");
        });
    }
    else {
        $(".filter-bottom-title").on('click', function() {
            $(".filter-bottom-content").toggleClass("open");
            $(".customizer-wrap").removeClass("open");
        });
        $(".close-filter-bottom").on('click', function() {
            $(".filter-bottom-content").removeClass("open");
        });
    }


    $(".top-bar-7 .close-filter-bottom").on('click', function() {
        $(".filter-bottom-content").removeClass("open");
        $(".filter-bottom-content").slideToggle("");
    });
     /*=====================
     08. search js
     ==========================*/
     $(".search-icon").on('click', function() {
        $('.search-box').toggleClass('open');
     });

     /*=====================
     09. responsive setting js
     ==========================*/
     $(".search-sm").on('click', function() {
        $('.sm-input').toggleClass('open');
     });

     $(".top-right-toggle").on('click', function() {
        $('.top-bar-right').toggleClass('open');
     });

     /*=====================
     10. fixed header js
     ==========================*/
     $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 600) {
            $(".fixed-header").addClass("fixed");
        } else {
            $(".fixed-header").removeClass("fixed");
        }
    });

    $(".toggle-center").on('click', function() {
        $('.center-responsive').toggleClass('open');
     });


    /*=====================
    11. Add to wishlist
    ==========================*/
    // $('.property-box .overlay-property-box .effect-round.like').on('click', function() {
    //     var icon = $(this).find('i'); // Get the heart icon element
    //     var isAdded = $(this).hasClass('added'); // Check if it's already added to the wishlist

    //     if (!isAdded) {
    //         // If not added, add the filled heart and notify
    //         icon.removeClass('feather-heart').addClass('feather-heart-fill'); // Switch to filled heart icon
    //         $(this).addClass('added'); // Mark it as added
    //         Swal.fire({
    //             icon: 'success',
    //             title: 'Property Successfully added to wishlist',
    //             showConfirmButton: false,
    //             timer: 4000,
    //             position: 'top-end',
    //             toast: true
    //         });
    //     } else {
    //         // If already added, change the heart back to outline and notify removal
    //         icon.removeClass('feather-heart-fill').addClass('feather-heart'); // Switch to outline heart icon
    //         $(this).removeClass('added'); // Mark it as removed
    //         Swal.fire({
    //             icon: 'info',
    //             title: 'Property Successfully removed from wishlist',
    //             showConfirmButton: false,
    //             timer: 4000,
    //             position: 'top-end',
    //             toast: true
    //         });
    //     }

    //     // Re-initialize Feather icons after modifying
    //     feather.replace();
    // });



    // $('.property-box .overlay-property-box .effect-round1').on('click', function() {
    //     Swal.fire({
    //         icon: 'success',
    //         title: 'Property Successfully added in wishlist',
    //         showConfirmButton: false,
    //         timer: 4000,
    //         position: 'top-end',
    //         toast: true
    //     });
    // });


    $(".save-btn").on('click', function() {
        $('.save-btn i').toggleClass("far fa-heart").toggleClass("fas fa-heart");
    });

    $(".custom-dropdown .custom-title").on('click', function() {
        $(this).parent().find('.custom-dropdown-menu').toggleClass("show");
    });

    /*=====================
    12. Grid Layout view
    ==========================*/
    //list layout view
    $('.list-layout-view').on('click', function (e) {
        $('.collection-grid-view').css('opacity', '0');
        $(".property-wrapper-grid").css("opacity", "0.2");
        $('.property-wrapper-grid').addClass("list-view");
        $(".property-wrapper-grid").children().children().removeClass();
        $(".property-wrapper-grid").children().children().addClass("col-lg-12");
        setTimeout(function () {
            $(".property-wrapper-grid").css("opacity", "1");
        }, 500);
    });

    $('.grid-layout-view').on('click', function (e) {
        $('.collection-grid-view').css('opacity', '1');
        $('.property-wrapper-grid').removeClass("list-view");
        $(".property-wrapper-grid").children().children().removeClass();
        $(".property-wrapper-grid").children().children().addClass("col-lg-6");

    });
    $('.product-2-layout-view').on('click', function (e) {
        if ($('.property-wrapper-grid').hasClass("list-view")) { } else {
            $(".property-wrapper-grid").children().children().removeClass();
            $(".property-wrapper-grid").children().children().addClass("col-lg-6");
        }
    });
    $('.product-3-layout-view').on('click', function (e) {
        if ($('.property-wrapper-grid').hasClass("list-view")) { } else {
            $(".property-wrapper-grid").children().children().removeClass();
            $(".property-wrapper-grid").children().children().addClass("col-lg-4 col-6");
        }
    });
    $('.product-4-layout-view').on('click', function (e) {
        if ($('.property-wrapper-grid').hasClass("list-view")) { } else {
            $(".property-wrapper-grid").children().children().removeClass();
            $(".property-wrapper-grid").children().children().addClass("col-xl-3 col-6");
        }
    });

})(jQuery);

/*=====================
    13. nav-menu JS
    ==========================*/

$(document).mouseup(function(e) {
    var dropdownMenu = $(".custom-dropdown-menu");
    if (!dropdownMenu.is(e.target) &&
        dropdownMenu.has(e.target).length === 0) {
        $(".custom-dropdown-menu").removeClass("show");
    }
    var menuOutside = $(".nav-menu");
    if (!menuOutside.is(e.target) &&
        menuOutside.has(e.target).length === 0) {
        $(".nav-menu").removeClass("open");
        $(".bg-overlay").removeClass("active");
    }
});
/*=====================
    14. Other JS
    ==========================*/
$('#mapmodal').on('shown.bs.modal', function () {
    map.getViewPort().resize();
});

function readURL( uploader ){
    $('.update_img').attr('src',
            window.URL.createObjectURL(uploader.files[0]) );
};

$(".agent-contact > li .label").click(function(){
    $(this).parent().toggleClass("show");
});


$(".table-wrapper").on("click", ".remove", function ( event ) {
    var ndx = $(this).parent().index() + 1;
    $("td , th", event.delegateTarget).remove(":nth-child(" + ndx + ")");
});

$(document).on('click', '.close-circle', function () {
    $(this).parent('li').remove()
})
