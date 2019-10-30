jQuery(document).ready(function($) {

    // header__humburger
    /*$('.header__humburger').magnificPopup({
        type:'inline',
        removalDelay: 500,
        mainClass: 'mfp-fade popup_inline',
        showCloseBtn: true,
        closeMarkup: '<div class="mfp-close">&times;</div>',
        closeBtnInside: true,
        closeOnContentClick: false,
        closeOnBgClick: true,
        alignTop: false,
        fixedContentPos: true,
        callbacks: {
            open: function() {
            },
            close: function() {

            },
            beforeOpen: function() {
                var $triggerEl = $(this.st.el),
                    newClass = 'meinMenu__popup';
                this.st.mainClass = this.st.mainClass + ' ' + newClass;
            }
        }
    });

    $(document).on('click', '.meinMenu__popup .menu-item>a', function(){
        setTimeout(function(){
            $.magnificPopup.close();
        }, 1000);

    });*/

    /*$('.slider').magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
            enabled:true
        }
    });*/

    $('.slider').magnificPopup({
        delegate: '.owl-item:not(.cloned) a',
        type: 'image',
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function() {
                // just a hack that adds mfp-anim class to markup
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                this.st.mainClass = this.st.el.attr('data-effect');
            }
        },
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            /*titleSrc: function(item) {
                return item.el.attr('title') + '<small></small>';
            }*/
        }
    });

    /* Slider on Single page */
    (function(){
        var bigimage = $(".slider");
        var thumbs = $(".slider_nav");
        //var totalslides = 10;
        var syncedSecondary = true;

        bigimage.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: true,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
               /* navText: [
                    '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                    '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
                ]*/
            }).on("changed.owl.carousel", syncPosition);

        thumbs.on("initialized.owl.carousel", function() {
                thumbs
                    .find(".owl-item")
                    .eq(0)
                    .addClass("current");
            }).owlCarousel({
                items: 4,
                dots: true,
                /*nav: true,
                navText: [
                    '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                    '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
                ],*/
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: 4,
                responsiveRefreshRate: 100
            });

        function syncPosition(el) {
            //if loop is set to false, then you have to uncomment the next line
            //var current = el.item.index;

            //to disable loop, comment this block
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }
            //to this
            thumbs
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = thumbs.find(".owl-item.active").length - 1;
            var start = thumbs
                .find(".owl-item.active")
                .first()
                .index();
            var end = thumbs
                .find(".owl-item.active")
                .last()
                .index();

            if (current > end) {
                thumbs.data("owl.carousel").to(current, 100, true);
            }
            if (current < start) {
                thumbs.data("owl.carousel").to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                bigimage.data("owl.carousel").to(number, 100, true);
            }
        }

        thumbs.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            bigimage.data("owl.carousel").to(number, 300, true);
        });
    })();
    /* Slider on Single page END */
});

