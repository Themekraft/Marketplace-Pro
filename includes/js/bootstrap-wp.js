jQuery( document ).ready( function( jQuery ) {

    // search field input
    jQuery( 'input.search-field' ).addClass( 'form-control' );

    // comment reply links
    jQuery( '.comment-reply-link' ).addClass( 'btn btn-primary' );

    // submit buttons in the comment reply forms
    jQuery( '#commentsubmit' ).addClass( 'btn btn-primary' );

    // WordPress default widgets
    jQuery( 'input.search-field' ).addClass( 'form-control' );
    jQuery( 'input.search-submit' ).addClass( 'btn btn-default' );
    jQuery( '.widget_rss ul' ).addClass( 'media-list' );
    jQuery( '.widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul' ).addClass( 'nav' );
    jQuery( '.widget_recent_comments ul#recentcomments' ).css( 'list-style', 'none').css( 'padding-left', '0' );
    jQuery( '.widget_recent_comments ul#recentcomments li' ).css( 'padding', '5px 15px');
    jQuery( 'table#wp-calendar' ).addClass( 'table table-striped');

    // the burger toggle
    jQuery('.tf-burger').click(function() {
      jQuery('#topnav').toggleClass("tf-open");
      jQuery('#slidenav-wrap').toggleClass("tf-open");
      jQuery('#sitewrap').toggleClass("slidenav-open");
    });

    // the sliding nav
    // jQuery('#slidenav-wrap a').click(function() {
    //   jQuery('#topnav').toggleClass("tf-open");
    //   jQuery('#slidenav-wrap').toggleClass("tf-open");
    //   jQuery('#sitewrap').toggleClass("slidenav-open");
    // });

    // sliding nav - when opened, close on click anywhere within #sitewrap
    jQuery('#sitewrap').click(function() {
      jQuery('#topnav').removeClass("tf-open");
      jQuery('#slidenav-wrap').removeClass("tf-open");
      jQuery('#sitewrap').removeClass("slidenav-open");
    });

    // auto smooth scroll for href="#somethin"
    // just on homepage!! deactivate if you get issues with other scripts
    jQuery(function() {
      if (jQuery('body.front-page').length) {
        jQuery('a[href*=\\#]:not([href=\\#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = jQuery(this.hash);
            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
            var wsize = jQuery(document).width();
            if ((target.length) && (wsize >= 992)) {
              jQuery('html,body').delay(220).animate({
                scrollTop: target.offset().top -72
              }, 260);
              return false;
            }
            if ((target.length) && (wsize < 992)) {
              jQuery('html,body').delay(220).animate({
                scrollTop: target.offset().top -58
              }, 260);
              return false;
            }
          }
        });
      }
    });

    // check if Android 4.3 or below and add class for CSS
    var ua = navigator.userAgent;
    if ( ua.indexOf("Android") >= 0 ) {
      var androidversion = parseFloat(ua.slice(ua.indexOf("Android")+8));
      if (androidversion < 4.3) {
        jQuery('.tf-burger').addClass('oldandroid')
      }
    }

} );
