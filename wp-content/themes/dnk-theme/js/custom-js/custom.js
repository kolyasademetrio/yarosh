jQuery(document).ready(function($){

    $('.header_menuBtn').on('click', function(e){
        $(this).toggleClass('on');
        $('#header').toggleClass('menuOpened');
    });

    $('.header_searchBtn').on('click', function(e){
        $('#search-box').addClass('show-search-box');
    });

    $('.search-x').on('click', function(e){
        $('#search-box').removeClass('show-search-box');
    });

    function animateItems($items){
        var i = 0;
        x = true;
        var animate = function() {
            setTimeout(function() {
                $($items[i]).addClass('shown');
                (x) ? i++ : i--;
                console.log(i);
                if (i < $items.length && i >= 0) {
                    animate();
                };
            }, 60);
        };
        animate();
    }

    function isInViewport($elem) {
        var elementTop = $elem.offset().top;
        var elementBottom = elementTop + $elem.outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    };
    
    if( isInViewport($('.gallery .items_content')) ){
        animateItems($('.gallery .items_listItem'));
    }

    $(window).scroll(function(){
        if( isInViewport($('.gallery .items_content')) ){
            animateItems($('.gallery .items_listItem'));
        }
    });

    if( isInViewport($('.categories .items_content')) ){
        animateItems($('.categories .items_listItem'));
    }

    $(window).scroll(function(){
        if( isInViewport($('.categories .items_content')) ){
            animateItems($('.categories .items_listItem'));
        }
    });

    /* ------------------------>>> Якоря меню <<<------------------------------------------------------ */
    function ancor ($ancor) {
        $ancor.on('click', function(e){
            var thisHREF = $(this).attr('href');
            if ( thisHREF.startsWith('#') ) {
                var $goal = $(thisHREF),
                    headerHeight = $('#header').innerHeight();

                if ( $goal.length ) {
                    $('html,body').stop().animate({scrollTop: $goal.offset().top - headerHeight}, 1000);
                    setTimeout(function(){
                        animateItems($('.items_listItem'));
                    }, 500)
                    //animateItems($('.items_listItem'));
                    e.preventDefault();
                } else {
                    var homeURL = window.location.protocol + "//" + window.location.host + "/",
                        redirectURL = homeURL + thisHREF;

                    window.location.href = redirectURL;
                }
            }
        });
    }
    ancor( $('.scroll-down') );
    /* ------------------------>>> Якоря меню End <<<-------------------------------------------------- */

    /* ------------------------>>> setStickyHeader <<<------------------------------------------------- */
    (function(){
        if ( $("header#header").length ) {
            var $header = $("header#header"),
                stickyTop = $header.offset().top;

            function setStickyHeader() {
                var scroll = $(window).scrollTop();

                (scroll > stickyTop) ? $header.addClass('sticky') : $header.removeClass('sticky');
            }

            $(window).on('load', function(){
                setStickyHeader();
                console.log('adad');
            });

            $(window).on('scroll', function(){
                setStickyHeader();
            });
        }
    })();
    /* ------------------------>>> setStickyHeader End <<<--------------------------------------------- */






    /* ------------------------>>> setStickyHeader <<<------------------------------------------------- */
    /*(function(){
        if ( $("#header__menus").length ) {
            var sticky = $("#header__menus"),
                stickyTop = $("#header__menus").offset().top,
                headerHeight = $('header.header').innerHeight(),
                headerMenusHeight = $('.header__menus').innerHeight();

            function setStickyHeader() {
                var scroll = $(window).scrollTop(),
                    $site__main = $('.site__main'),
                    $header = $('header.header'),
                    $header__nav = $('.header__nav');

                if (scroll >= stickyTop) {
                    $header.addClass('sticky');

                    var logoWidth = $('.header__logoLink.logo__hidden').outerWidth(),
                        langWidth = $('.header__langsWrap').innerWidth(),
                        larger = langWidth>logoWidth ? langWidth : logoWidth;

                    $header__nav.css({
                        'padding-left': larger,
                        'padding-right': larger,
                    });

                    if ( !$('body.home').length ) {
                        $site__main.css({
                            'padding-top': $('.header__menus').innerHeight(),
                        });
                    }
                } else {
                    $header.removeClass('sticky');

                    $header__nav.css({
                        'padding-left': '',
                        'padding-right': '',
                    });

                    if ( !$('body.home').length ) {
                        $site__main.css({
                            'padding-top': '',
                        });
                    }
                }
            }

            function setStickyheaderMobile(){
                if ( $('body').hasClass('homePage') ) {
                    var scroll = $(window).scrollTop(),
                        $site__main = $('.site__main'),
                        $header = $('header.header');

                    if (scroll >= 10) {
                        $header.css({
                            'padding-top': headerMenusHeight,
                        });

                        $header.addClass('sticky__mobile');
                    } else {
                        $header.removeClass('sticky__mobile');

                        $header.css({
                            'padding-top': '',
                        });
                    }
                }
            }

            $(window).on('load', function(){
                if ( $(window).width() >= 768 ) {
                    if ( !$('body.error404').length ) {
                        setStickyHeader();
                    }
                } else {
                    setStickyheaderMobile();
                }
            });

            $(window).on('scroll', function(){
                if ( $(window).width() >= 768 ) {
                    if ( !$('body.error404').length ) {
                        setStickyHeader();
                    }
                } else {
                    setStickyheaderMobile();
                }
            });
        }
    })();*/
    /* ------------------------>>> setStickyHeader End <<<--------------------------------------------- */





    /* ------------------------>>> Анимация скролла при переходе на якорь с Внутренней страницы <<<----- */
    function animationScrollWithHash(){
        if (window.location.hash != '') {
            var hash = window.location.hash;
            $('html,body').stop().animate({scrollTop: $(hash).offset().top - $('.header__menus').innerHeight()}, 1000);
        }
    }
    //animationScrollWithHash();
    /* ------------------------>>> Анимация скролла при переходе на якорь с Внутренней страницы End <<<- */


    /* ------------------------>>> about__readMore <<<------------------------------------------------- */
    (function(){
        if ( $('.about__readMore').length ) {
            $(document).on('click', '.about__readMore', function(){
                
                console.log( $(this).attr('opentext') );
                console.log( $(this).attr('closetext') );

                if ( $(this).closest('.section__content').hasClass('open') ) {
                    $(this).closest('.section__content').children('p:nth-child(n+4)').slideUp();
                    $(this).closest('.section__content').removeClass('open');
                    $(this).html($(this).attr('opentext'));
                } else {
                    $(this).closest('.section__content').children('p:nth-child(n+4)').slideDown();
                    $(this).closest('.section__content').addClass('open');
                    $(this).html($(this).attr('closetext'));
                }
            });
        }
    })();
    /* ------------------------>>> about__readMore End <<<---------------------------------------------- */


    /* ------------------------>>> Прижать футер к низу <<<------------------------------------------------- */
    (function(){
        if (  $('footer.footer').length ) {
            $(window).load(function(){
                footer();
            });

            $(window).resize(function() {
                footer();
            });

            function footer() {
                var docHeight = $(window).height(),
                    footerHeight = $('footer.footer').outerHeight(),
                    footerBottom = $('footer.footer').position().top + footerHeight;

                if (footerBottom < docHeight) {
                    $('footer.footer').css('margin-top', (docHeight - footerBottom) + 'px');
                }
            }
        }
    })();
    /* ------------------------>>> Прижать футер к низу End <<<--------------------------------------------- */


    /* ------------------------>>> Animations <<<----------------------------------------------------- */
   /* $('.header__logoLink').addClass('animated zoomIn');

    if ( !$('.header__humburger').is(':visible') ) {
        $('.header__menu>li:first-child').addClass('wow slideInLeft');
        $('.header__menu>li:nth-child(2)').addClass('wow slideInLeft');
        $('.header__menu>li:nth-child(3)').addClass('wow slideInRight');
        $('.header__menu>li:nth-child(4)').addClass('wow slideInRight');
    }


    $('.section__titleWrap.left_line').addClass('wow slideInLeft');
    $('.section__titleWrap.right_line').addClass('wow slideInRight');*/

    /* ------------------------>>> Animations End <<<------------------------------------------------- */

});