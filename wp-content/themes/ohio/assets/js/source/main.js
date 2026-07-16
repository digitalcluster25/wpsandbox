(function ($) {
    'use strict';

    /* Table of contents */
    /*
        # Headers
        # Bar
        # Sticky Nav
        # Navigation
        # Footer
        # Components
            ## Accordion
            ## Circle Progress
            ## Compare
            ## Counter
            ## Countdown
            ## Dynamic Text
            ## Gallery
            ## Horizontal Accordion
            ## Instagram
            ## Parallax
            ## Progress
            ## Sliders
            ## Tabs
            ## Team Group
            ## Video Background
        # Lazy load
        # Other
    */

    window.Clb = {
        init: function () {
            // Header
            this.header = $('#masthead');
            this.footer = $('.site-footer');
            this.body = $('body');
            this.headerIsFourth = Clb.header.hasClass('header-4');
            this.wpadminbar = $('#wpadminbar');

            this.headerFixed = {
                initialOffset: parseInt(this.header.attr('data-fixed-initial-offset')) || 150,

                enabled: $('[data-header-fixed]').length,
                value: false,

                mobileEnabled: $('[data-mobile-header-fixed]').length,
                mobileValue: false
            };

            this.searchPopup = $('.search-popup');
            this.subheader = $('.subheader');

            // Logos
            this.siteBranding = this.header.find('.branding');
            this.siteTitle = this.header.find('.branding-title');
            this.logo = this.header.find('.logo');
            this.fixedLogo = this.header.find('.logo-sticky');
            this.mobileLogo = this.header.find('.logo-mobile');
            this.fixedMobileLogo = this.header.find('.logo-sticky-mobile');

            this.logoForOnepage = this.header.find('.logo-dynamic');
            this.logoForOnepageDark = this.logoForOnepage.find('.dark');
            this.logoForOnepageLight = this.logoForOnepage.find('.light');

            // Menus
            this.megaMenu = this.header.find('#mega-menu-wrap');
            this.mobileMenu = $('[data-mobile-menu-resolution]').data('mobile-menu-resolution');

            // Page
            this.containerLoading = $('.container-loading');

            //RTL
            this.isRtl = $('body').hasClass('rtl');

            //Elementor
            this.isElementorPage = $('body').hasClass('elementor-page');

            this.resize();
        },

        resize: function () {
            this.isMobile = $(window).width() <= 768;
            this.isTablet = $(window).width() <= 1180;
            this.isDesktop = $(window).width() >= 1181;
            this.isMobileMenu = $(window).width() <= Clb.mobileMenu
        }
    };

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    /* # Headers */
    function handleHeaders() {

        // Search open
        $('[data-js="open-search"]').on("click", function (e) {
            e.preventDefault();
            handlePopup('.search-popup');
            $('.search-results:not(body)').empty();
        });

        // Remove close from form
        Clb.searchPopup.find('form').on("click", function (e) {
            e.stopPropagation();
        });

        handleMobileHeader();
        handleHeaderSize();
        handleFixedHeader();
    }

    function handleMobileHeader() {

        if (Clb.header && Clb.header.length) {

            if (Clb.isMobileMenu) {
                Clb.header.addClass('-mobile');
                Clb.body.addClass('is-mobile-menu');
                $('.nav').addClass('-visible');
            } else {
                Clb.header.removeClass('-mobile');
                Clb.body.removeClass('is-mobile-menu');
                $('.nav').removeClass('-visible');
            }
        }
    }

    function handleHeaderSize() {

        handleFixedHeader();

        // Reset mega menu css properties for mobile phone
        if (Clb.isMobileMenu) {
            Clb.megaMenu.find('ul').css({
                'left': '',
                'width': '',
                'max-width': '',
                'min-width': ''
            });
        }
    }

    function handleFixedHeader() {
        var fixed = Clb.headerFixed;

        if ($(document).scrollTop() > fixed.initialOffset) {

            if ((!Clb.isMobileMenu && fixed.enabled && !fixed.value) ||
                (Clb.isMobileMenu && fixed.mobileEnabled && !fixed.mobileValue)) {

                if (Clb.isMobileMenu) {
                    fixed.mobileValue = true;
                } else {
                    fixed.value = true;
                }

                Clb.header.addClass('-sticky')

                // Hide non fixed logos
                Clb.logo.css('display', 'none');
                Clb.mobileLogo.css('display', 'none');
                Clb.logoForOnepage.css('display', 'none');

                // Show fixed logo
                if (Clb.isMobileMenu && Clb.fixedMobileLogo.length) {
                    Clb.fixedMobileLogo.css('display', 'flex');
                } else {
                    Clb.fixedLogo.css('display', 'flex');
                }
            }

        } else if (fixed.value || fixed.mobileValue) {

            fixed.value = false;
            fixed.mobileValue = false;

            Clb.header.removeClass('-sticky');

            // Hide fixed logos
            Clb.fixedLogo.css('display', '');
            Clb.fixedMobileLogo.css('display', '');

            // Show non fixed logo
            if (Clb.isMobileMenu && Clb.mobileLogo.length) {
                Clb.logo.css('display', 'none');
                Clb.logoForOnepage.css('display', 'none');
                Clb.mobileLogo.css('display', 'flex');
            } else {
                Clb.logo.css('display', 'flex');
                Clb.logoForOnepage.css('display', '');
                Clb.mobileLogo.css('display', 'none');
            }

        }

        // Effect appearance
        if ($(document).scrollTop() > fixed.initialOffset) {
            Clb.header.addClass('showed');
        } else {
            Clb.header.removeClass('showed');
        }
    }

    function handleHeaderTitle() {
        // Title Parallax
        if ($('.page-headline .page-title').hasClass('no-transition')) {
            if ($('.page-headline h1').length) {
                var scroll = $(document).scrollTop() / 3;
                if (scroll > 200) {
                    scroll = 200;
                } else {
                    scroll = scroll;
                }
                $('.page-headline h1, .page-headline p.subtitle, .page-headline .tags').css({
                    'transform': 'translate3d(0,' + (scroll) + 'px, 0)',
                    'opacity': 1 - (scroll / 200)
                });
            }
        }
    }

    /* # Bar */

    function handleBarScroll() {
        var bar = $('.bar');

        if (bar.length) {
            var hamburger = $('.bar-hamburger .hamburger');

            if ($(document).scrollTop() > 100) {
                hamburger.css('margin-top', '25px');
            } else {
                hamburger.css('margin-top', '');
            }
        }
    }

    /* # Sticky Nav */

    function handleStickyNav() {

        $(window).on('scroll', throttle(function() {
            var stickyNav = $('[data-js="sticky-nav"]');
            var scrollTop = $(window).scrollTop();
            var viewportHeight = $(window).height();
            var triggerStart = viewportHeight * 0.2;
            var siteContent = $('.site-content');
            var contentBottom = siteContent.offset().top + siteContent.outerHeight();

            if (!Clb.isMobile) {
                if (scrollTop > triggerStart && (scrollTop + viewportHeight) < contentBottom) {
                    stickyNav.stop(true, true).addClass('-faded');
                } else {
                    stickyNav.stop(true, true).removeClass('-faded');
                }
            }
        }, 100));
    }

    /* # Hamburger Navigation */

    window.handleHamburgerMenu = function () {
        $('.hamburger-nav').addClass('visible').find('.menu > li').each(function (i) {
            var link = $(this);
            setTimeout(function () {
                link.addClass('showed');
            }, 150 + i * 40);
        });
    };

    function handleNavigations() {

        // Mobile menu
        var menuNow = 0;
        var doubleClickLink = Boolean($('.nav').attr('data-mobile-menu-second-click-link'));

        $('[data-js="hamburger"]').on("click", function () {
            handlePopup('.nav .slide-in-overlay');
        });

        $('[data-js="close-popup"], .overlay, .-mobile #site-navigation a').on("click", function () {
            $('#mega-menu-sub-' + menuNow).removeClass('active');
            $('#mega-menu-sub-' + menuNow).removeAttr('id');
            menuNow--;
            $('#site-navigation').removeClass('active');
            $('.close-menu').css('right', '-100%');
            $('.hamburger').removeClass('hidden');
            $('#masthead .search').removeClass('visible');

            if (Clb.isMobileMenu || Clb.isTablet) {
                closePopup($('.nav .slide-in-overlay'));
            }
        });

        if (Clb.isTablet) {
            $(document).on('keydown', function (e) {
                if (e.keyCode == 27) {
                    closePopup($('.nav .slide-in-overlay'));
                }
            });
        } else {
            $(document).on('click', function(event){
                if ( !$(event.target).hasClass('sub-menu-wide') && !$(event.target).parents('.nav-item').find('.sub-menu-wide').length) {
                    $('.sub-menu-wide').parent().removeClass('active');
                }
            });
        }

        $('a.menu-link').on('click', function () {
            if ($(this).attr('href').includes('#')) {

                menuNow = 0;
                $('[id^="mega-menu-sub-"]').removeClass('active');
                $('[id^="mega-menu-sub-"]').removeAttr('id');
                $('#site-navigation').removeClass('active');
                $('.close-menu').css('right', '-100%');
                $('.hamburger').removeClass('hidden');
                $('#masthead .search').removeClass('visible');
                closePopup($('.clb-popup.hamburger-nav'));
                closePopup($('.header .slide-in-overlay.menu-slide-in-overlay.visible'));
            }
        });

        $('.has-submenu > a').off().on('click touchend', function (e) {
            if (!Clb.isTablet && !Clb.isMobileMenu) {
                return;
            }

            var mainSubMenu = $(this).parents('.sub-menu');
            var parent = $(this).parent();

            if (parent.hasClass('active')) {
                const isCloseIcon = this.querySelector('.has-submenu-icon').contains(e.target);

                if (doubleClickLink && !isCloseIcon) {
                    return;
                }

                // Reset active and height for inner items
                parent.removeClass('active');

                var subMenu = parent.find('.sub-menu, .sub-sub-menu');


                if (subMenu.hasClass('sub-menu')) {
                    parent.find('active').removeClass('active');
                } else {
                    var subMenuHeight = subMenu.data('sub-menu-height');

                    if ( $(this).parents('.sub-menu, .sub-sub-menu').length && Clb.isMobileMenu) {

                        $(this).parents('.sub-menu, .sub-sub-menu').each(function(){

                            subMenuHeight += $(this).data('sub-menu-height');

                            var subSubMenuHeight = 0;
                            $(this).find('.active > .sub-sub-menu').each(function(){
                                subSubMenuHeight += $(this).data('sub-menu-height')
                            });

                            $(this).css('height', $(this).data('sub-menu-height') + subSubMenuHeight)
                        });
                    }

                    if (Clb.isMobileMenu) {
                        mainSubMenu.css('height', mainSubMenu - subMenuHeight);
                    }
                }
            } else {
                var subMenu = parent.find('> .sub-menu, > .sub-sub-menu');

                // Reset active and height
                parent.siblings().removeClass('active');
                parent.siblings().find('.mega-menu-item').removeClass('active');

                if (Clb.isMobileMenu) {
                    if (subMenu.hasClass('sub-menu')) {
                        parent.siblings().find('.sub-menu, .sub-sub-menu');
                    } else {
                        parent.siblings().find('.sub-menu, .sub-sub-menu');
                        mainSubMenu.css('height', subMenu.data('sub-menu-height'));
                    }
                }

                parent.addClass('active');

                // Add active and calculate height
                if (Clb.isMobileMenu) {
                    if (subMenu.hasClass('sub-menu')) {
                        subMenu.css('height', subMenu.data('sub-menu-height'));
                    } else {
                        var subMenuHeight = subMenu.data('sub-menu-height');

                        subMenu.css('height', subMenu.data('sub-menu-height'));


                        if ($(this).parents('.sub-menu, .sub-sub-menu').length) {

                            $(this).parents('.sub-menu, .sub-sub-menu').each(function () {

                                subMenuHeight += $(this).data('sub-menu-height');

                                var subSubMenuHeight = 0;
                                $(this).find('.active > .sub-sub-menu').each(function () {
                                    subSubMenuHeight += $(this).data('sub-menu-height')
                                });

                                $(this).css('height', $(this).data('sub-menu-height') + subSubMenuHeight)
                            });
                        }

                        mainSubMenu.css('height', subMenuHeight);
                    }
                }
            }

            e.preventDefault();
        });

        $('#mega-menu-wrap .sub-sub-menu').each(function () {
            if ($(this).offset().left + $(this).outerWidth() > $(window).width()) {
                $(this).addClass('menu-left');

                var menuPosition = $(this).outerWidth();
                $(this).css('left', - menuPosition);
            }
        });

        /* # Fullscreen hamburger menu */

        $('[data-js="hamburger"]').on('click', function (e) {
            e.preventDefault();
            handleHamburgerMenu();
        });

        var closeMenu = function () {
            $('.hamburger-nav').removeClass('visible').find('.menu > li').each(function (i) {
                $(this).removeClass('showed active');
            });
        };

        $('[data-js="close-hamburger-menu"]').on('click', function () {
            closeMenu();
        });

        $('.sub-menu-wide').parent().mouseover(function(){
            wideMenuOnLoadPosition();
        });

        var fullscreenMenu = $('.hamburger-nav-holder');

        if (fullscreenMenu.length) {
            var hamburgerMenuHolder = fullscreenMenu.parents('.hamburger-nav');

            var isCentered = hamburgerMenuHolder.hasClass('type2') || hamburgerMenuHolder.hasClass('type3');

            if ( isCentered ) {
                var megaMenuItem = fullscreenMenu.find('.mega-menu-item');

                megaMenuItem.each(function(){
                    var self = $(this).find('> a');
                    self.find('> span').clone().addClass('cloned').appendTo(self);

                    self.find('.has-submenu-icon').addClass("icon-button -small");
                });

                var menuIcons = fullscreenMenu.find('.has-submenu > a .has-submenu-icon');

                menuIcons.off().on('click touchend', function (e) {
                    e.preventDefault();

                    var parent = $(this).parent().parent();

                    if (!parent.hasClass('active')) {
                        //Reset active and height
                        parent.siblings().removeClass('active');
                        parent.siblings().find('.mega-menu-item').removeClass('active');
                        parent.addClass('active');

                    } else if (parent.hasClass('active')) {
                        //Reset active and height for inner items
                        parent.removeClass('active');
                    }
                });
            }
        }
    }

    /* # Wide menu */

    function wideMenuOnLoadPosition() {

        var $subMenu = $('.nav-container .sub-menu-wide');

        $subMenu.each(function(){
            var wideMenuOffsetLeft = $(this).parent().find('.menu-link').offset().left,
                windowHeight = $(window).height(),
                menuSpacer = (windowHeight / 100) * 3,
                wideMenuPosition = wideMenuOffsetLeft - menuSpacer;

            $(this).css('left', (wideMenuPosition) * -1);
        });
    }

    function wideMenuOnResizePosition() {

        var $subMenu = $('.nav-container .sub-menu-wide');

        $subMenu.css('left', '');

        setTimeout(function(){
            $subMenu.each(function(){
                var wideMenuOffsetLeft = $(this).parent().find('.menu-link').offset().left,
                    windowHeight = $(window).height(),
                    menuSpacer = (windowHeight / 100) * 3,
                    wideMenuPosition = wideMenuOffsetLeft - menuSpacer;

                $(this).css('left', (wideMenuPosition) * -1);
            });
        }, 1000);
    }

    /* # Sticky footer */

    function handleFooter() {
        var stickyFooter = $('.site-footer.sticky');
        if (stickyFooter.length && !Clb.isTablet) {
            $('.site-content').css({
                'margin-bottom': stickyFooter.outerHeight() + 'px',
            });
            stickyFooter.addClass('visible');
        }
    };

    /* # Components */

    /* ## Accordion */

    // Logical height of an accordion-collapse: inline style if set (that's
    // the transition target), otherwise the current rendered height.
    function getCollapseHeight($collapse) {
        var el = $collapse[0];
        var inline = el ? parseFloat(el.style.height) : NaN;
        return isNaN(inline) ? $collapse.outerHeight() : inline;
    }

    // Grow/shrink every active-ancestor collapse by `delta` so outer accordions
    // accommodate inner state changes. Using a known delta avoids reading
    // animated geometry mid-transition.
    function refreshAccordionAncestors(accordion, delta) {
        if (!delta) return;
        accordion.parents('.accordion-item.active').each(function () {
            var $collapse = $(this).children('.accordion-collapse');
            if (!$collapse.length) return;
            $collapse.css('height', (getCollapseHeight($collapse) + delta) + 'px');
        });
    }

    function handleAccordionBox() {
        $('[data-ohio-accordion]').each(function () {
            var accordion = $(this);
            var items = accordion.children('.accordion-item');
            var titles = items.children('.accordion-button');

            var toggle = function (num) {
                var $item = items.eq(num);
                var $itemCollapse = $item.children('.accordion-collapse');
                var opened = items.filter('.active');

                if (!$item.hasClass('active')) {
                    var oldOpenedHeight = opened.length
                        ? getCollapseHeight(opened.children('.accordion-collapse'))
                        : 0;

                    items.removeClass('active');
                    $item.addClass('active');

                    setTimeout(function () {
                        $itemCollapse.css('height', '');
                        var height = $itemCollapse.children('.accordion-body').outerHeight();

                        setTimeout(function () {
                            opened.children('.accordion-collapse').css('height', '');
                            $itemCollapse.css('height', height + 'px');
                            refreshAccordionAncestors(accordion, height - oldOpenedHeight);
                        }, 30);
                    }, 30);
                } else {
                    var itemHeight = getCollapseHeight($itemCollapse);
                    $item.removeClass('active');
                    $itemCollapse.css('height', '');
                    refreshAccordionAncestors(accordion, -itemHeight);
                }
            };

            titles.each(function (i) {
                $(this).on('click', function () {
                    toggle(i);
                });
            });

            this.accordionToggle = toggle;
        });
    };
    $(window).on('ohio:handle_accordion_box', handleAccordionBox);

    function handleAccordionBoxSize() {
        setTimeout(function(){
            // Innermost first so outer body measurements include inner heights.
            var accordions = $('[data-ohio-accordion]').get().reverse();
            // Suppress transitions during init: outerHeight() reflects the
            // interpolated layout box during a CSS transition, so without this
            // each outer's measurement would read its inner descendant as still
            // mid-animation (≈ old height) and undersize the outer.
            var $allCollapses = $('[data-ohio-accordion] > .accordion-item > .accordion-collapse');
            $allCollapses.css('transition', 'none');

            $.each(accordions, function (_, el) {
                var $self = $(el);
                var activeItem = $self.children('.accordion-item.active');
                if (!activeItem.length) return;
                var collapse = activeItem.children('.accordion-collapse');
                var wrap = collapse.children('.accordion-body');
                collapse.css('height', wrap.outerHeight() + 'px');
            });

            // Force a reflow before restoring transitions so the just-set
            // heights are committed without animating from 0.
            if ($allCollapses.length) $allCollapses[0].offsetHeight;
            $allCollapses.css('transition', '');
        }, 100);
    };
    $(window).on('ohio:handle_accordion_box_size', handleAccordionBoxSize);

    /* ## Contact form */

    function handleSubscribeContactForm() {
        // Button
        $('.contact-form').each(function () {
            var submit = $(this).find('[type="submit"]');
            var button = $(this).find('[data-button-contact="true"] button');

            if (submit.length) {
                button.html(submit.val());
                submit.replaceWith(button);
                $(this).find('.ajax-loader').remove();
            }

            // For focus
            if ($(this).hasClass('without-label-offset')) {
                $(this).find('.wpcf7-form-control-wrap').after('<div class="focus"></div>');

                $(this).find('input, textarea, select').on('focus', function () {
                    $(this).parent().parent().find('.focus').addClass('active');
                }).on('blur', function () {
                    $(this).parent().parent().find('.focus').removeClass('active');
                });
            }
        });

        // Loader
        $('.contact-form form').on('submit', function () {
            var btn = $(this).find('[data-button-loading]');

            if (btn.hasClass('-link')) {
                btn.addClass("btn-loading");
                // btn.find('.text').css('display', 'none');
            } else {
                btn.addClass("btn-loading");
            }
        });

        $(document).on('wpcf7spam wpcf7invalid wpcf7mailsent wpcf7mailfailed wpcf7submit ', function (e) {
            var form = $('.contact-form');
            $(form).find('[data-button-loading]').removeClass("btn-loading");

            if ($(form).find('[data-button-loading]').hasClass('-link')) {
                // $(form).find('[data-button-loading] .text').css('display', 'block');
            }
        });
    }
    $(window).on('ohio:handle_contact_forms', handleSubscribeContactForm);

    /* ## Circle Progress */

    function handleCircleProgressBar() {

        var circleProgressBar = $('[data-circle-progress]');
        circleProgressBar.each(function(i){
            var _this = $(this);

            var progressValue = $(this).find('.progress-value')[0];
            var value = $(_this).data('percent-value');

            const radius = progressValue.r.animVal.value;
            const circumference = 2 * Math.PI * radius;

            function progress(value) {
                var progress = value / 100;
                var dashoffset = circumference * (1 - progress);
                progressValue.style.strokeDashoffset = dashoffset;
            }

            progressValue.style.strokeDasharray = circumference;
            if (value < 0) value = 0;
            if (value > 100) value = 100;
            progress(value);

            var counters = _this.find(".range .range-value")[0];

            var count = function(start, value, i) {
                var localStart = start;

                setInterval(function() {
                    if (localStart < value) {
                        localStart++;
                        counters.innerHTML = localStart;
                    }
                }, 1000 / value);
            }

            count(0, value, i);

        });
    }
    $(window).on('ohio:handle_circle_progress_bar', handleCircleProgressBar);

    /* ## Compare */

    function handleCompareShortcodes() {
        $('[data-compare]').each(function() {
            var $this = $(this);

            $this.compare({
                no_overlay:   $this.data('compare-without-overlay'),
                before_label: $this.data('compare-before-label'),
                after_label:  $this.data('compare-after-label'),
                orientation:  $this.data('compare-orientation'),
                default_offset_pct: parseFloat($this.data('compare-position')),
            });

            var twentyHandle = $this.find('.compare-handle');
            twentyHandle.find('.compare-left-arrow, .compare-right-arrow').remove();
            twentyHandle.each(function(){
                $(this).append('<button class="icon-button" aria-label="Drag"><i class="icon"></i></button>');
            });
        });
    }
    $(window).on('ohio:handle_compare_shortcodes', handleCompareShortcodes);

    /* ## Counter */

    function handleCounterBox() {
        $( '[data-counter]' ).each(function () {
            var counter = $(this);
            var scrollTop = $(document).scrollTop() + $(window).height();

            if (scrollTop > counter.offset().top + counter.height()) {
                var countEnd = parseInt(counter.attr('data-counter').replace(/\s/g, ''));
                counter.removeAttr('data-counter');

                for (var j = 0; j <= 20; j++) {
                    (function (count) {

                        setTimeout(function () {
                            var number = Math.round((countEnd / 20) * count);

                            counter.find('.number').html(number);
                        }, 50 * count);

                    })(j);
                }
            }
        });
    };
    $(window).on('ohio:handle_counter_box', handleCounterBox);

    /* ## Countdown */

    function handleCountdown() {
        $( '[data-countdown]' ).each(function () {
            const targetDate = new Date( this.getAttribute( 'data-date' ) );
            if ( isNaN( targetDate ) ) return;

            const [ months, days, hours, minutes, seconds ] = Array.from( this.querySelectorAll( '.countdown-item .number' ) );

            jQuery(this).countdown(targetDate, ({offset}) => {
                seconds.innerHTML = offset.seconds;
                minutes.innerHTML = offset.minutes;
                hours.innerHTML = offset.hours;
                days.innerHTML = offset.daysToMonth; // always days to month since we don't use weeks
                months.innerHTML = offset.months;
            });
        });
    };
    $(window).on('ohio:handle_countdown_box', handleCountdown);


    /* ## Dynamic text */

    function handleOhioDynamicTextSc() {
        $( 'div[data-dynamic-text="true"]' ).each(function () {
            var options = JSON.parse($(this).attr('data-dynamic-text-options'));
            new Typed('#' + $(this).attr('id') + ' .dynamic', options);
        });
    }
    setTimeout(function () {
        $(window).on('ohio:handle_ohio_dynamic_text', handleOhioDynamicTextSc);
    }, 1000)

    /* ## Gallery */

    function handleGallery() {
        // Open popup
        $('body').on('click', '[data-gallery-item]', function () {
            Clb.body.addClass('gallery-opened');
            var gallery = $(this).closest('[data-gallery]'),
                popup = $('#' + gallery.attr('data-gallery')),
                images = gallery.find('.gallery-item'),
                options = popup[0].options;

            if ($('.site-footer.sticky').length && !Clb.isMobile) {
                Clb.header.css('z-index', '1');
            }
            handlePopup(popup);


            if ($(this).closest('.ohio-widget').length) {
                // gallery in custom content
                var image = $(this).find('.gimg').eq(0);
            } else if ($('.single-product').length) {
                // single product main gallery
                var image = $(this).parents('.woo-product-image-slider').find('.gimg').eq(0);
            } else {
                // fallback
                var image = $(this).find('.gimg').eq(0);
            }

            // Clone image for move
            var cloneImg = image.clone().css({
                'height': image.outerHeight()+'px',
                'top': image.offset().top - $(window).scrollTop(),
                'left': image.offset().left,
            }).addClass('gallery-tmpimage');

            // Create slider
            var slider = $(document.createElement('div')).addClass('slider');
            popup.find('.clb-popup-holder').append(slider);
            // Generated slider
            images.each(function () {

                var div = $(document.createElement('div'));

                div.addClass('image-wrap').append($(this).find('.gimg').eq(0).clone());

                var imgDetails = $(this).find('.card-details');
                if (imgDetails.length) {
                    var description = imgDetails.clone();
                    div.append(description).addClass('with-description');

                    if ($(window).width() > 787) {
                        setTimeout(function () {
                            div.find('.image-wrap').css('height', 'calc(100% - ' + (description.outerHeight() - 5) + 'px)')
                        }, 10);
                    }
                }
                slider.append(div);
            });

            var imageNumber = $(this).attr('data-gallery-item');

            slider.clbSlider({
                navBtn: true,
                drag: true,
                dots: false,
                startSlide: imageNumber
            });

            // Move tmp image

            $(document.body).append(cloneImg);

            var sliderImg = slider.find('img.gimg').eq(imageNumber);

            setTimeout(function(){
                cloneImg.css({
                    'height': sliderImg.outerHeight() + 'px',
                    'top': (sliderImg.offset().top - popup.offset().top) + 'px',
                    'left': '',
                    'margin-left': '-' + (sliderImg.outerWidth() / 2) + 'px'
                }).addClass('active');
                slider.addClass('ready');
                // Open slider, remove tmp image
                setTimeout(function(){
                    slider.addClass('visible');
                }, 200);

                setTimeout(function(){
                    cloneImg.remove();
                }, 800);
            }, 100);
        });
    }
    $(window).on('ohio:handle_gallery', handleGallery);

    /* ## Horizontal Accordion */

    function handleHorizontalAccordion() {
        var accordion = $('.horizontal-accordion');

        accordion.each(function(){
            var selfAccordion = $(this);
            var items = selfAccordion.children('.horizontal-accordion-item');
            var percent = Clb.isMobile ? 90 : 100 - (100 / (items.length - 1));
            var i = items.length,
                z = 1,
                t = items.length - 1;
            var currentItem;
            var currentItemIndex;

            if (Clb.isMobile) {
                items.removeAttr('style');
            } else {
                items.eq(0).addClass('active');

                // z-index for each items by descending
                for (; i > 0; i--) {
                    items.eq(i-1).css({
                        'z-index': z
                    });

                    if (i > 1) {
                        items.eq(i-1).css({
                            'transform': 'translateX(-'+ percent * t + '%)'
                        });
                        t--;
                    }
                    z++;
                }

                items.on('click', function(i){
                    currentItem = $(this);
                    currentItemIndex = items.index(currentItem);
                    openItem(items, currentItemIndex, currentItem, selfAccordion, percent);

                    if (selfAccordion.children('.horizontal-accordion-item.moved').length) {
                        selfAccordion.addClass('open');
                    } else {
                        setTimeout(function(){
                            selfAccordion.removeClass('open');
                        }, 400);
                    }
                });
            }
        });

        function openItem(items, currentItemIndex, currentItem, selfAccordion, percent) {
            var movedItems;
            var movingItems;
            var movingItemsIndex = currentItemIndex;

            if (currentItem.hasClass('moved')) {
                movedItems = selfAccordion.children('.horizontal-accordion-item.moved');
                movingItems = movedItems.slice(currentItemIndex, movedItems.length);

                movedItems.each(function(i){
                    if (i >= movingItemsIndex) {
                        setTimeout(function(){
                            movedItems.eq(movingItemsIndex).css('transform', 'translateX(-'+ percent * (movingItemsIndex) +'%)');
                            movingItemsIndex++;
                        }, 50 * i);
                    }

                });
                movingItems.removeClass('moved');
                items.removeClass('active');
                currentItem.addClass('active');
            } else {
                movingItems = items.slice(0, currentItemIndex).addClass('moved');

                movingItems.each(function(i){
                    setTimeout(function(){
                        items.eq(i).css('transform', 'translateX(-'+ percent * (i + 1) +'%)');
                    }, 50 * i);
                });

                items.removeClass('active');
                currentItem.addClass('active');
            }
        }
    }
    $(window).on('ohio:handle_accordion_horizontal_box', handleHorizontalAccordion);

    /* ## Instagram */

    function handleInstagramFeed() {
        var instaFeed = $('.sbi');

        instaFeed.each(function(){
            var instaLink = $(this).find('a.sbi_photo');
            instaLink.addClass('-unlink').attr('data-cursor-class', 'cursor-link');
        });
    }

    /* ## Parallax */

    function initParallax() {
        $('[data-parallax-bg]').each(function () {
            var parallax = $(this);
            parallax.parent('.wpb_wrapper').addClass('full-height');
            var bg = parallax.find('.parallax-bg');
            var speed = parallax.attr('data-parallax-speed');
            parallax.data('oldHeight', bg.height());
            parallax.data('isHeadlineLoad', true);

            if (parallax.attr('data-parallax-bg') == 'vertical') {
                parallax.find('.parallax-bg').css({
                    height: (parallax.outerHeight() + speed * 200) + 'px'
                });
            } else {
                parallax.find('.parallax-bg').css({
                    width: (parallax.outerWidth() + speed * 200) + 'px'
                });
            }
            bg.addClass((parallax.attr('data-parallax-bg') == 'vertical') ? '' : 'horizontal');
        });
    };

    function handleParallax() {
        var contentScroll = $(document).scrollTop();
        var wndHeight = $(window).height();

        $('[data-parallax-bg]').each(function () {
            var parallax = $(this);
            var parallaxTop = parallax.offset().top;
            var parallaxHeight = parallax.outerHeight();
            var parallaxWidth = parallax.outerWidth();

            // If parallax block on screen
            if (parallaxTop <= contentScroll + wndHeight && parallaxTop + parallaxHeight >= contentScroll) {

                var speed = parseFloat(parallax.attr('data-parallax-speed')) * 100;
                var bg = parallax.find('.parallax-bg');
                var newHeight = bg.height();
                var oldHeight = parallax.data('oldHeight');

                var percent = (-parallaxTop + contentScroll + wndHeight) / (parallaxHeight + wndHeight);
                var offset = -(percent * 2) * speed;
                if (parallax.parents('.page-headline').length && parallax.data('isHeadlineLoad')) {
                    if (parallax.attr('data-parallax-bg') == 'vertical') {
                        bg.css('transform', 'translate3d(0, ' + (-(newHeight - oldHeight) / 2) + 'px, 0)');
                        parallax.data('isHeadlineLoad', false)
                    }
                } else {
                    if (parallax.attr('data-parallax-bg') == 'vertical') {
                        bg.css('transform', 'translate3d(0, ' + offset + 'px, 0)');
                        if (parallax.parents('.page-headline').length) {
                            bg.css('transition', 'transform linear 0.1s');
                        }

                    } else {
                        bg.css('transform', 'translate3d(' + offset + 'px, 0, 0)');
                    }
                }
            }
        });
    };

    /* ## Progress */

    function handleProgressBar() {

        $("[data-ohio-progress-bar]:not([data-processed])").each(function () {

            var percent,
                bar = $(this),
                line = bar.find('.progress-bar'),
                progressEnd = parseInt(bar.attr("data-ohio-progress-bar")),
                withTooltip = bar.find('[data-tooltip]').length;

            var scrollTop = $(document).scrollTop() + $(window).height();

            if (line.length == 0 && bar.hasClass('split')) {
                var div = $(document.createElement('div')).addClass('line-split');

                div.append($(document.createElement('div')).addClass('line brand-bg-color'));

                for (var i = 0; i < 8; i++) {
                    var div = div.clone();

                    bar.find('.line-wrap').append(div);

                    div.find('.line').css({
                        'left': -(div.offset().left - bar.offset().left) + 'px'
                    });
                }

                if (withTooltip) {
                    bar.find('.line-wrap').append('<div class="line"><h4 class="line-percent"><span class="percent">0</span>%</h4></div>');
                }

                line = bar.find('.line');
            }

            percent = bar.find('.percent');

            if (scrollTop > bar.offset().top + bar.height()) {

                bar.attr("data-processed", "true");
                if (bar.hasClass('inner')) {
                    line.css("width", progressEnd + "%");
                } else {
                    line.css("width", progressEnd + "%");
                }

                for (var j = 0; j <= 40; j++) {
                    (function (count) {
                        setTimeout(function () {
                            percent.html(Math.round((progressEnd / 40) * count));
                        }, 30 * count);
                    })(j);
                }
            }
        });
    }
    $(window).on('ohio:handle_progress_bar', handleProgressBar);

    /* ## Sliders */

    function handleSliders(image) {

        if (image === undefined) {
            image = $('.gimg');
        }

        $('[data-ohio-slider]').each(function () {
            var carousel = $(this);
            var options = $(this).attr('data-ohio-slider');
            options = (options) ? JSON.parse(options) : {};

            if (options.autoplay) {
                options.autoplayTimeout = options.autoplayTimeout * 1000;
            }

            options.items = +options.itemsDesktop || 5,
            options.responsive = {
                1180: {
                    items: +options.itemsTablet || 3,
                },
                768: {
                    items: +options.itemsMobile || 1,
                }
            };

            delete options.itemsDesktop;
            delete options.itemsTablet;
            delete options.itemsMobile;

            carousel.clbSlider(options);

            if (carousel.hasClass('with-preloader')) {
                carousel.addClass('visible');
                carousel.parent().find('.sk-preloader').addClass('hidden');
            }

            carousel.find('.cloned .elementor-invisible').removeClass('elementor-invisible');
        });

        $('[data-ohio-slider-simple]').each(function () {
            var carousel = $(this);

            carousel.clbSlider({
                dots: false,
                verticalScroll: false,
                loop: true,
                autoHeight: true
            }).on('clb-slider.changed', function(){
                setTimeout(function () {
                    $('.ohio-masonry').masonry();
                }, 250);
            });

            carousel.find('.cloned .elementor-invisible').removeClass('elementor-invisible');
        });
    }
    $(window).on('ohio:handle_sliders', handleSliders);

    function handleFullscreenSlider() {
        var onepage = $('[data-fullscreen-slider]');
        if (onepage.length) {

            var options = JSON.parse(onepage.attr('data-options'));

            onepage.clbSlider(options);

            var onepageOffset = onepage.offset().top;
            var onepageHeight = onepage.height();
            var divNav = $('.header .hamburger, .header .hamburger-outer, .header .menu-blank, .header .menu-optional .lang-dropdown, .header .menu-optional .icon-button:not(.-small), .header .menu-optional .cart-button-total, .header:not(.-mobile) .menu > li > a');
            var pagination = onepage.find('.clb-slider-nav-btn .icon-button, .clb-slider-pagination .clb-slider-page');
            var dots = onepage.find('.clb-slider-nav-dots .clb-slider-dot');
            var social = $('.social-bar');
            var search = $('.search-global');
            var scroll = $('.scroll-top');
            var switcher = $('.color-switcher-item.dark');

            onepage.on('clb-slider.changed', function(){
                var item = onepage.find('.clb-slider-outer-stage > .clb-slider-stage > .clb-slider-item.active');
                var activedot = onepage.find('.clb-slider-nav-dots .clb-slider-dot.active');
                var paginationColor = item.data('pagination-color');
                var menuColor = item.data('header-nav-color');
                var socialColor = item.data('social-networks-color');
                var searchColor = item.data('search-color');
                var scrollColor = item.data('scroll-to-top-color');
                var logoType = item.data('header-logo-type');

                divNav.css( 'transition', 'none' );
                pagination.css( 'transition',  'none' );
                dots.css( 'transition',  'none' );
                activedot.css( 'transition',  'none' );
                social.css( 'transition',  'none'  );
                search.find('.ion').css( 'transition',  'none' );
                scroll.css( 'transition',  'none');
                switcher.css( 'transition',  'none');

                divNav.css( 'color', menuColor ? menuColor : '' );
                pagination.css( 'color', ( paginationColor ) ? paginationColor : '' );
                dots.css( 'color', ( paginationColor ) ? paginationColor : '' );
                activedot.css( 'border-color', ( paginationColor ) ? paginationColor : '' );
                social.css( 'color', ( socialColor ) ? socialColor : '' );
                search.css( 'color', ( searchColor ) ? searchColor : '' );
                scroll.css( 'color', ( scrollColor ) ? scrollColor : '' );
                switcher.css( 'color', ( scrollColor ) ? scrollColor : '' );

                if( logoType ){
                    if ( Clb.logo.length && Clb.fixedLogo.length ) {
                        $([Clb.logo[0], Clb.fixedLogo[0]]).css({
                            'position': 'absolute',
                            'width': '0px',
                            'height': '0px',
                            'overflow': 'hidden'
                        });
                    }

                    if( logoType == 'dark' && Clb.logoForOnepageDark ){
                        if ( Clb.logoForOnepageLight ) {
                            Clb.logoForOnepageLight.addClass('hidden');
                        }
                        Clb.logoForOnepageDark.removeClass('hidden');
                    }
                    if( logoType == 'light' && Clb.logoForOnepageLight ){
                        if ( Clb.logoForOnepageDark ) {
                            Clb.logoForOnepageDark.addClass('hidden');
                        }
                        Clb.logoForOnepageLight.removeClass('hidden');
                    }
                } else {
                    defaultLogo();
                }

                setTimeout(function(){
                    divNav.css( 'transition', '' );
                    pagination.css( 'transition', '' );
                    dots.css( 'transition', '' );
                    activedot.css( 'transition', '' );
                    social.css( 'transition', '' );
                    search.find('.ion').css( 'transition', '' );
                    scroll.css( 'transition', '' );
                }, 300);
            });

            if ( $(window).scrollTop() > (onepageOffset) || $(window).scrollTop() < onepageOffset) {
                toggleSliderScrollBar('hide-all');
            }

            $(window).on( 'scroll', function(){
                if ($(window).scrollTop() > (onepageOffset + onepageHeight) || $(window).scrollTop() < onepageOffset) {
                    divNav.css( 'color', '' );
                    defaultLogo();
                }

                if ( $(window).scrollTop() > (onepageOffset) || $(window).scrollTop() < onepageOffset) {
                    toggleSliderScrollBar('hide');
                } else {
                    toggleSliderScrollBar('show');
                }
            });
        }

        function defaultLogo() {
            if ( Clb.logoForOnepageDark ) {
                Clb.logoForOnepageDark.addClass('hidden');
            }
            if ( Clb.logoForOnepageLight ) {
                Clb.logoForOnepageLight.addClass('hidden');
            }
            $([Clb.logo[0], Clb.fixedLogo[0]]).css({
                'position': '',
                'width': '',
                'height': '',
                'overflow': ''
            });
        }
    }
    $(window).on('ohio:handle_fullscreen_sliders', handleFullscreenSlider);

    function toggleSliderScrollBar(toggle) {
        var scrollTop = $('.scroll-top:not(.slider-scroll-label)');
        var sliderSCrollTop = $('.slider-scroll-label ');

        if (toggle == 'show') {
            scrollTop.addClass('invisible').removeClass('visible');
            sliderSCrollTop.addClass('visible').removeClass('invisible');
        } else if (toggle == 'hide') {
            scrollTop.addClass('visible').removeClass('invisible');
            sliderSCrollTop.addClass('invisible').removeClass('visible');
        } else if (toggle == 'hide-all') {
            scrollTop.addClass('invisible').removeClass('visible');
            sliderSCrollTop.addClass('invisible').removeClass('visible');
        }
    }

    /* ## Tabs  */

    function handleTabBox() {
        $('[data-ohio-tabs]').each(function () {
            const box = $(this);
            const itemsWrap = box.children('.tabs-content');
            const items = itemsWrap.children('.tabs-content-item');

            if (!items.length) {
                return;
            }

            const buttonsWrap = box.children('.tabs-nav');
            const line = buttonsWrap.find('.tabs-nav-line');

            const options = (box.attr('data-options')) ? JSON.parse(box.attr('data-options')) : {};
            const tabClass = options.tabClass || '';
            const tabActiveClass = options.tabActiveClass || '';

            let buttons = buttonsWrap.find('.tabs-nav-link');

            // Build tabs and icons
            if (!buttons.length) {
                items.each(function() {
                    const $this = $(this);
                    const title = $this.attr('data-title');
                    const subtitle = $this.attr('data-subtitle');
                    const icon = $this.attr('data-icon') || '';

                    const titleHtml = (title && title !== "0") 
                        ? `<span class="title titles-typo">${title}</span>` 
                        : '';

                    // Check if subtitle exists
                    const hasSubtitle = subtitle && subtitle !== "0";
                    const subtitleHtml = hasSubtitle 
                        ? `<p class="subtitle">${subtitle}</p>` 
                        : '';

                    // Dynamic class for the container
                    const containerClass = hasSubtitle ? 'container -with-subtitle' : 'container';

                    const iconHtml = (icon) 
                        ? `<i class="icon ${icon}"></i>` 
                        : '';

                    const buttonHtml = `
                        ${iconHtml}
                        <span class="${containerClass}">
                            ${titleHtml}
                            ${subtitleHtml}
                        </span>
                    `;

                    const $button = $('<li>', {
                        class: `tabs-nav-link ${tabClass}`,
                        role: 'tab',
                        html: buttonHtml
                    });

                    buttonsWrap.append($button);
                });

                buttons = buttonsWrap.find('.tabs-nav-link');
                buttons.first().addClass(`active ${tabActiveClass}`);
            }

            if (!items.is('.active')) {
                items.eq(0).addClass('active');
            }

            items.addClass(options.itemClass);

            const refresh = function () {
                const active = buttonsWrap.find('.active');

                if (!active.length) return;

                // Determine if we should use Vertical (Height/TranslateY) or Horizontal (Width/TranslateX)
                let isVertical;

                if (box.hasClass('-tabs-with-subtitle')) {
                    // Subtitles always stay vertical (per your requirement)
                    isVertical = true;
                } else if (box.hasClass('-vertical')) {
                    // Standard vertical layout: only vertical on desktop
                    isVertical = !Clb.isMobile;
                } else {
                    // Everything else is horizontal
                    isVertical = false;
                }

                if (isVertical) {
                    // Vertical Indicator Logic
                    line.css({
                        'width': '',
                        'height': active.outerHeight() + 'px',
                        'transform': 'translateY(' + (active.offset().top - buttonsWrap.offset().top) + 'px)'
                    });
                } else {
                    // Horizontal Indicator Logic
                    const lineWidth = active.outerWidth();
                    const lineTransform = active.offset().left - buttonsWrap.offset().left + buttonsWrap.scrollLeft();

                    line.css({
                        'height': '',
                        'width': lineWidth + 'px',
                        'transform': 'translateX(' + lineTransform + 'px)'
                    });
                }
            };

            buttons.on('click', function () {
                buttons.removeClass('active ' + tabActiveClass).addClass(tabClass);
                items.removeClass('active');

                $(this).addClass('active ' + tabActiveClass);
                items.eq($(this).index() - 1).addClass('active');

                if (Clb.isMobile) {
                    buttonsWrap.animate({ scrollLeft: this.offsetLeft + 'px' }, { queue: false });
                }

                refresh();
            });

            refresh();
        });
    };
    $(window).on('ohio:handle_tab_box', handleTabBox);

    /* ## Team Group */

    function handleGroupTeam() {
        $('[data-team-group]').each(function () {
            var box = $(this),
                items = $(this).find('[data-item]'),
                triggers = $(this).find('[data-trigger]');

            var selected = -1;

            var itemWidth = 100 / (triggers.length + 1);

            $('.team-group-item').css('min-width', itemWidth  + '%');

            var openItem = function (num) {
                items.removeClass('active');
                var item = items.eq(num).addClass('active');

                if (selected != num && !Clb.isMobile) {
                    selected = num;

                    item.css('min-width', '');

                    item.css('min-width', '0');

                    setTimeout(function () {
                        var width = item.find(">").outerWidth();

                        items.css('min-width', '0');
                        item.css('min-width', (width) + 'px');
                    }, 30);
                }
            };

            triggers.on('mouseenter', function () {
                openItem(triggers.index($(this)));
            });

            openItem(0);

        });
    }
    $(window).on('ohio:handle_cover_box', handleGroupTeam);

    /* ## Team Group Size */

    function handleGroupTeamSize() {
        $('[data-team-group]').each(function () {
            var box = $(this);

            box.find('[data-item]').each(function (i) {

                if (!Clb.isMobile) {
                    $(this).css('height', box.find('[data-trigger]').eq(i).find('>').outerHeight() + 'px');
                    $(this).find(' > * ').css('width', box.find('[data-trigger]').eq(i).outerWidth() + 'px');
                } else {
                    $(this).css({
                        'height': '',
                        'width': ''
                    });

                    $(this).find(' > * ').css({
                        'height': '',
                        'width': ''
                    });
                }
            });
        });
    }
    $(window).on('ohio:handle_cover_box_size', handleGroupTeamSize);

    /* ## Video Background */

    function handleVideoBackground() {
        $('[data-arg-video-bg]').each(function () {
            var videoLink = $(this).attr('data-arg-video-bg');
            var iframe = $(document.createElement('iframe'));

            iframe.addClass('arg-video-bg').attr('src', videoLink);
            $(this).append(iframe);
        });
    }

    /* ## Theme Popup */

    function handlePopup(data) {
        $(data).each(function(){
            // Activate popup
            $(this).addClass('visible');
            $(this).find('[data-button-loading]').addClass('btn-loading');
        });
    }

    $(document).on('keydown', function (e) {
        var popup = $('.clb-popup');

        if (e.keyCode == 27) {
            closePopup(popup);
        }
    });

    $('body').on('click keydown', '[data-js="close-popup"]', function (e) {
        e.preventDefault(e);
        var popup = $(this).closest('.clb-popup');
        closePopup(popup);
    });

    function closePopup(popup) {
        // Close button
        setTimeout(function () {
            popup.removeClass('visible');
            popup.find('.clb-popup-holder').empty();
            popup.find('.clb-popup-holder').removeClass().addClass('clb-popup-holder');

            if ($('.site-footer.sticky').length && !Clb.isMobile) {
                Clb.header.css('z-index', '1000');
            }
        }, 200);
    }

    /* ## Video popup */

    function handleVideoPopup() {
        $(document).on('click', '.video-button', function (event) {
            event.preventDefault();
            var videoPopup = $('.clb-popup.custom-popup');
            var link = $(this).attr('data-video');

            handlePopup(videoPopup);

            var popupInner = videoPopup.find('.clb-popup-holder').addClass('clb-video-popup');
            popupInner.siblings('[data-button-loading]').removeClass('btn-loading');

            // Appending
            if ($(this).attr('data-video-type') === 'custom') {
                popupInner.append($(document.createElement('video')).attr({
                    'autoplay': 'true',
                    'controls': 'true'
                }));
                videoPopup.find('video').append('<source src="' + link + '"></source>');
            } else {
                popupInner.append($(document.createElement('iframe')).attr({
                    'src': link,
                    'allowfullscreen': 'true',
                    'frameborder': '0'
                }));
            }
            setTimeout(function(){
                $('.clb-popup').removeClass('container-loading');
            }, 1000)
        });
    }

    /* # Portfolio */

    function handlePortfolio() {
        // Filter
        $('[data-ohio-portfolio-grid]').each(function () {
            var portfolioGrid = $(this);
            var isotopeGrid = $(this).find('[data-isotope-grid]');
            var filterbar = $(this).find('[data-filter="portfolio"]');
            var columnWidthSource = portfolioGrid.find('.grid-item').length == portfolioGrid.find('.double-width').length ? '.double-width' : '.grid-item:not(.double-width)';
            var gridItem = portfolioGrid.find(columnWidthSource).filter(':visible');
            var itemWidth = (gridItem.length) ? gridItem[0].getBoundingClientRect().width : 0;

            if (isotopeGrid.isotope) {
              setTimeout(function(){
                isotopeGrid.isotope({
                  percentPosition: true,
                  masonry: {
                    columnWidth: itemWidth
                  }
                });
              }, 10);
            } else {
                console.log('Isotope Grid is undefined');
            }

            // Generate category numbers
            if (filterbar.attr('data-filter-paged')) {
                filterbar.find('a').each(function () {
                    var category = $(this).attr('data-isotope-filter');

                    var number = (category == '*') ? isotopeGrid.find('> div').length : isotopeGrid.find(category).length;

                    if (number < 10) {
                        number = '0' + number;
                    }

                    $(this).find('.num').html(number);
                });
            }

            filterbar.find('a').on('click', function () {
                filterbar.find('.active').removeClass('active');
                $(this).addClass('active');

                if (isotopeGrid.isotope) {
                    isotopeGrid.isotope({
                        filter: $(this).attr('data-isotope-filter'),
                        masonry: {
                            percentPosition: true,
                            columnWidth: itemWidth,
                            itemSelector: '.grid-item:not(.double-width)',
                        }
                    });
                }

                setTimeout(function () {
                    if (typeof(AOS) != 'undefined') {
                        AOS.refresh();
                    }
                    if (window.vc_waypoints) {
                        window.vc_waypoints();
                    }
                    if ( portfolioGrid.find('.lazy-load').length ) {
                        if (isFilterItemsHidden(portfolioGrid)) {
                            lazyLoad($('[data-lazy-load]'));
                        }
                    }
                }, 600);
                portfolioGridType12();
                return false;
            });

            $('body').on('ohio:lazy_load_complete', function(){
                portfolioGrid.find('.lazy-load').removeClass('is-loading');
                portfolioGrid.find('.portfolio-grid').removeClass('is-loading');
            });

            if (window.location.hash) {
                filterbar.find('a[href="' + window.location.hash + '"]').trigger('click');
            }
        });
    }

    function isFilterItemsHidden(portfolioGrid) {
        var isHidden = false;
        var counter = 0;
        var itemsPerPage = $("[data-projects-per-page]").data('projects-per-page');
        var categoryCount = portfolioGrid.find('[data-category-count].active').data('category-count');
        var lazyLoadPagination = portfolioGrid.find(".lazy-load");
        lazyLoadPagination.addClass('is-loading');
        portfolioGrid.find('.portfolio-grid').addClass('is-loading');

        $('[data-ohio-portfolio-grid]').each(function () {
            var gridItems = $(this).find('[data-filter="portfolio"]').next().find(".grid-item");

            gridItems.each(function(){

                if ( $(this)[0].style.display == "none" ) {
                    isHidden = true;
                } else {
                    counter++;
                    if ( counter >= itemsPerPage || counter == categoryCount) {
                        isHidden = false;
                        lazyLoadPagination.removeClass('is-loading');
                        portfolioGrid.find('.portfolio-grid').removeClass('is-loading')
                        return isHidden;
                    }
                }
            });
        });

        return isHidden;
    }

    $(window).on('ohio:handle_portfolio', handlePortfolio);

    function handlePortfolioPopup(){
        var portfolioPopupSlider = $('.project-lightbox-gallery .slider');

        var loopSetting         = Boolean(portfolioPopupSlider.attr('data-slider-loop')),
            navSetting          = Boolean(portfolioPopupSlider.attr('data-slider-navigation')),
            bulletsSetting      = Boolean(portfolioPopupSlider.attr('data-slider-dots')),
            paginationSetting   = Boolean(portfolioPopupSlider.attr('data-slider-pagination')),
            mousescrollSetting  = Boolean(portfolioPopupSlider.attr('data-slider-mousescroll')),
            autoplaySetting     = Boolean(portfolioPopupSlider.attr('data-slider-autoplay')),
            autoplayTimeSetting = portfolioPopupSlider.attr('data-slider-autoplay-time');


        $('[data-clb-portfolio-lightbox-slider]').each(function(){
            if (!$(this).hasClass('clb-slider')) {
                $(this).clbSlider({
                    dots: bulletsSetting,
                    pagination: paginationSetting,
                    mousewheel: mousescrollSetting,
                    autoplay: autoplaySetting,
                    autoplayTimeout: autoplayTimeSetting,
                    loop: loopSetting,
                    navBtn: navSetting,
                    drag: true,
                });
            }
        });

        portfolioPopupSlider.find('.clb-slider-nav-btn .btn-round').removeClass('btn-round-light');

        $('[data-js="open-project-lightbox"]').on('click', function(e) {
            e.preventDefault();
            var portfolioItemId = $(this).parents('.portfolio-item').attr('data-portfolio-popup');

            if (portfolioItemId != undefined) {
                var lightboxElement = document.querySelector( '#' + portfolioItemId );
                loadLightboxGallery.call( lightboxElement );
                startLightboxVideo( lightboxElement );
                handlePopup( '#' + portfolioItemId );
            }

        });
    }
    $(window).on('ohio:handle_portfolio_popup', handlePortfolioPopup);

    function loadLightboxGallery() {
        if ( !this.getAttribute( 'data-lightbox-loaded' ) ) {
            var self = this;
            var stage = self.querySelector( '.project-lightbox-gallery' );
            var loaded = 0;

            stage.classList.add( 'container-loading' );

            $(this).find( '[data-ohio-lightbox-image]' ).each(function() {
                var originalImage = this;
                var image = new Image();
                image.src = originalImage.getAttribute( 'data-ohio-lightbox-image' );
                image.onload = function() {
                    originalImage.style.backgroundImage = "url(" + image.src + ")";
                    loaded++;

                    if (loaded === $(self).find( '[data-ohio-lightbox-image]' ).length) {
                        stage.classList.remove( 'container-loading' );
                        self.setAttribute( 'data-lightbox-loaded', true );
                    }
                }
            });
        }
    }

    function startLightboxVideo( lightboxElement ) {
        var videoUrl = $(lightboxElement).find('[data-lightbox-video-url]');
        if (!videoUrl.length) return;

        var target = videoUrl.find('[data-lightbox-video-target]');
        target.attr('src', videoUrl.attr('data-lightbox-video-url'));
    }

    /* # Lazy load */

    function lazyLoad(elem) {
        if ( elem.data( 'lazy-load-loading' ) ) {
            return;
        }

        let currentPage = elem.data( 'lazy-page' ) ? parseInt( elem.data( 'lazy-page' ) ) : 1;
        let pagesCount = parseInt(elem.attr('data-lazy-pages-count'));
        if ( currentPage >= pagesCount ) {
            elem.remove();
            return;
        }

        // Init
        elem.data( 'isLoaded', false );
        elem.data( 'lazy-load-loading', 'true' ).addClass( 'active' );

        let lazyLoaButton = elem.find( '.button' );
        lazyLoaButton.addClass( 'btn-loading' );

        currentPage += 1;

        elem.data( 'lazy-page', currentPage );

        // Prepare request data
        let requestURL = '';
        let data = false;

        if ( !elem.data( 'lazy-load-shortcode' ) ) {
            let urlPattern = elem.data( 'lazy-load-url-pattern' );
            if (urlPattern) {
                requestURL = urlPattern.replace( '{{page}}', currentPage );
            } else {
                requestURL = 'page/' + currentPage;
            }
        } else {
            data = {
                shortcode: elem.data( 'lazy-load-shortcode' ),
                params: elem.data( 'lazy-load-params' ),
                paged: currentPage,
                action: 'ohio_lazy_load_shortcodes'
            };
            requestURL = elem.data( 'lazy-load-rest' );
        }

        const scopeSlug = elem.data('lazy-load-scope');
        const itemsSelector = `[data-lazy-item][data-lazy-scope="${scopeSlug}"]`;
        const elementUUID = elem.data('lazy-load-id');

        // Get page content
        $.ajax({
            url: requestURL,
            data: data,
            method: (data) ? 'POST' : 'GET',
            success: function (content) {
                /*
                    If possible, locate the items container within the same parent as the calling paginator.
                    Else get the first container on the page with the same paginator scope.
                */
                const findContainer = (paginator, root) => {
                    const containerSelector = `[data-lazy-container="${scopeSlug}"]`;

                    // The case for theme templates
                    let container = paginator.parent().find(containerSelector);
                    if (container.length) return container;

                    // The case for Elementor templates
                    container = paginator.parent().parent().find(containerSelector);
                    if (container.length) return container;

                    // Fallback to the first container on the page
                    return root.find(containerSelector);
                };
                const dom = $(new DOMParser().parseFromString(content, 'text/html'));
                const paginator = dom.find('[data-lazy-load-id="' + elementUUID + '"]');

                const containerFrom = findContainer(paginator, dom);
                const containerTo = findContainer(elem, $(document.body));

                const items = containerFrom.find(itemsSelector);

                items.parent().find('[data-aos]').attr('data-aos-offset', '20000000');
                items.addClass('hidden');

                var images = items.find('img');
                // Start preloading images used as background-image: url()...
                var backgroundImages = items.find('[data-ohio-bg-image]')
                    .toArray()
                    .map(function(el) {
                        var img = new Image();
                        img.src = el.getAttribute('data-ohio-bg-image');
                        return img;
                    });
                var allImages = images.toArray().concat(backgroundImages);

                containerTo.append(items);
                images.removeAttr('loading');
                $(document.body).append(dom.find('[data-lazy-to-footer]'));

                var initUI = function () {
                    items.removeClass('hidden');
                    handlePortfolioPopup();
                    handlePortfolio();

                    var portfolio_data_grid = containerTo.hasClass('portfolio-grid') && containerTo.isotope;
                    var woo_data_grid = containerTo.attr('data-shop-masonry') && containerTo.isotope;

                    if (portfolio_data_grid || woo_data_grid) {
                        containerTo
                            .isotope()
                            .isotope('appended', items)
                            .isotope('layout');
                    }

                    if (containerTo.hasClass('ohio-masonry') || containerTo.hasClass('masonry')) {
                        containerTo.masonry('appended', items, false);
                    }

                    items.parent().find('[data-aos]').attr('data-aos-offset', '');

                    if (typeof(AOS) != 'undefined') {
                        // For mobile phones
                        AOS.init();

                        AOS.refresh();
                    }

                    handleOhioBgImages();
                    items.find('[data-tilt]').tilt();

                    if (currentPage >= parseInt(elem.attr('data-lazy-pages-count'))) {
                        $('body').data('lazy-items', items);

                        elem.remove();
                    } else {

                        // Wait height animation
                        elem.removeClass('active');
                        lazyLoaButton.removeClass( 'btn-loading' );
                        if (elem.attr('data-lazy-load') == 'scroll') {
                            setTimeout(function () {
                                elem.removeData('lazy-load-loading');
                                handleLazyLoadScroll();

                            }, 500);
                        } else {
                            elem.removeData('lazy-load-loading');
                        }
                    }

                    $('body').trigger('ohio:lazy_load_complete');
                    $('body').trigger('ohio:cursor_mouseleave');
                }
                var waitForImages = function (images) {
                    return Promise.all(images.map(function (image) {
                        if (image.complete) return Promise.resolve();
                        return new Promise(function (resolve) {
                            image.onload = resolve;
                            image.onerror = resolve;
                        });
                    })).then(function () {
                        images.forEach(function (image) { image.onload = null; image.onerror = null; });
                    });
                };

                waitForImages(allImages).then(initUI);

                handleProjectInteractiveLinks();
                if (Clb.isDesktop) {
                    handlePortfolioMovingDetailsGrid();
                }
                setTimeout(function(){
                    portfolioGridType12();
                }, 100)


                elem.data( 'isLoaded', true );
            }
        });
    }

    function handleLazyLoadScroll() {
        $('[data-lazy-load="scroll"]').each(function () {
            if ($(document).scrollTop() + $(window).height() > $(this).offset().top) {
                lazyLoad($(this));
            }
        });
    }

    function handleLazyLoadClick() {
        $('[data-lazy-load="click"]').on('click', function () {
            lazyLoad($(this));
        });
    }

    function handleAOS() {
        if (typeof(AOS) != 'undefined') {
            setTimeout(function () {
                AOS.init();
            }, 600);
        }
    }

    // Flipping Effect

    function handleFlippingBannerText() {
        var slides = $('.offer-banner.flipping .offer-banner-item'), counter = 0;
        var flipInterval = $('.offer-banner').data('flipping-interval');
        function nextSlide() {
            var nextSlideIndex = counter === slides.length - 1 ? 0 : counter + 1;
            slides.removeClass('is-visible').removeClass('is-next').removeClass('no-transition').removeClass('visible');
            slides.eq(counter).addClass('is-visible');
            slides.eq(nextSlideIndex).addClass('is-next');
            if (++counter == slides.length) counter = 0;

            setTimeout(nextSlide, flipInterval);
        }
        nextSlide();
    }

    function handleStretchContent() {
        if ( !$('.page-sidebar').length ) {

            $('[data-vc-stretch-content="true"], [data-vc-full-width="true"], [data-ohio-stretch-content="true"], .-alignfull').each(function () {
                if (Clb.isRtl) {
                    $(this).css('right', '0');
                    $(this).css({
                        'width': $('#page').width() + 'px',
                        'right': ($('#page').offset().left - $(this).offset().left) + 'px'
                    });
                } else {
                    $(this).css('left', '0');
                    $(this).css({
                        'width': $('#page').width() + 'px',
                        'left': ($('#page').offset().left - $(this).offset().left) + 'px'
                    });
                }
            });

            $('[data-vc-full-width="true"]').not('[data-vc-stretch-content="true"]').each(function () {
                var padding = ($('#page').outerWidth() - $(this).closest('.page-container').outerWidth()) / 2;
                if ( !Clb.isMobile ) {
                    padding = padding + 10;
                }
            });

            $('.rev_slider_wrapper.fullwidthbanner-container, .rev_slider_wrapper.fullscreen-container').each(function () {
                $(this).css('padding-left', $('#page').offset().left + 'px');
            });

            setTimeout(function () {
                var revSliders = $('.rev_slider');
                if (revSliders.revredraw) {
                    revSliders.revredraw();
                }
            }, 30);
        }
    }

    window.ohioRowRefresh = handleStretchContent;

    function handleScrollEffects() {
        $('[data-ohio-scroll-anim]').each(function () {
            var anim = $(this).attr('data-ohio-scroll-anim');

            if ($(this).offset().top < ($(window).scrollTop() + $(window).height() - 50)) {
                $(this).removeClass(anim).removeAttr('data-ohio-scroll-anim');
            }
        });
    }

    function handleOhioHeight() {
        var windowHeight = $(window).height();
        var footerHeight = $('.site-footer').outerHeight();
        var headerCapHeight = ($('.header-cap').length) ? $('.header-cap').outerHeight() : 0;
        var wpAdminHeight = ($('#wpadminbar').length) ? $('#wpadminbar').outerHeight() : 0;
        var headerTitleHeight = ($('.page-headline').length) ? $('.page-headline').outerHeight() : 0;

        $('[data-ohio-full-height]').each(function () {
            var height = windowHeight - footerHeight - headerCapHeight - wpAdminHeight - headerTitleHeight;

            $(this).css('height', (height) + 'px');
        });
    }

    function handleAlignContentInStretchRow(){
        var container = $('#content');

        if (!container.length) {
            return;
        }

        var containerWidth = container.outerWidth();
        var halfContainer = containerWidth/2 - $('#content .page-container').width()/2;

        // Align content column in wrapper container
        var align = function( self, isParallax, isRight, innerSection ){
            if (innerSection) {
                var column = self.find( '> .wpb_column > .vc_column-inner, > .elementor-container > .elementor-row > .elementor-column > .elementor-column-wrap .elementor-widget-wrap, > .elementor-container  > .elementor-column > .elementor-widget-wrap' );
            } else {
                var column = self.find( '> .wpb_column, > .elementor-container > .elementor-row > .elementor-column > .elementor-column-wrap .elementor-widget-wrap, > .elementor-container  > .elementor-column > .elementor-widget-wrap' );
            }

            if( isParallax ){

                column = self.find( '> .parallax-content' );
            }
            column = ( isRight ) ? column.last() : column.eq(0);

            if ( Clb.isRtl ) {
                if( !Clb.isMobile ){
                    column.css( 'padding-' + ( isRight ? 'left' : 'right' ), ( halfContainer ) + 'px' );
                } else {
                    column.css( 'padding-' + ( isRight ? 'left' : 'right' ), '' );
                }
            } else {
                if( !Clb.isMobile ){
                    column.css( 'padding-' + ( isRight ? 'right' : 'left' ), ( halfContainer ) + 'px' );
                } else {
                    column.css( 'padding-' + ( isRight ? 'right' : 'left' ), '' );
                }
            }
        };

        // Stretch column
        var stretch = function( self, isRight, innerSection ){

            if (innerSection) {
                var column = self.find('> .wpb_column > .vc_column-inner, > .elementor-container > .elementor-row > .elementor-column > .elementor-column-wrap, > .elementor-container  > .elementor-column > .elementor-widget-wrap');
            } else {
                var column = self.find('> .wpb_column > .vc_column-inner > .wpb_wrapper, > .elementor-container > .elementor-row > .elementor-column > .elementor-column-wrap, > .elementor-container  > .elementor-column > .elementor-widget-wrap, > .elementor-element > .e-con-inner > .e-con > .e-child');
            }
            column.css('min-width', '');

            column = ( isRight ) ? column.last() : column.eq(0);
            column.css({ 'position': '', 'left': '', 'width': '' }).addClass('stretch-content');

            if ( column.length ) {
                if ( Clb.isRtl ) {
                    if ( isRight ) {
                        column.css( 'min-width', (containerWidth - (column.offset().left + column.outerWidth() )) + 'px');
                    } else {
                        column.css({
                            'position': 'relative',
                            'right': -(($(window).width() - (column.offset().left + column.outerWidth()))  ) + 'px',
                            'min-width': ( (column.outerWidth()) + ($(window).width() - (column.offset().left + column.outerWidth()))  ) + 'px'
                        });
                    }
                } else {
                    if ( isRight ) {
                        column.css( 'min-width', (containerWidth - column.offset().left ) + 'px');
                    } else {
                        column.css({
                            'position': 'relative',
                            'left': -( column.offset().left) + 'px',
                            'min-width': ( column.offset().left + column.outerWidth() ) + 'px'
                        });
                    }
                }

                if ( Clb.isMobile ) {
                    column.css({
                        'min-width': '',
                        'left': '',
                        'right': ''
                    });
                }
            }
        };

        $('.clb-column-padding-left').each(function(){
            align( $(this), $(this).hasClass('parallax'), false, $(this).hasClass('inner') );
        });

        $('.clb-column-padding-right').each(function(){
            align( $(this), $(this).hasClass('parallax'), true, $(this).hasClass('inner') );
        });

        $('.clb-stretch-column-left, [data-ohio-stretch-column-left]').each(function(){
            stretch( $(this), false, $(this).hasClass('inner') );
        });

        $('.clb-stretch-column-right, [data-ohio-stretch-column-right]').each(function(){
            stretch( $(this), true, $(this).hasClass('inner') );
        });
    }

    function handleMutationObserver() {
        var target = $('#sb_instagram #sbi_images, #order_review, .portfolio-grid, [data-lazy-load-scope="projects"]');
        if (target != undefined) {
            target.each(function () {
                var target = this;
                var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
                var observer = new MutationObserver(function (mutations) {
                    mutations.forEach(function (mutation) {
                        if ( $(target).attr('id') == 'sbi_images') {
                            if ( mutation.addedNodes.length ) {
                                instagramFeedCustomCursor();
                                observer.disconnect(); //Can disconect whole function 'handleMutationObserver'
                            }
                        }

                        if ( $(target).attr('id') == 'order_review') {
                            if ( mutation.addedNodes.length ) {
                                btnPreloader();
                                observer.disconnect(); //Can disconect whole function 'handleMutationObserver'
                            }
                        }

                        if ( $(target).hasClass('lazy-load')) {

                            if ( mutation.oldValue.indexOf('active') != -1 ) {
                                if ($(target).data('isLoaded')) {

                                    var portfolioGrid = $(target).parent();
                                    if (portfolioGrid.find('.portfolio-filter').length) {
                                        setTimeout(function () {
                                            if (isFilterItemsHidden(portfolioGrid)) {
                                                lazyLoad($('[data-lazy-load]'));
                                            }
                                        }, 1000);
                                    }
                                }
                            }
                        }
                    });
                });

                // Settings observer
                var config = {
                    attributes: true,
                    characterData: true,
                    childList: true,
                    subtree: true,
                    attributeOldValue: true,
                    characterDataOldValue: true,
                }

                // Start observer
                observer.observe(this, config);
            });
        }
    }

    /* Btn preloader */

    function btnPreloader() {
        var buttons = $('[data-button-loading]');
        btnLoading(buttons);

        function btnLoading(btn) {
            btn.each(function () {
                $(this).on('click', function () {

                    var form = $(this).parents('form');
                    var validation = true;

                    form.find('[required]').each(function() {
                        if (!$(this).val()) {
                            validation = false
                        }
                    });

                    if (!($(this).hasClass('disabled')) && validation) {
                        $(this).toggleClass('btn-loading');
                        $(this).find('i').hide();
                    }
                });
            });
        }
    }

    /* Hide empty language container */

    $(function () {
        var language = $('.header-wrap .right .languages');

        if (language.find('.sub-nav.languages').children().length == 0) {
            language.hide();
        }
    });

    function setLogoCentered() {
        /*header-4 centered logo*/
        var header = $('.header-4');
        var headerNav = header.find('.nav');

        //Menu-others have to be equal width
        header.find('.left-part, .right-part').css('width', menuOtherEqualWidth(header));

        var siteBrand = $('.branding');
        var navMenu = $('#mega-menu-wrap').find('> ul:not(.mobile-menu) > li');
        var logoWidth = siteBrand.outerWidth() - ($(window).width() * 0.0135);
        var centerLi = findCenterLi(navMenu);
        var firstMenuItemsWidth = 0;
        var lastMenuItemsWidth = 0;
        var menuLinkPadding = $(navMenu[centerLi]).find('> .menu-link').css('padding-left');
        var headerNavOffset = 0;

        navMenu.each(function(i){
            if (i > centerLi) {
                lastMenuItemsWidth += $(this).width();
            } else {
                firstMenuItemsWidth += $(this).width();
            }
        });

        if ( Clb.body.hasClass('rtl') ) {
            headerNavOffset = siteBrand.offset().left - lastMenuItemsWidth + (parseInt(menuLinkPadding) / 2);
            $(navMenu[centerLi]).css('margin-left', logoWidth + "px");
        } else {
            headerNavOffset = siteBrand.offset().left - firstMenuItemsWidth + (parseInt(menuLinkPadding) / 2);
            $(navMenu[centerLi]).css('margin-right', logoWidth + "px");
        }

        headerNav.offset({left: headerNavOffset});

        wideMenuOnResizePosition();

        setTimeout(function(){
            header.css('opacity', '1');
        }, 350);

    }

    /* Find center Li element */

    function findCenterLi(menu) {
        if (menu.length % 2 == 0) {
            return Math.round((menu.length / 2) - 1);
        }
        else {
            return Math.round((menu.length / 2) - 2);
        }
    }

    /* Menu other equal width */

    function menuOtherEqualWidth(header) {
        var menuOther = header.find('.left-part, .right-part');
        var menuOtherWidth = 0;

        menuOther.each(function(){
            if (menuOtherWidth < $(this).width() ) {
                menuOtherWidth = $(this).width();
            }
        });

        return menuOtherWidth + 1;
    }

    /* Header 6 */

    $.each($('header.header-5'), function () {
        $(".menu-depth-1").removeClass('sub-menu-wide');
    });

    /* Blog filters */

    function handleMobileFilter() {
        var filter = $('[data-js="filter-slidein"]');

        $('[data-js="open-filter-slidein"]').on('click', function () {
            event.preventDefault();
            handlePopup('.ordering-filters-holder .slide-in-overlay');
        });

        $('[data-js="close-filter-slidein"]').on('click', function () {
            closePopup(filter)
        });

        $(document).on('keydown', function (e) {
            if (e.keyCode == 27) {
                closePopup(filter);
            }
        });
    }

    /* Filters handler */

    $('.ordering-filters select').change(function() {
        let $selected = $(this).find('option:selected');
        if ($selected.attr('data-select-href')) {
            window.location.assign($selected.attr('data-select-href'));
        }
    });

    /* Product review */

    function handleProductReview() {
        var LINK_HASH = '#product_review';
        var navigateToProductReviews = function() {
            var tabsContainer = $('.single-product-tabs');
            var tabsOffset = $(tabsContainer).offset().top;

            tabsContainer.find('.tabs-nav-link[data-ohio-tab="reviews"]').click();

            $('body,html').animate({
                scrollTop: tabsOffset
            }, 1000);
        };

        if (window.location.hash.startsWith(LINK_HASH)) {
            navigateToProductReviews();
        }

        $('a[href="' + LINK_HASH + '"], .woo-review-link').on('click', function() {
            navigateToProductReviews();
        });
    }

    /* Subscribe popup */

    function SubscribeModal() {

        var data = {
            action: 'ohio_subscribe_modal'
        };

        jQuery.post(ohioVariables.url, data, function (data) {
            handlePopup('.clb-popup.subscribe-popup');
            var popupInner = $('.clb-popup.subscribe-popup .clb-popup-holder');
            popupInner.append(data);

            var wpcf7_form = $('.wpcf7-form');
            [].forEach.call(wpcf7_form, function (form) {
                wpcf7.init(form);
                handleSubscribeContactForm();
            });
        });
    }

    function handleSubscribeModal() {
        switch (ohioVariables.subscribe_popup_type) {
            case 'time':
                setTimeout(function () {
                    SubscribeModal();
                }, +ohioVariables.subscribe_popup_var * 1000);
                break;
            case 'scroll':
                var ckeck = true;
                $(window).on('scroll', function (e) {
                    var scrollTop = $(window).scrollTop();
                    var docHeight = $(document).height();
                    var winHeight = $(window).height();
                    var scrollPercent = (scrollTop) / (docHeight - winHeight);
                    var scrollPercentRounded = Math.round(scrollPercent * 100);
                    if (ckeck && scrollPercentRounded > ohioVariables.subscribe_popup_var) {
                        SubscribeModal();
                        ckeck = false;
                    }
                });
                break;
            case 'exit':
                var ckeck = true;
                $(document).on('mouseleave', function () {
                    if (ckeck) {
                        SubscribeModal();
                        ckeck = false;
                    }
                });
                break;
        }
    }

    $('[href=\\#subscribe-init]').on('click', function(e){
        e.preventDefault();
        SubscribeModal();
    });

    if (ohioVariables.subscribe_popup_enable && !getCookie('subscribeCookie')) {
        handleSubscribeModal();
    }

    /* Portfolio */

    function handlePortfolioOnepageSlider() {
        var slider = $('[data-portfolio-grid-slider]');
        var portfolio = $('.portfolio-item');

        var loopSetting                 = Boolean(slider.attr('data-slider-loop')),
            navSetting                  = Boolean(slider.attr('data-slider-navigation')),
            bulletsSetting              = Boolean(slider.attr('data-slider-dots')),
            paginationSetting           = Boolean(slider.attr('data-slider-pagination')),
            mousescrollSetting          = Boolean(slider.attr('data-slider-mousescroll')),
            dragScrollSetting           = Boolean(slider.attr('data-slider-dragcroll')),
            autoplaySetting             = Boolean(slider.attr('data-slider-autoplay')),
            autoplayPauseSetting        = Boolean(slider.attr('data-slider-autoplay-pause')),
            sliderOrientation           = Boolean(slider.attr('data-slider-vertical-orientation')),
            sliderOrientationMobile     = Boolean(slider.attr('data-slider-vertical-orientation-mobile')),
            autoplayTimeSetting         = slider.attr('data-slider-autoplay-time');

        slider.each(function(){
            var slider = $(this);

            var sliderOffset = slider.offset().top;
            var sliderHeight = slider.height();

            if (slider.hasClass('grid_3') || slider.hasClass('grid_7') || slider.hasClass('project-slider')) {

                slider.clbSlider({
                    items: 1,
                    loop: loopSetting,
                    mousewheel: mousescrollSetting,
                    navBtn: navSetting,
                    drag: dragScrollSetting,
                    dots: bulletsSetting,
                    pagination: paginationSetting,
                    scrollToSlider: true,
                    autoplay: autoplaySetting,
                    autoplayTimeout: autoplayTimeSetting,
                    autoplayHoverPause: true,
                    verticalScroll: sliderOrientation,
                    responsive: {
                        768: {
                            verticalScroll: sliderOrientationMobile
                        }
                    }
                });

                fadeoutSliderItemAnimation(slider);
                removePerspectiveWhileScrolling(slider);
            } else if (slider.hasClass('grid_4')) {
                slider.clbSlider({
                    items: 1,
                    loop: loopSetting,
                    mousewheel: mousescrollSetting,
                    navBtn: navSetting,
                    drag: true,
                    dots: false,
                    pagination: paginationSetting,
                    scrollToSlider: true,
                    verticalScroll: sliderOrientation,
                    autoplay: autoplaySetting,
                    autoplayTimeout: autoplayTimeSetting,
                    autoplayHoverPause: true,
                    responsive: {
                        768: {
                            verticalScroll: sliderOrientationMobile
                        }
                    }
                });

                fadeoutSliderItemAnimation(slider);
                removePerspectiveWhileScrolling(slider);
            } else if (slider.hasClass('grid_6')) {
                const columns = slider.attr( 'data-slider-columns' ).split( '-' );

                slider.clbSlider({
                    items: +columns[0] || 3,
                    loop: loopSetting,
                    mousewheel: mousescrollSetting,
                    navBtn: navSetting,
                    drag: true,
                    dots: false,
                    pagination: paginationSetting,
                    scrollToSlider: true,
                    autoplay: autoplaySetting,
                    autoplayTimeout: autoplayTimeSetting,
                    autoplayHoverPause: true,
                    responsive: {
                        768: {
                            items: +columns[2] || 1,
                        },
                        1180: {
                            items: +columns[1] || 2
                        }
                    }
                });

                fadeoutSliderItemAnimation(slider);
                removePerspectiveWhileScrolling(slider);
            } else if (slider.hasClass('grid_5') || slider.hasClass('grid_9') || slider.hasClass('grid_10') ) {
                handleSmoothSlider();
            }

            if ( slider.hasClass('grid_9') ) {
                var nextProjectImg = $('.next-project-img-box');

                nextProjectImg.on('click', function(){
                    $(this).trigger('prev-slide');
                });

                // $('.scroll-top:not(.slider-scroll-label)').hide();
            }

            if ( $(window).scrollTop() > (sliderOffset + (sliderHeight/2) ) || $(window).scrollTop() < sliderOffset - (sliderHeight/2)) {
                toggleSliderScrollBar('hide-all');
            }

            $(window).on( 'scroll', function(){
                if ( $(window).scrollTop() > (sliderOffset + (sliderHeight/2) ) || $(window).scrollTop() < sliderOffset - (sliderHeight/2)) {
                    toggleSliderScrollBar('hide');
                } else {
                    toggleSliderScrollBar('show');
                }
            });

            //Portfolio grid 3 overlay height
            // if (!Clb.isMobile && (portfolio.hasClass('-layout3') || portfolio.hasClass('-layout6'))) {
            //     calcPortfolioSliderEqualOverlay(slider);
            // }
        });
    }
    $(window).on('ohio:handle_portfolio_onepage_slider', handlePortfolioOnepageSlider);

    /* Onepage slider help functions */

    // function calcPortfolioSliderEqualOverlay(slider) {

    //     if (slider === undefined) {
    //         var slider = $('[data-portfolio-grid-slider]');
    //     }

    //     var overlay = slider.find('.overlay');
    //     var overlayHeight = 0;
    //     var height = 0;

    //     overlay.each(function(){
    //         height = $(this).height()
    //         if (overlayHeight < height) {
    //             overlayHeight = height;
    //         }
    //     });
    //     if (!Clb.isMobile) {
    //         overlay.css('height', overlayHeight);
    //     } else {
    //         overlay.removeAttr('style');
    //     }
    // }

    function removePerspectiveWhileScrolling(slider) {
        slider.on('clb-slider.change', function(){
            $(this).addClass('perspective-remove');
        });
        setTimeout(function(){
            slider.on('clb-slider.changed', function(){
                $(this).removeClass('perspective-remove');
            });
        }, 500);
    }

    function fadeoutSliderItemAnimation(slider) {
        slider.on('clb-slider.next-change', function(){

            var activeItems = slider.find('.clb-slider-item.active');
            activeItems.eq(0).addClass('last-active');

            setTimeout(function(){
                activeItems.eq(0).removeClass('last-active');
            }, 1000);

        }).on('clb-slider.prev-change', function(){

            var activeItems = slider.find('.clb-slider-item.active');
            activeItems.eq(activeItems.length - 1).addClass('last-active');

            setTimeout(function(){
                activeItems.eq(activeItems.length - 1).removeClass('last-active');
            }, 1000);

        });
    }

    /* End onepage slider help functions*/

    function handleSmoothSlider(onePage) {
        //Init
        if (onePage === undefined) {
            var onePage = $('.portfolio-onepage-slider');
        }

        onePage.each(function(){
            if (($(this).hasClass('grid_5') || $(this).hasClass('grid_9') || $(this).hasClass('grid_10')) && !$(this).hasClass('clb-smooth-slider')) {
                $(this).addClass('clb-smooth-slider');

                var currentItem = 0;
                var onePageItems = $(this).children().addClass('clb-smooth-slider-item');
                var onePageItemsCount = onePageItems.length;

                //Settings
                var loopSetting          = Boolean($(this).attr('data-slider-loop')),
                    navSetting           = Boolean($(this).attr('data-slider-navigation')),
                    bulletsSetting       = Boolean($(this).attr('data-slider-dots')),
                    paginationSetting    = Boolean($(this).attr('data-slider-pagination')),
                    mousescrollSetting   = Boolean($(this).attr('data-slider-mousescroll')),
                    autoplaySetting      = Boolean($(this).attr('data-slider-autoplay')),
                    autoplayTimeSetting  = $(this).attr('data-slider-autoplay-time');

                $(this).css({
                    'height': onePageItems.height()
                });

                $(window).on('resize', function(){
                    $(this).css({
                        'height': onePageItems.height()
                    });
                });

                onePageItems.css({
                    'position': 'absolute',
                });

                /*Events*/
                $(this).on('next-slide', function(e){
                    nextSlide();
                });

                $(this).on('prev-slide', function(e){
                    prevSlide();
                });

                /*Create elements*/

                //Nav btn
                if (navSetting === true) {
                    var createNavBtn = '<div class="clb-slider-nav-btn"><div class="prev-btn icon-button" tabindex="0"><i class="icon"><svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8,16l1.4-1.4L3.8,9H16V7H3.8l5.6-5.6L8,0L0,8L8,16z"/></svg></i></div><div class="next-btn icon-button" tabindex="0"><i class="icon"><svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"/></svg></i></div></div>';
                    $(this).append($(createNavBtn));
                }
                //Pagination
                if (paginationSetting === true || bulletsSetting === true) {
                    var createPagination = $('<div></div>');
                    var page = $('<div class="clb-slider-page"></div>');
                    if (paginationSetting === true) {
                        createPagination.addClass('clb-slider-pagination');
                        for (var i = 1; i <= onePageItemsCount; i++) {
                            if ( i < 10 ) {
                                page.clone().append('<span class="clb-slider-pagination-index"> 0'+ i +'</span>').appendTo(createPagination);
                            } else {
                                page.clone().append('<span class="clb-slider-pagination-index">'+ i +'</span>').appendTo(createPagination);
                            }
                        }
                    } else {
                        createPagination.addClass('clb-slider-nav-dots');
                        page.addClass('clb-slider-dot');
                        for (var i = 1; i <= onePageItemsCount; i++) {
                            page.clone().appendTo(createPagination);
                        }
                    }

                    createPagination.find('.clb-slider-page:first-child').addClass('active');
                    $(this).append(createPagination);

                    $(onePageItems).removeClass('prev-slide next-slide active');
                    $(onePageItems.slice(0, currentItem)).addClass('prev-slide');
                    $(onePageItems.slice(currentItem + 1 )).addClass('next-slide');
                    $(onePageItems[currentItem]).addClass('active');

                    //pagination
                    var paginationNumbers = $(this).find('.clb-slider-page');
                    var navBtnId = 0;
                    paginationNumbers.on('click', function() {
                        paginationNumbers.removeClass('active');
                        $(this).addClass('active');
                        navBtnId = $(this).index();

                        //navBtnId + 1 because navBtnId start from 0 and slideNow start from 1
                        if (navBtnId != currentItem) {
                            if ( navBtnId + 1 > onePageItemsCount ) {
                                navBtnId = navBtnId - settings.items + 1;
                            }

                            var lastSlide = currentItem
                            currentItem = navBtnId;
                            toSlide(lastSlide);
                        }
                    });
                } else {
                    $(onePageItems[currentItem]).addClass('active');
                    $(onePageItems[onePageItemsCount - 1]).addClass('prev-slide');
                    $(onePageItems[currentItem + 1]).addClass('next-slide');
                }

                /*Script work place*/

                //Nav btn
                $(this).find('.next-btn').on('click', function() {
                    nextSlide();
                });

                $(this).find('.prev-btn').on('click', function() {
                    prevSlide();
                });

                //Key controll
                $(window).on('keydown', function (e) {
                    var key = e.which || e.keyCode;

                    if (key == 37) {
                        prevSlide();
                    }
                    if (key == 39) {
                        nextSlide();
                    }
                });

                //Mouse scroll
                if (mousescrollSetting === true) {
                    if (navigator.userAgent.indexOf('Mac OS X') != -1) {
                        var timeoutDelay = 1300;
                    } else {
                        var timeoutDelay = 1000;
                    }
                    var wheel = true;
                    var top = $(this).offset().top - ( $(window).height() - $(this).outerHeight() ) / 2;
                    $(this).on('wheel mousewheel', function(e){

                        var y = e.originalEvent.deltaY;
                        if ((currentItem == 0 && y > 0) || (currentItem == onePageItemsCount && y < 0)) {
                            $("html, body").animate({ scrollTop: $(this).offset().top + 'px' });
                            e.preventDefault();
                        }

                        if (wheel) {
                            if( y > 0 && currentItem <= onePageItemsCount - 1) {

                                nextSlide();
                                wheel = false;

                                if (loopSetting) {
                                    e.preventDefault();
                                } else {
                                    if ( !(currentItem == onePageItemsCount) ) {
                                        e.preventDefault();
                                    } else {
                                        $('html, body').stop(true, true).finish();
                                    }
                                }
                            } else if (y < 0 && currentItem >= 0) {

                                if (loopSetting) {
                                    e.preventDefault();
                                } else {
                                    if ( !(currentItem == 0) ) {
                                        e.preventDefault();
                                    } else {
                                        $('html, body').stop(true, true).finish();
                                    }
                                }
                                prevSlide();
                                wheel = false;
                            }
                        } else {
                            return false;
                        }

                        setTimeout(function(){
                            wheel = true;
                        }, timeoutDelay);
                    });
                }

                //Touch events

                $(this).on('touchstart', function(e){

                    var cursorPosition = e.originalEvent.touches[0].pageX;

                    $(this).on('touchmove', function(e){

                        var position = e.originalEvent.touches[0].pageX;

                        if ( position + 50 < cursorPosition ) {
                            nextSlide();
                            cursorPosition = e.clientX;
                        } else if (position - 50 > cursorPosition) {
                            prevSlide();
                            cursorPosition = e.clientX;
                        }
                    })


                    $(this)[0].ondragstart = function() {
                    return false;
                    };
                });

                //Autoplay
                if (autoplaySetting === true) {
                    var autoSlideInterval = setInterval(function(){
                        if (!$(this).hasClass('stop-slide')){
                            nextSlide();
                        }
                    }, autoplayTimeSetting);

                    $(this).hover(function() {
                        $(this).addClass('stop-slide');
                    }, function() {
                        $(this).removeClass('stop-slide');
                    });
                }

                //ScrollBar
                const updatePortfolioScrollBar = () => {
                    if ($(this).hasClass('portfolio-onepage-slider')) {
                        let percentage = (100 / onePageItemsCount ) * (currentItem + 1);

                        if (percentage > 100) percentage = 100;

                        $('.scroll-track').css( 'width', percentage + '%');
                    }
                }

                function nextSlide() {

                    if (loopSetting) {
                        if (currentItem + 1 == onePageItemsCount) {
                            currentItem = 0;
                            $(onePageItems).removeClass('active prev-slide last-slide');
                            $(onePageItems[onePageItemsCount - 1]).addClass('prev-slide last-slide');
                        } else if(currentItem + 2 == onePageItemsCount) {
                            $(onePageItems[0]).addClass('next-slide');
                            currentItem++;
                        } else if (currentItem == 0) {
                            $(onePageItems[onePageItemsCount - 1]).removeClass('prev-slide');
                            currentItem++;
                        } else {
                            currentItem++;
                        }
                    } else {
                        currentItem++;
                    }

                    if (paginationSetting) {
                        paginationNumbers.removeClass('active');
                        $(paginationNumbers[currentItem]).addClass('active');
                    }

                    if (!(currentItem == onePageItemsCount)) {
                        $(onePageItems[currentItem - 1]).addClass('last-slide').removeClass('active'); //prev slide
                        $(onePageItems[currentItem - 2]).removeClass('prev-slide'); //other sldies
                        $(onePageItems[currentItem]).removeClass('next-slide').addClass('active'); //active slide

                        $(onePageItems[currentItem - 1]).addClass('prev-slide'); //prev slide
                        $(onePageItems[currentItem + 1]).addClass('next-slide'); //next slide
                        setTimeout(function(){
                            $(onePageItems).removeClass('last-slide');
                        }, 800);

                    }

                    updatePortfolioScrollBar();
                }

                function prevSlide() {
                    if (loopSetting) {
                        if (currentItem <= 0) {
                            currentItem = onePageItemsCount - 1;
                            $(onePageItems).removeClass('active next-slide last-slide');
                            $(onePageItems[0]).addClass('next-slide last-slide');
                        } else if(currentItem == 1) {
                            $(onePageItems[onePageItemsCount - 1]).addClass('prev-slide');
                            currentItem--;
                        } else if(currentItem == onePageItemsCount - 1) {
                            $(onePageItems[0]).removeClass('next-slide');
                            currentItem--;
                        } else {
                            currentItem--;
                        }
                    } else {
                        if (!(currentItem == 0)) {
                            currentItem--;
                        }
                    }

                    if (paginationSetting) {
                        paginationNumbers.removeClass('active');
                        $(paginationNumbers[currentItem]).addClass('active');
                    }

                    if (!(currentItem < 0)) {
                        $(onePageItems[currentItem]).addClass('active').removeClass('prev-slide'); //active slide
                        $(onePageItems[currentItem + 1]).removeClass('active').addClass('last-slide'); //next slide
                        $(onePageItems[currentItem + 2]).removeClass('next-slide').removeClass('last-slide'); //prev slide
                        $(onePageItems[currentItem - 1]).addClass('prev-slide'); //prev-slide
                        $(onePageItems[currentItem + 1]).addClass('next-slide'); //next-slide

                        setTimeout(function(){
                            $(onePageItems).removeClass('last-slide');
                        }, 800);
                    }

                    updatePortfolioScrollBar()
                }

                function toSlide(lastSlide) {
                    $(onePageItems[lastSlide]).addClass('last-slide');
                    $(onePageItems).removeClass('prev-slide next-slide active');
                    $(onePageItems.slice(0, currentItem)).addClass('prev-slide');
                    $(onePageItems.slice(currentItem)).addClass('next-slide');
                    $(onePageItems[currentItem]).addClass('active');
                    $(onePageItems[currentItem - 1]).addClass('prev-slide'); //prev slide
                    $(onePageItems[currentItem + 1]).addClass('next-slide'); //next slide

                    setTimeout(function(){
                        $(onePageItems).removeClass('last-slide');
                    }, 800);

                    updatePortfolioScrollBar();
                }

                updatePortfolioScrollBar();
            }
        });
    }

    function handleScrollMeter() {
        const bHeight = $('body').height();
        const scrolled = $(window).innerHeight() + $(window).scrollTop();

        let percentage = ((scrolled / bHeight) * 100);

        if (percentage > 100) percentage = 100;

        $('.scroll-top:not(.slider-scroll-label) .scroll-track').css( 'width', percentage + '%');
    }

    function handleMasonry() {
        if ($('.ohio-masonry').length) {
            var ALIGNMENT_ATTRIBUTE = 'data-masonry-alignment';
            setTimeout(function () {
                $('.ohio-masonry').each(function () {
                    var columnWidth = '.grid-item';
                    if ($(this).find('.grid-item').length == 0) {
                        columnWidth = '.masonry-block';
                    }
                    var isHorizontalAlignment = !this.hasAttribute(ALIGNMENT_ATTRIBUTE) || this.getAttribute(ALIGNMENT_ATTRIBUTE) === 'horizontal';

                    $(this).masonry({
                        itemSelector: '.masonry-block',
                        columnWidth: columnWidth,
                        horizontalOrder: isHorizontalAlignment,
                        isAnimated: false,
                        hiddenStyle: {
                            opacity: 0,
                            transform: ''
                        }
                    });
                });

                setTimeout(function () {
                    handleAOS();
                }, 50);
            }, 50);
        } else {
            handleAOS();
        }
    }
    $(window).on('ohio:handle_masonry', handleMasonry);

    /* Sticky share bar */

    function handleScrollShareBar() {
        var mediaHolder = $('[data-sticky-share-bar]');
        if (mediaHolder.length) {
            var windowHeigth        = $(window).height()
            var mediaHolderHeight   = mediaHolder.height();
            var mediaHolderOffset   = mediaHolder.offset().top;

            $(window).on('scroll', function(){
                if ($(this).scrollTop() >= (mediaHolderHeight - windowHeigth) + mediaHolderOffset ) {
                    mediaHolder.addClass('scroll-disabled');
                } else {
                    mediaHolder.removeClass('scroll-disabled');
                }
            });
        }
    }

    /* Language dropdown */

    function handleLanguageSelect() {
        var select = $('select.lang-dropdown');

        select.on('change', function(){
            window.location.href = this.value
        });
    }

    function handleDynamicSectionColors(shouldForceLaunch = false) {
        let sections = $('.clb__dark_section, .clb__light_section, .clb__dark_section_fixed');

        if (!shouldForceLaunch && !sections.length) {
            return;
        }

        const calculateOverlapWithSection = (sectionElem, elem) => {
            const sectionRect = sectionElem.getBoundingClientRect();
            const elRect = elem.getBoundingClientRect();

            const elHeight = elRect.height;
            const overlapHeight = Math.max(
                0,
                Math.min(
                    sectionRect.top + sectionRect.height,
                    elRect.top + elHeight
                ) - Math.max(sectionRect.top, elRect.top)
            );

            return overlapHeight / elHeight;
        }

        const dynamicElements = $('.dynamic-typo, .header-dynamic-typo');
        const INTERSECTION_THRESHOLD = 0.5;

        adjustSectionColors($(window));
        let lastCalled = 0;
        let debounceTimer = null;

        $(window).on('scroll', function() {
            const now = Date.now();

            clearTimeout(debounceTimer);

            if (now - lastCalled >= 100) {
                adjustSectionColors();
                lastCalled = now;
            }

            debounceTimer = setTimeout(() => {
                adjustSectionColors();
                lastCalled = now;
            }, 100);
        });

        function adjustSectionColors() {
            const pageContainer = $('#content');

            dynamicElements.each(function () {
                let hasAnySectionApplied = false;
                const dynamicElement = $(this);

                sections.each(function () {
                    const currentSection = $(this);
                    const isStickyFooter = currentSection.hasClass('site-footer sticky');
                    const bodyOverlapArea = isStickyFooter ? calculateOverlapWithSection(pageContainer[0], dynamicElement[0]) : 0;

                    const overlapArea = calculateOverlapWithSection(this, dynamicElement[0]);
                    const meetsThreshold = isStickyFooter
                        ? bodyOverlapArea < overlapArea && overlapArea >= INTERSECTION_THRESHOLD
                        : overlapArea >= INTERSECTION_THRESHOLD;
                    hasAnySectionApplied = meetsThreshold;

                    if (meetsThreshold) {
                        if (currentSection.hasClass('clb__dark_section') || currentSection.hasClass('clb__dark_section_fixed')) {
                            dynamicElement.removeClass('dark-typo').addClass('light-typo');
                        } else if (currentSection.hasClass('clb__light_section')) {
                            dynamicElement.removeClass('light-typo').addClass('dark-typo');
                        }

                        return false;
                    }
                });

                if (!hasAnySectionApplied) {
                    dynamicElement.removeClass('dark-typo light-typo');
                }
            });
        }
        // for reacting to updates in Elementor, in all other scenarios we don't expect new sections to appear dynamically
        $(window).on('ohio:update_dynamic_sections', () => {
          sections = $('.clb__dark_section, .clb__light_section, .clb__dark_section_fixed');
        });
        $(window).on('ohio:update_dynamic_colors', () => {
            adjustSectionColors($(window));
        });
    }


    function handleRemoveSliderBulletsClass() {
        var slider = $('.project-slider.clb-slider, .portfolio-onepage-slider.clb-slider, [data-fullscreen-slider].clb-slider, .portfolio-onepage-slider.clb-smooth-slider');
        var self_window;
        var body = $('body');

        if (slider.length && slider.find('.clb-slider-pagination').length) {
            if (slider.length && slider.offset().top <= $(window).scrollTop() + 50) {
                body.addClass('slider-with-bullets');
            }
        }

        $(window).on('scroll', function(){
            self_window = $(this);
            activeSection(self_window);
        });

        function activeSection(self_window) {
            var st = self_window.scrollTop() + self_window.height() / 2;
            slider.each(function(){

                var sliderOffset = $(this).offset().top ;
                var currentslider = $(this);

                if (sliderOffset + currentslider.outerHeight() > st && st > sliderOffset) {
                    body.addClass('slider-with-bullets');
                    return false;
                } else {
                    body.removeClass('slider-with-bullets');
                }
            });
        }
    }
    $(window).on('ohio:handle_remove_slider_bullets', handleRemoveSliderBulletsClass);

    function handlePageColorSwitcher() {
        var switcherArr = new Object();
        switcherArr['switcher'] = $('.color-switcher');
        switcherArr['switcherDarkWidth'] = 0;
        switcherArr['switcherLightWidth'] = 0;
        switcherArr['switcherToddler'] = switcherArr['switcher'].find('.color-switcher-toddler');
        switcherArr['switcherWidth'] = switcherArr['switcher'].outerWidth();
        switcherArr['transformRtl'] = !Clb.isRtl ? -1 : 1;

        var coloredSections = $('.clb__light_section, .clb__dark_section');

        if (Clb.body.hasClass('dark-scheme')) {
            switcherArr['switcher'].addClass('dark');
        }

        if (document.cookie.indexOf('ohio-switcher-state=dark') != -1) {
            coloredSections.toggleClass('clb__light_section clb__dark_section');
        }

        switcherArr['switcherToddler'].width('auto'); //Reset value on resize

        handlePageColorSwitcherTransform(switcherArr);

        switcherArr['switcher'].removeClass('-invisible');
    }

    function handlePageColorSwitcherClickEvent() {
        var switcherArr = new Object();
        switcherArr['switcher'] = $('.color-switcher');
        switcherArr['switcherDarkWidth'] = 0;
        switcherArr['switcherLightWidth'] = 0;
        switcherArr['switcherToddler'] = switcherArr['switcher'].find('.color-switcher-toddler');
        switcherArr['switcherWidth'] = switcherArr['switcher'].outerWidth();
        switcherArr['transformRtl'] = !Clb.isRtl ? -1 : 1;

        function invertDynamicColors() {
            if (this.classList.contains('dark-typo')) {
                this.classList.remove('dark-typo');
                this.classList.add('light-typo');
            } else if (this.classList.contains('light-typo')) {
                this.classList.remove('light-typo');
                this.classList.add('dark-typo');
            }
        }

        var coloredSections = $('.clb__light_section, .clb__dark_section');
        var scrollTop = $('.scroll-top');
        var socialLinks = $('.social-bar');
        var fixedSearch = $('.search-global.fixed');
        var dynamicHeader = $('.header-dynamic-typo');

        switcherArr['switcher'].on('click', function(){

            switcherArr['switcherWidth'] = switcherArr['switcher'].outerWidth();

            $(Clb.body).addClass('switching');
            $(Clb.body).toggleClass('dark-scheme');
            $(this).toggleClass('dark');

            handlePageColorSwitcherTransform(switcherArr);

            coloredSections.toggleClass('clb__light_section clb__dark_section');
            scrollTop.each(invertDynamicColors);
            socialLinks.each(invertDynamicColors);
            fixedSearch.each(invertDynamicColors);
            dynamicHeader.each(invertDynamicColors);

            if ( ohioVariables && ohioVariables.save_color_mode_state ) {
                document.cookie = 'ohio-switcher-state=' + (($(Clb.body).hasClass('dark-scheme')) ? 'dark' : 'light') + ';path=/';
            }

            setTimeout(function(){
                $(Clb.body).removeClass('switching');
            }, 10);
        });
    }

    function handlePageColorSwitcherTransform(switcherArr) {

        if (switcherArr['switcher'].hasClass('dark')) {
            switcherArr['switcher'].find('.color-switcher-item.dark').css('min-width', 'auto'); //Reset value on resize
            switcherArr['switcher'].find('.color-switcher-item.light').css('min-width', 'auto');
            switcherArr['switcherDarkWidth'] = switcherArr['switcher'].find('.color-switcher-item.dark').outerWidth();
            switcherArr['switcherToddler'].width(switcherArr['switcherDarkWidth']);
            switcherArr['switcher'].find('.color-switcher-item.dark').css('min-width', switcherArr['switcherDarkWidth']);

            if (!Clb.isTablet) {
                switcherArr['switcherToddler'].css('transform', 'translateX(0px)');
            }
        } else {
            switcherArr['switcherToddler'].css('transform, translateX(0)')
            switcherArr['switcher'].find('.color-switcher-item.light').css('min-width', 'auto'); //Reset value on resize
            switcherArr['switcher'].find('.color-switcher-item.dark').css('min-width', 'auto');
            switcherArr['switcherLightWidth'] = switcherArr['switcher'].find('.color-switcher-item.light').outerWidth();
            switcherArr['switcherToddler'].width(switcherArr['switcherLightWidth']);
            switcherArr['switcher'].find('.color-switcher-item.light').css('min-width', switcherArr['switcherLightWidth']);

            if (!Clb.isTablet) {
                var transform = (switcherArr['switcherWidth'] - switcherArr['switcherLightWidth']) * switcherArr['transformRtl'];

                switcherArr['switcherToddler'].css('transform', 'translateX('+ transform +'px)');
            }
        }
    }

    function handleAutoColorMode() {
        if (!$(document.body).hasClass('auto-color-mode')) return;

        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            $(document.body).addClass('dark-scheme');
        }

        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
            $(document.body).toggleClass('dark-scheme');
        });
    }

    function percentagePreloader() {
        var counter = 0;
        var count = 0;
        var isLoad = false;

        $(window).on('load', function(){
            isLoad = true;
        });

        setTimeout(function(){
            var breakPoint = Math.floor(Math.random() * 29) + 70;

            var i = setInterval(function(){
                $(".sk-percentage .sk-percentage-percent").html(count + "%");
                $(".sk-percentage").css("width", count + "%");
                if(counter == 100){
                    clearInterval(i);
                    setTimeout(function(){
                        $("#page-preloader").addClass('hidden');
                    }, 10)

                } else if (counter == breakPoint) {

                    if (isLoad) {
                        counter++;
                        count++;
                    } else {
                        counter = breakPoint;
                        count = breakPoint;
                    }

                } else {
                    counter++;
                    count++;
                }
            }, 12);
        });
    }

    function handleProjectInteractiveLinks() {
        var grid = $('[data-interactive-links-grid]');

        grid.each(function() {
            var grid = $(this);
            var gridItems = grid.find('.portfolio-item-wrap');
            InteractiveLinksFeaturedImages(grid);
            var gridImages = grid.find('.portfolio-grid-images .portfolio-item-image')

            gridItems.each(function(){
                var self = $(this);

                self.mouseenter( function(){
                    self.find('.portfolio-item').addClass('visible');
                    gridItems.find('.portfolio-item').not('.visible').addClass('invisible');
                    gridImages.eq(self.index()).addClass('active');
                }).mouseleave( function(){
                    gridItems.find('.portfolio-item').removeClass('invisible visible');
                    gridImages.removeClass('active');
                });
            });
        });

    }
    $(window).on('ohio:handle_interactive_links_grid', handleProjectInteractiveLinks);

    function InteractiveLinksFeaturedImages(grid) {
        var featureImage = grid.find('[data-ohio-bg-image]');
        var featureImageContainer = grid.find('.portfolio-grid-images');
        featureImageContainer.empty();

        featureImage.each(function(){
            var bgImage = $('.portfolio-item-image');
            featureImageContainer.append(bgImage);
        });
    }

    function handlePortfolioMovingDetailsGrid() {
        var grid = $(".grid_11");
        if (grid.length) {
            var portfolioItem = grid.find('.-layout11');

            portfolioItem.on('mouseover mousemove', function(event){
                $(this).find('.card-details')[0].style.transform = 'translate('+ event.clientX + 'px, ' + event.clientY + 'px' +')';
            });

            portfolioItem.on('mouseleave', function(event){
                $(this).find('.card-details')[0].style.transform = 'translate(0px, 0px' +')';
            });
        }
    }
    $(window).on('ohio:handle_portfolio_moving_details_grid', handlePortfolioMovingDetailsGrid);

    function handleProjectScrollScale() {
        var project = $('.scroll-scale-image');
        var projectImage = project.find('.project-gallery .project-image');
        if ( projectImage.length ) {
            var scale = 1.0;
            var lastScrollTop = 0;
            var projectImageOffset = projectImage.offset().top;
            var projectImageHeight = projectImage.height();
            var wndHeight = $(window).height();
            var projectImageHeight = projectImage.height();
            var modifier = 0;

            //(-parallaxTop + contentScroll + wndHeight) / (parallaxHeight + wndHeight)

            $(window).on('scroll', function(){
                var st = $(this).scrollTop();
                modifier = ((st) / (projectImageHeight + wndHeight) / 5);

                if ( st < projectImageOffset + projectImageHeight ) {
                    if (st > lastScrollTop){
                        //Down
                        setTimeout(function(){
                            projectImage.css('transform', 'scale('+scale+')');
                            scale = 1 + modifier;
                        }, 50);
                    }
                    else {
                        //Up
                        projectImage.css('transform', 'scale('+scale+')');
                        if (scale > 1.005) {
                            scale = 1 + modifier;
                        }
                    }
                }
                lastScrollTop=st;
            });
        }
    }

    function handleGlobalPageAnimation() {
        var globalAnimationTarget = $('.global-page-animation'),
            isGlobalAnimationEnabled = globalAnimationTarget.length,
            PAGE_ACTIVE_CLASS = 'global-page-animation-active',
            PAGE_FADE_OUT_CLASS = 'global-page-animation-fade-out',
            PRELOADER_SELECTOR = '.page-preloader:not(.percentage-preloader)';

        if ( isGlobalAnimationEnabled ) {
            $('a[href]:not(.btn-lightbox):not(.prettyphoto):not(.clb-scroll-top):not(.elementor-gallery-item):not([data-elementor-open-lightbox]):not(.woocommerce-MyAccount-downloads-file):not(.add_to_cart_button):not(.add_to_wishlist)').on('click', function (e) {
                var targetURL = $(this).attr('href');
                var isURIPrefix = targetURL.indexOf('http') == -1 && targetURL.indexOf(':') != -1;

                if ( targetURL && targetURL.charAt(0) != '#' && $(this).attr('target') != '_blank' && !isURIPrefix ) {
                    e.preventDefault();
                    globalAnimationTarget.removeClass(PAGE_ACTIVE_CLASS);
                    globalAnimationTarget.addClass(PAGE_FADE_OUT_CLASS);

                    setTimeout(function(){
                        $(PRELOADER_SELECTOR).removeClass('hidden');
                    }, 800);

                    setTimeout(function(){
                        document.location.href = targetURL;
                    }, 850);
                }
            });

            window.addEventListener('pageshow', function(e) {
                if (!e.persisted) {
                    return;
                }

                $(PRELOADER_SELECTOR).addClass('hidden');
                globalAnimationTarget.removeClass(PAGE_FADE_OUT_CLASS);
                globalAnimationTarget.addClass(PAGE_ACTIVE_CLASS);
            });
        }
    }
    $(window).on('ohio:handle_global_page_animation', handleGlobalPageAnimation);

    function handleStickySection() {
        var sticky = $('.sticky-section');

        if ( sticky.length ) {

            sticky.each(function(){

                var secondImage = $(this).find('.sticky-section-item-second-image'); //projectImage
                var lastScrollTop = 0;
                var stickyItemHeight = $('.sticky-section-item').height();
                var stickyItemOffset = $('.sticky-section-item').offset().top; //projectImageOffset
                var secondImageHeight = secondImage.height(); //projectImageHeight
                var wndHeight = $(window).height();
                var modifier = 0;
                var inset = secondImageHeight;

                $(window).on('scroll', function(){
                    var st = $(this).scrollTop();
                    modifier = ((st) / (secondImageHeight + wndHeight)) * 20; //((st) / (secondImageHeight + wndHeight) / 5)
                    if ( st > stickyItemOffset + ((stickyItemHeight / 2) - secondImageHeight) ) {
                        if (st > lastScrollTop){
                            //Down
                            if ( inset > 0) {
                                secondImage.css('clip-path', 'inset('+inset+'px 0px 0px)');
                                inset = inset - modifier;
                            }
                        }
                        else {
                            //Up
                            if (inset < secondImageHeight) {
                                secondImage.css('clip-path', 'inset('+inset+'px 0px 0px)');
                                inset = inset + modifier;
                            }
                        }
                    }
                    lastScrollTop=st;
                });

            });

        }
    }

    function contactFormAcceptenceField() {
        var acceptenceCheckbox = $('#form_privacy_policy');

        acceptenceCheckbox.each(function(){
            if ( $(this).length ) {
                $(this).parents('.wpcf7-form').find('.btn').prop('disabled', true);
            }
        });

        acceptenceCheckbox.on('change', function(){
            if ($(this).is(':checked')) {
                $(this).parents('.wpcf7-form').find('.btn').prop('disabled', false);
            } else {
                $(this).parents('.wpcf7-form').find('.btn').prop('disabled', true);
            }
        });
    }

    function portfolioGridType12(){
        var portfolioGrid = $('.grid_12');

        portfolioGrid.each(function(){

            var gridHolder = $(this).find('.portfolio-grid-holder');
            var gridHolderWidth = gridHolder.width();
            var grid = $(this).find('.portfolio-grid');
            var gridHeight = grid.width();
            var gridItems = $(this).find('.grid-item');
            var filterBar = $(this).find('.portfolio-filter');
            var underline = gridHolder.find('.portfolio-grid-holder-underline');
            var windwoWidth = $(window).width();
            var windwoHeight = $(window).height();

            cloneImagesForPortfolioGridType12($(this));
            var gridImages = $('.portfolio-grid-images .portfolio-item-image');


            if (filterBar.length) {
                grid.css('top', filterBar.outerHeight() +'px');
            }

            if (!Clb.isMobile) {
                gridHolder.height(gridHeight);
                grid.css('min-height', gridHolderWidth);
                grid.css('max-height', gridHolderWidth);

                setTimeout(function(){
                    grid.find('[data-aos-once]').addClass('aos-animate');
                }, 800);

                setTimeout(function(){
                    underline.width(gridItems.eq(0).height());
                    underline.height(1);
                }, 300);

            } else {
                setTimeout(function(){
                    underline.height(gridItems.eq(0).height());
                    underline.width(1);
                }, 300);
            }


            gridItems.each(function(){
                var gridItem = $(this);
                var gridItemOffsetLeft = gridItem.offset().left;

                var gridImage = gridImages.eq(gridItem.index());
                var gridImageInnerContainer = gridImage.find('.card');
                var gridImageWidth = gridImage.width();
                var gridImageHeight = gridImage.height();

                var lastMouseXPosition = 0;
                var lastMouseYPosition = 0;
                var moveTimer;

                gridItem.find('.portfolio-item').on('mouseover mousemove', function(event){

                    //If mousemove is stopped
                    clearTimeout(moveTimer);
                    moveTimer = setTimeout(function(){
                        gridImageInnerContainer[0].style.transform = 'rotate(0deg)';
                    }, 200);

                    var y = event.clientY;
                    var x = event.clientX;

                    var mouseYPosition = event.clientY;

                    if (Clb.isRtl) {
                        var underlinePosition =  (($(this).offset().left + $(this).height() ) - gridHolder.offset().left) - gridHolderWidth;
                    } else {
                        var underlinePosition = $(this).offset().left - gridHolder.offset().left;
                    }

                    var rotateIndex = ((y - lastMouseYPosition) + (x - lastMouseXPosition)) / -1;

                    /* Rtl support start */
                    if (Clb.isRtl) {
                        x -= gridImageWidth / 2;
                    }
                    /* Rtl support end */

                    if (gridItemOffsetLeft > (windwoWidth / 2)) {
                        x -= gridImageWidth / 2;
                    }

                    if ( mouseYPosition > (windwoHeight / 1.5) ) {
                        y -= gridImageHeight;
                    }

                    if (Clb.isMobile) {
                        underlinePosition = $(this).offset().top - gridHolder.offset().top;
                        underline[0].style.transform = 'translateY('+ underlinePosition  + 'px)';
                    } else {
                        underline[0].style.transform = 'translateX('+ underlinePosition  + 'px)';
                    }

                    gridImage.addClass('visible');
                    gridImage[0].style.transform = 'translate('+ x  + 'px, ' + y + 'px' +')';
                    gridImageInnerContainer[0].style.transform = 'rotate('+ rotateIndex +'deg)';
                    gridImageInnerContainer[0].style.filter = 'brightnes('+ rotateIndex +')';

                    setTimeout(function(){
                        gridImage.addClass('animate');
                    }, 1);

                    lastMouseXPosition = event.clientX;
                    lastMouseYPosition = event.clientY;

                });

                gridItem.find('.portfolio-item').on('mouseleave', function(event){
                    gridImage.removeClass('visible');
                    gridImage[0].style.transform = 'translate(0px, 0px)';
                    gridImageInnerContainer[0].style.transform = 'rotate(0deg)';

                    setTimeout(function(){
                        gridImage.removeClass('animate');
                    }, 1);
                });

                gridItem.on("mouseout",function(){
                    clearTimeout(moveTimer);
                });
            });
        });
    }
    $(window).on('ohio:portfolioGridType12', portfolioGridType12);

    function cloneImagesForPortfolioGridType12(grid) {
        var gridItem = grid.find('.grid-item');
        var gridImages = $('.portfolio-grid-images');

        gridImages.empty();

        gridItem.each(function(){
            var itemImage = $(this).find('.portfolio-item-image');
            gridImages.append(itemImage.clone());
        });
    }

    function getMaxPropertySize (elements, property) {
        var maxPropertySize = 0;

        elements.each(function(){

            var itemPropertySize = $(this).css(property).replace(/(^\d+)(.+$)/i,'$1');

            if (itemPropertySize > maxPropertySize) {
                maxPropertySize = itemPropertySize;
            }

        });

        return maxPropertySize
    }

    function handleOhioBgImages() {
        $('[data-ohio-bg-image]').each(function () {
            $(this).css('background-image', 'url(' + $(this).attr('data-ohio-bg-image') + ')');
        });
    }
    $(window).on('ohio:handle_bg_images', handleOhioBgImages);

    const throttle = (fn, wait) => {
      let last = 0, timer;
      return function(...args) {
        const now = Date.now();
        const remaining = wait - (now - last);
        if (remaining <= 0){
          last = now;
          fn(...args);
        } else if (!timer) {
          timer = setTimeout(() => {
            last = Date.now();
            timer = null;
            fn(...args);
          }, remaining);
        }
      }
    }

    function initMarqueeAnimation(stage, settings) {
      const ORIGINAL_ATTR = 'data-marquee-el-original';
      const ORIGINAL_SELECTOR = `[${ORIGINAL_ATTR}]`;
      const COPY_ATTR = 'data-marquee-el-copy';

      const dir = settings.dir || 'ltr';
      const speed = parseFloat(settings.speed) || 1;
      const slowOnScroll = Boolean(settings.slowOnScroll);

      const maxWidth = (collection) => {
        let width = 0;

        collection.forEach(domEl => {
          if (domEl.getBoundingClientRect().width > width) {
            width = domEl.getBoundingClientRect().width;
          }
        });

        return width;
      }

      const getMarqueeCopy = (domEl, width) => {
        const copy = domEl.cloneNode(true);
        copy.removeAttribute(ORIGINAL_ATTR);
        copy.removeAttribute('style');
        copy.setAttribute(COPY_ATTR, '');
        copy.style.minWidth = `${width}px`;

        return copy;
      }


      const ogElements = stage.querySelectorAll(ORIGINAL_SELECTOR);
      ogElements.forEach(domEl => {
        domEl.removeAttribute('style');
      });
      const elWidth = maxWidth(ogElements);
      ogElements.forEach(domEl => {
        domEl.style.minWidth = `${elWidth}px`;
      });
      stage.innerHTML = '';
      stage.append(...ogElements);

      const windowWidth = window.innerWidth;

      const elementsInOneScreen = Math.floor(windowWidth / elWidth) || 1;
      let totalElements = elementsInOneScreen * 3;
      // Trying not to break the sequence in the middle or have hanging elements
      totalElements += totalElements % ogElements.length;
      for (let i = 0; i < totalElements; i++) {
        stage.insertBefore(getMarqueeCopy(ogElements[i % ogElements.length], elWidth), ogElements[0]);
      }

      const marqueeAnimation = stage.animate([
          {
              transform: `translateX(0)`,
          },
          {
              transform: `translateX(${elWidth * ogElements.length * (dir === 'ltr' ? 1 : -1)}px)`,
          },
      ], {
          iterations: Infinity,
          duration: elWidth / speed * 10,
          easing: 'linear',
          fill: 'forwards',
      });


      if (slowOnScroll) {
        const scrollHandler = throttle(() => {
            const windowHeight = window.innerHeight;
            const marqueeTopOffset = stage.getBoundingClientRect().top;

            const isInViewportOrPast = marqueeTopOffset - windowHeight < 0;

            if (isInViewportOrPast) {
                const animationRate = marqueeTopOffset / windowHeight;
                marqueeAnimation.updatePlaybackRate(animationRate >= 0 ? animationRate : 0);
            }
        }, 300);

        window.addEventListener('scroll', scrollHandler);
        scrollHandler();

        return () => {
          marqueeAnimation.cancel();
          window.removeEventListener('scroll', scrollHandler)
        }
      }

      return () => { marqueeAnimation.cancel(); };
    }

    function handleMarquee() {
      const marqueeLines = document.querySelectorAll('.marquee-line');

      marqueeLines.forEach((line) => {
          const stage = line.querySelector('.marquee-line-stage');

          let cancel = initMarqueeAnimation(stage, line.dataset);
          let previousWidth = window.innerWidth;
          window.addEventListener('resize', throttle(() => {
              if (window.innerWidth === previousWidth) return;
              previousWidth = window.innerWidth;
              cancel();
              cancel = initMarqueeAnimation(stage, line.dataset);
          }));
      });
    }
    $(window).on('ohio:handle_marquee', handleMarquee);

    percentagePreloader();
    wideMenuOnLoadPosition();
    handleMobileHeader();

    window.ohioRefreshFrontEnd = function () {
        handleAccordionBox();
        handleSubscribeContactForm();
        handleGallery();
        initParallax();
        handleParallax();
        handleTabBox();
        handleVideoBackground();
        handleVideoPopup();
        handleScrollEffects();
        handleSliders();
    };

    $(window).on('load', function () {

        Clb.init();
        handleOhioHeight();
        handleNavigations();
        handleStickyNav();

        /* Header */
        handleHeaders();
        handleHeaderTitle();
        handleLanguageSelect();

        /* Set logo centered for header 4 */
        if ( !Clb.isMobileMenu && Clb.headerIsFourth ) {
            setLogoCentered();
        }

        /* Footer */
        handleFooter();
        handleStretchContent();

        /* Components */
        handleAccordionBox();
        handleAccordionBoxSize();
        handleProgressBar();
        handleOhioDynamicTextSc();
        handleCircleProgressBar();
        handleCounterBox();
        handleCountdown();
        handleGroupTeam();

        handleSubscribeContactForm();
        handleGallery();
        handleFullscreenSlider();
        handleHorizontalAccordion();
        handleStickySection();
        initParallax();
        handleParallax();
        handleTabBox();
        handleVideoBackground();
        handleVideoPopup();
        handleInstagramFeed();

        /* WooCommerce */
        handleMobileFilter();
        handleProductReview();

        /* Portfolio */
        handlePortfolio();
        handleScrollShareBar();
        handleScrollEffects();
        handleLazyLoadClick();
        handleLazyLoadScroll();
        handlePortfolioOnepageSlider();
        handlePortfolioPopup();
        handleScrollMeter();
        handleMutationObserver();
        handleRemoveSliderBulletsClass();
        handleProjectInteractiveLinks();
        handleProjectScrollScale();
        portfolioGridType12();
        handleMasonry();
        contactFormAcceptenceField();
        handleDynamicSectionColors(window.elementorFrontend && window.elementorFrontend.isEditMode());
        handlePageColorSwitcher();
        handlePageColorSwitcherClickEvent();
        handleGlobalPageAnimation();
        // boxedPageRowWidth();
        handleMarquee();
        handleFlippingBannerText();

        if (Clb.isDesktop) {
            handlePortfolioMovingDetailsGrid();
        }

        if (!Clb.isTablet) {
            handleCustomCursor();
        }

        $(window).on('resize', function () {
            handleHeaders();
            // handleHamburgerMenu();
            handleAccordionBoxSize();
            handleHorizontalAccordion();
            handleGroupTeamSize();
            handlePortfolio();
        });

        $(window).on('scroll', function(){
            handleProgressBar();
            handleCounterBox();
        });

        setTimeout(function(){
            handleAlignContentInStretchRow();
            handleSliders();
            handleCompareShortcodes();
            handleGroupTeamSize();
        }, 10);

        /* SlideUp animated elements */
        $('.clb-slider-item').each(function(){
            if($(this).hasClass('active')) {
                $(this).find('.animated-holder').addClass('visible');
            }
        })

        btnPreloader();

        /* Page is loaded class */
        Clb.body.addClass('page-is-loaded');

        /* Scroll top button */
        $('.scroll-top').on("click", function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

        /* Tooltips */
        $('.tooltip').each(function () {
            if ($(this).find('.tooltip-top, .tooltip-bottom').length) {
                var content = $(this).find('.tooltip-text');
                content.css('left', ($(this).outerWidth() / 2 - content.outerWidth() / 2) + 'px');
            }
        });

        /* Message boxes */
        $('body').on('click', '.message-box .clb-close', function () {
            $(this).parent().slideUp({duration: 300, queue: false}).fadeOut(300);
            var self = $(this);
            setTimeout(function () {
                self.remove();
            }, 350);
        });

        $('body').on('click', '[data-js="close-alert"]', function (e) {
            e.preventDefault();

            setCookie('notification', 'enabled', +ohioVariables.notification_expires);
            $(this).parents('.alert').addClass('-hidden');
        });

        handleOhioBgImages();

        /* Fixed google maps equal height in percent */
        $('.wpb_wrapper').each(function () {
            var divs = $(this).find('> div');

            if (divs.length == 1 && divs.eq(0).hasClass('google-maps')) {
                $(this).css('height', '100%');
            }
        });

        /* Refresh composter waypoints after magic */
        if (window.vc_waypoints) {
            setTimeout(function () {
                window.vc_waypoints();
            }, 600);
        }

        /* Mobile share button */
        $('.mobile-social').on('click', function (e) {
            e.stopPropagation();

            if ($(this).hasClass('active')) {
                $(this).find('.social').css('height', '0px');
                $(this).removeClass('active');
            } else {
                var social = $(this).find('.social');
                var self = $(this);

                social.css('height', '');

                social.addClass('no-transition');

                $(this).addClass('active');
                var height = social.outerHeight();
                $(this).removeClass('active');

                setTimeout(function () {
                    social.css('height', height + 'px');
                    social.removeClass('no-transition');
                    self.addClass('active');
                }, 50);

            }
        });

        $(window).on('scroll', function () {
            var handleAnim = function () {
                handleMobileHeader();
                handleFixedHeader();
                handleHeaderTitle();
                handleBarScroll();
                handleParallax();
                handleScrollEffects();
                handleLazyLoadScroll();
                handleScrollMeter();
            };

            if (window.requestAnimationFrame) {
                window.requestAnimationFrame(function () {
                    handleAnim();
                });
            } else {
                handleAnim();
            }

            // Scroll top

            if ($(window).scrollTop() > 250) {
                $('.scroll-top').addClass('visible');
            } else {
                $('.scroll-top').removeClass('visible');
            }
        });

        //For disebling resize trigger on mobile scroll
        var mobileResizeWidth = $(window).width(), mobileResizeHeight = $(window).height();

        $(window).on('resize', function () {
            Clb.resize();
            handleOhioHeight();
            handleHeaderSize();
            handleHeaderTitle();
            handleStretchContent();
            handleAccordionBoxSize();
            handleParallax();
            handleScrollEffects();
            handleLazyLoadScroll();
            handleScrollShareBar();
            handleHorizontalAccordion();
            handleMobileHeader();
            handleTabBox();
            // boxedPageRowWidth();
            wideMenuOnResizePosition();
            handlePageColorSwitcher();
            handleStickyNav();

            setTimeout(function(){
                handleAlignContentInStretchRow();
                handleMasonry();

                if (Clb.isElementorPage) {
                    handleAccordionBoxSize();
                }

                portfolioGridType12();

            }, 1000);

            if ( !Clb.isMobileMenu && Clb.headerIsFourth ) {
                if ( Clb.header.hasClass('header-4') ) {
                    setTimeout(function(){
                        Clb.header.find('.nav').removeAttr('style');
                        setLogoCentered();
                    }, 100);
                }
            }

            //For disebling resize trigger on mobile scroll
            if ($(window).width() !== mobileResizeWidth){
                handleSliders();
            }

            if ( Clb.isMobileMenu ) {
                if ( Clb.headerIsFourth ) {
                    $('#site-navigation, .left-part, .right-part, .nav-item').removeAttr('style');
                }
            }

            if (typeof(AOS) != 'undefined') {
                setTimeout(function () {
                    AOS.refresh();
                }, 10);
                // Isotope animation
                setTimeout(function () {
                    AOS.refresh();

                    if (window.vc_waypoints) {
                        window.vc_waypoints();
                    }
                }, 600);
            }

            // if ( $('[data-portfolio-grid-slider]').hasClass('grid_6') ) {
            //     calcPortfolioSliderEqualOverlay();
            // }

            //Custom cursor
            if (!Clb.isTablet) {
                handleCustomCursor();
            }
        });

        $('#page-preloader:not(.percentage-preloader), .container-loading:not(.loading-text)').addClass('hidden');

        var userAgent = navigator.userAgent.toLowerCase();
        var isSafari = false

        if (userAgent.indexOf('safari') != -1) {
            if (userAgent.indexOf('chrome') > -1) {
                isSafari = false; // Chrome
            } else {
                isSafari = true; // Safari
            }
        }

        if (navigator.userAgent.match(/(iPod|iPhone|iPad)/) || isSafari) {
            window.onpageshow = function(event) {
                if (event.persisted) {
                    window.location.reload();
                }
            };
        }

        if (Clb.body.hasClass('global-page-animation')) {
            Clb.body.addClass('global-page-animation-active');
        }

        $('.gimg').css('opacity', '1');
    });

    /* Custom cursor */
    function handleCustomCursor() {
        if ( $('body').hasClass( 'custom-cursor' ) ) {
            const cursorInnerEl = document.querySelector('.circle-cursor-inner');
            const cursorOuterEl = document.querySelector('.circle-cursor-outer');

            if( !cursorInnerEl || !cursorOuterEl ) return;

            let lastY, lastX = 0;
            let magneticFlag = false;

            // move
            window.onmousemove = function (event) {

                if (!magneticFlag) {
                    cursorOuterEl.style.transform = 'translate('+ event.clientX + 'px, ' + event.clientY + 'px' +')';
                }
                cursorInnerEl.style.transform = 'translate('+ event.clientX + 'px, ' + event.clientY + 'px' +')';
                lastY = event.clientY;
                lastX = event.clientX;

                //iframe fix
                if ($(event.target).is('iframe')) {
                    cursorOuterEl.style.visibility = 'hidden';
                    cursorInnerEl.style.visibility = 'hidden';
                } else {
                    cursorOuterEl.style.visibility = 'visible';
                    cursorInnerEl.style.visibility = 'visible';
                }
            }

            // links hover
            $('body').on('mouseenter', 'a, .cursor-as-pointer', function() {
                cursorInnerEl.classList.add('cursor-link-hover');
                cursorOuterEl.classList.add('cursor-link-hover');
            });
            $('body').on('mouseleave', 'a, .cursor-as-pointer', function() {
                if ( $(this).is('a') && $(this).closest('.cursor-as-pointer').length ) {
                    return;
                }
                cursorInnerEl.classList.remove('cursor-link-hover');
                cursorOuterEl.classList.remove('cursor-link-hover');
            });

            // additional hover cursor class
            $('body').on('mouseenter', '[data-cursor-class]', function() {
                const cursorClass = $(this).attr('data-cursor-class');

                if (cursorClass.indexOf('dark-color') != -1) {
                    cursorInnerEl.classList.add('dark-color');
                    cursorOuterEl.classList.add('dark-color');
                }

                if (cursorClass.indexOf('cursor-link') != -1) {
                    cursorInnerEl.classList.add('cursor-link');
                    cursorOuterEl.classList.add('cursor-link');
                }
            });
            $('body').on('mouseleave', '[data-cursor-class]', function() {
                const cursorClass = $(this).attr('data-cursor-class');
                if (cursorClass.indexOf('dark-color') != -1) {
                    cursorInnerEl.classList.remove('dark-color');
                    cursorOuterEl.classList.remove('dark-color');
                }

                if (cursorClass.indexOf('cursor-link') != -1) {
                    cursorInnerEl.classList.remove('cursor-link');
                    cursorOuterEl.classList.remove('cursor-link');
                }
            });

            // magnet elements
            $('body').on('mouseenter', '.cursor-magnet, .icon-button', function() {
                const $elem = $(this);
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                cursorOuterEl.style.transition = 'all .2s ease-out';
                cursorOuterEl.style.transform = 'translate('+ $elem.offset().left + 'px, ' + ($elem.offset().top - scrollTop) + 'px' +')';
                cursorOuterEl.style.width = $elem.width() + 'px';
                cursorOuterEl.style.height = $elem.height() + 'px';
                cursorOuterEl.style.marginLeft = 0;
                cursorOuterEl.style.marginTop = 0;
                magneticFlag = true;
            });

            $('body').on('mouseleave', '.cursor-magnet, .icon-button', ohioRemoveMagneticFromCursor);

            function ohioRemoveMagneticFromCursor() {
                cursorOuterEl.style.transition = null;
                cursorOuterEl.style.width = null;
                cursorOuterEl.style.height = null;
                cursorOuterEl.style.marginLeft = null;
                cursorOuterEl.style.marginTop = null;
                magneticFlag = false;
            }

            // Custom leave trigger
            $('body').on('ohio:cursor_mouseleave', function() {
                ohioRemoveMagneticFromCursor();
                cursorOuterEl.style.transform = cursorInnerEl.style.transform;
                cursorInnerEl.classList.remove('cursor-link-hover');
                cursorOuterEl.classList.remove('cursor-link-hover');

            });


            $('body').on('mouseenter', 'iframe', function() {
                cursorOuterEl.style.visibility = 'hidden';
                cursorInnerEl.style.visibility = 'hidden';
            });

            cursorInnerEl.style.visibility = 'visible';
            cursorOuterEl.style.visibility = 'visible';
        }
    }

    if ($('body').hasClass('ohio-anchor-onepage')) {
        $('body #masthead a[href]:not(.hamburger-holder):not(.search-global), body .hamburger-nav a[href]').on('click', function(event) {

            if ($(this).attr('href').includes('#') ) {
                event.preventDefault();
                var href = '#' + $(this).attr('href').split('#')[1];

                if ($(href).length) {
                    $('html, body').animate({
                        scrollTop: $(href).offset().top
                    }, 500, function() {
                        window.location.hash = href;
                    });
                }

                return false;
            }
        });

        if (window.location.hash.substring(0, 1) == '#') {
            if ($(window.location.hash).length) {
                $('html, body').animate({
                    scrollTop: $(window.location.hash).offset().top
                }, 500);
            }
        }
    }

    /* woo.js triggers*/

    $('body').on('ohio:quickview', function(){
        handlePopup($('body').data('ohio:quickview-data'));
    });

    $('body').on('ohio:btn-preloader', function(){
        btnPreloader();
    });

    // Fires without waiting for the entire page to load
    handleAutoColorMode();
})(jQuery);

