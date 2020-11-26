//console.log('%c Proudly Crafted with ZiOn.', 'background: #222; color: #bada55');

/* ---------------------------------------------- /*
 * Preloader
 /* ---------------------------------------------- */
(function(){
    

    jQuery(document).ready(function() {

        /* ---------------------------------------------- /*
         * WOW Animation When You Scroll
         /* ---------------------------------------------- */

        
        jQuery(document).ready(function() {
            setTimeout(function(){
                jQuery('body').addClass('loaded');
            }, 1500);
        });
        
        
        /* ---------------------------------------------- /*
         * Scroll top
         /* ---------------------------------------------- */

        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > 100) {
                jQuery('.scroll-up').fadeIn();
            } else {
                jQuery('.scroll-up').fadeOut();
            }
        });

        jQuery('a[href="#totop"]').click(function() {
            jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
            return false;
        });


        /* ---------------------------------------------- /*
         * Initialization General Scripts for all pages
         /* ---------------------------------------------- */

        var homeSection = jQuery('.home-section'),
            navbar      = jQuery('.navbar-custom'),
            navHeight   = navbar.height(),
            worksgrid   = jQuery('#works-grid'),
            width       = Math.max(jQuery(window).width(), window.innerWidth),
            mobileTest  = false;

        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            mobileTest = true;
        }

        innofit_buildHomeSection(homeSection);
        innofit_navbarAnimation(navbar, homeSection, navHeight);
        innofit_navbarSubmenu(width);
        innofit_hoverDropdown(width, mobileTest);

        jQuery(window).resize(function() {
            var width = Math.max(jQuery(window).width(), window.innerWidth);
            innofit_buildHomeSection(homeSection);
            innofit_hoverDropdown(width, mobileTest);
        });

        jQuery(window).scroll(function() {
            innofit_effectsHomeSection(homeSection, this);
            innofit_navbarAnimation(navbar, homeSection, navHeight);
        });



        /* ---------------------------------------------- /*
         * Home section height
         /* ---------------------------------------------- */

        function innofit_buildHomeSection(homeSection) {
            if (homeSection.length > 0) {
                if (homeSection.hasClass('home-full-height')) {
                    homeSection.height(jQuery(window).height());
                } else {
                    homeSection.height(jQuery(window).height() * 0.85);
                }
            }
        }


        /* ---------------------------------------------- /*
         * Home section effects
         /* ---------------------------------------------- */

        function innofit_effectsHomeSection(homeSection, scrollTopp) {
            if (homeSection.length > 0) {
                var homeSHeight = homeSection.height();
                var topScroll = jQuery(document).scrollTop();
                if ((homeSection.hasClass('home-parallax')) && (jQuery(scrollTopp).scrollTop() <= homeSHeight)) {
                    homeSection.css('top', (topScroll * 0.55));
                }
                if (homeSection.hasClass('home-fade') && (jQuery(scrollTopp).scrollTop() <= homeSHeight)) {
                    var caption = jQuery('.caption-content');
                    caption.css('opacity', (1 - topScroll/homeSection.height() * 1));
                }
            }
        }


        /* ---------------------------------------------- /*
         * Transparent navbar animation
         /* ---------------------------------------------- */

        function innofit_navbarAnimation(navbar, homeSection, navHeight) {
            var topScroll = jQuery(window).scrollTop();
            if (navbar.length > 0 && homeSection.length > 0) {
                if(topScroll >= navHeight) {
                    navbar.removeClass('navbar-transparent');
                } else {
                    navbar.addClass('navbar-transparent');
                }
            }
        }

        /* ---------------------------------------------- /*
         * Navbar submenu
         /* ---------------------------------------------- */

        function innofit_navbarSubmenu(width) {
            if (width > 991) {
                jQuery('.navbar-custom .navbar-nav > li.dropdown').hover(function() {
                    var MenuLeftOffset  = jQuery('.dropdown-menu', jQuery(this)).offset().left;
                    var Menu1LevelWidth = jQuery('.dropdown-menu', jQuery(this)).width();
                    if (width - MenuLeftOffset < Menu1LevelWidth * 2) {
                        jQuery(this).children('.dropdown-menu').addClass('leftauto');
                    } else {
                        jQuery(this).children('.dropdown-menu').removeClass('leftauto');
                    }
                    if (jQuery('.dropdown', jQuery(this)).length > 0) {
                        var Menu2LevelWidth = jQuery('.dropdown-menu', jQuery(this)).width();
                        if (width - MenuLeftOffset - Menu1LevelWidth < Menu2LevelWidth) {
                            jQuery(this).children('.dropdown-menu').addClass('left-side');
                        } else {
                            jQuery(this).children('.dropdown-menu').removeClass('left-side');
                        }
                    }
                });
            }
        }

        /* ---------------------------------------------- /*
         * Navbar hover dropdown on desktop
         /* ---------------------------------------------- */

        function innofit_hoverDropdown(width, mobileTest) {
            if ((width > 991) && (mobileTest !== true)) {
                 jQuery('.dropdown-menu').removeAttr("style");
                jQuery('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').removeClass('open');
                var delay = 0;
                var setTimeoutConst;
                jQuery('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').hover(function() {
                        var jQuerythis = jQuery(this);
                        setTimeoutConst = setTimeout(function() {
                            jQuerythis.addClass('open');
                            jQuerythis.find('.dropdown-toggle').addClass('disabled');
                        }, delay);
                    },
                    function() {
                        clearTimeout(setTimeoutConst);
                        jQuery(this).removeClass('open');
                        jQuery(this).find('.dropdown-toggle').removeClass('disabled');
                    });
            } else {
                jQuery('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').bind('mouseenter mouseleave');
                jQuery('.navbar-custom [data-toggle=dropdown]').not('.binded').addClass('binded').on('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    jQuery(this).parent().siblings().removeClass('open');
                    jQuery(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('open');
                    jQuery(this).parent().toggleClass('open');
                });
            }
        }


        /* ---------------------------------------------- /*
         * Navbar collapse on click
         /* ---------------------------------------------- */

        jQuery(document).on('click','.navbar-collapse.in',function(e) {
            if( jQuery(e.target).is('a') && jQuery(e.target).attr('class') != 'dropdown-toggle' ) {
                jQuery(this).collapse('hide');
            }
        });
        
        /* ---------------------------------------------- /*
         * Navbar focus dropdown on desktop
         /* ---------------------------------------------- */

           
            const topLevelLinks = document.querySelectorAll('.navbar-custom .navbar-nav > li.dropdown a');
            topLevelLinks.forEach(link => {
              link.addEventListener('focus', function(e) {
                this.parentElement.classList.add('open')
                e.preventDefault();

                e.target.parentElement.querySelectorAll( ".open" ).forEach( e =>
                    e.classList.remove( "open" ) );
              })             

            })

            jQuery('li a').focus(function() { 

             jQuery(this).parent().siblings().removeClass('open');

            });

            jQuery('a,input').bind('focus', function() {
             if(!jQuery(this).closest(".menu-item").length ) {
                topLevelLinks.forEach(link => {
                link.parentElement.classList.remove('open')
            })
            }
        })
        
 
 jQuery('li.dropdown').find('.caret').each(function(){
            jQuery(this).on('click', function(){
                if( jQuery(window).width() <= 1100) {
                  jQuery(this).closest( "li.dropdown").toggleClass("open");
                }
             return false;
            });
        });

        /* ---------------------------------------------- /*
         * Scroll Animation
         /* ---------------------------------------------- */

        jQuery('.section-scroll').bind('click', function(e) {
            var anchor = jQuery(this);
            jQuery('html, body').stop().animate({
                scrollTop: jQuery(anchor.attr('href')).offset().top - 70
            }, 1000);
            e.preventDefault();
        });


    });
})(jQuery);