/* Hack for elementor parallax fix */

jQuery(window).on('load', function() {
    if (jQuery('.elementor-motion-effects-container').length) {
        setTimeout( function() {
            window.dispatchEvent(new Event('resize'));
        }, 500);
    }
    function getBackgroundLines(color) {
        var lines = document.createElement('ul');
        lines.classList.add('row-bg-lines', '-unlist');
        lines.innerHTML = '<li></li>'.repeat(4);
        return lines;
    }
    function getSideText(text, position) {
        var sideText = document.createElement('span');
        sideText.classList.add('row-bg-text', 'vc_hidden-xs', position);
        sideText.innerText = text;
        return sideText;
    }
    function prependToElementorWrapper( wrapper, childContent ) {
        var isContainer = wrapper.getAttribute( 'data-element_type' ) === 'container',
            targetElement = wrapper.querySelector( isContainer ? '.e-con-inner' : '.elementor-container' ) || wrapper;

        targetElement.prepend( childContent );
    }

    var ELEMENTOR_BACKGROUND_LINES_ATTRIBUTE = 'ohio-background-lines',
        ELEMENTOR_SIDE_TEXT_ATTRIBUTE = 'ohio-side-title-text',
        ELEMENTOR_SIDE_TEXT_POSITION_ATTRIBUTE = 'ohio-side-title-position';

    document.querySelectorAll('[' + ELEMENTOR_SIDE_TEXT_ATTRIBUTE + ']').forEach(function(el) {
        var text = el.getAttribute(ELEMENTOR_SIDE_TEXT_ATTRIBUTE), position = el.getAttribute(ELEMENTOR_SIDE_TEXT_POSITION_ATTRIBUTE);
        prependToElementorWrapper( el, getSideText( text, position ) );
    });

    document.querySelectorAll('[' + ELEMENTOR_BACKGROUND_LINES_ATTRIBUTE + ']').forEach(function(el) {
        prependToElementorWrapper( el, getBackgroundLines( el.getAttribute( ELEMENTOR_BACKGROUND_LINES_ATTRIBUTE ) ) );
    });

    function onElementorSectionUpdate( $element ) {
        var domElement = $element[0];
        var sectionId = domElement.getAttribute('data-model-cid');
        var sectionSettings = elementorFrontend.config.elements.data[sectionId];

        if(!sectionSettings) return;

        for (const attribute of Array.from(domElement.attributes)) {
            if (attribute.name.startsWith('data-ohio')) {
                domElement.removeAttribute(attribute.name);
            }
        }

        if (sectionSettings.attributes['background_lines_enabled'] === 'yes') {
            prependToElementorWrapper( domElement, getBackgroundLines(sectionSettings.attributes['background_lines_enabled']));
            domElement.setAttribute('ohio-background-lines', sectionSettings.attributes['background_lines_enabled']);
        }

        if (sectionSettings.attributes['side_title_text']) {
            prependToElementorWrapper(
                domElement,
                getSideText(sectionSettings.attributes['side_title_text'], sectionSettings.attributes['side_title_position']),
            );
        }

        if (sectionSettings.attributes['section_color_scheme']) {
            if (sectionSettings.attributes['section_color_scheme'] !== 'default') {
                domElement.classList.remove('clb__light_section', 'clb__dark_section');
                domElement.classList.add(`clb__${sectionSettings.attributes['section_color_scheme']}_section`);
                jQuery(window).trigger('ohio:update_dynamic_sections');
            }
        }

        if (sectionSettings.attributes['stretch_row_enable']) {
            domElement.setAttribute('data-ohio-stretch-column-' + sectionSettings.attributes['stretch_row_direction'], sectionSettings.attributes['stretch_row_enable']);
        }

        if (sectionSettings.attributes['offset_row_enable']) {
            const settingValue = sectionSettings.attributes['offset_row_side'];
            const attribute = 'data-ohio-offset-column' + (
                settingValue === 'left_and_right'
                ? ''
                : '-' + settingValue
            );
            domElement.setAttribute(attribute, sectionSettings.attributes['offset_row_enable']);
        }
    }

    jQuery( window ).on('elementor/frontend/init', () => {
        if (elementorFrontend.isEditMode()) {
            elementorFrontend.hooks.addAction('frontend/element_ready/section', onElementorSectionUpdate);
            elementorFrontend.hooks.addAction('frontend/element_ready/container', onElementorSectionUpdate);
        }
    });
});

/* Elementor */

jQuery(window).on('elementor/frontend/init', function(){
    jQuery(window).trigger('ohio:handle_global_page_animation');
});
