// top menu scroll: begin
function activateNavbar() {
    if ( $(this).scrollTop() > 20 ) {
        $('.navbar-main').addClass('flattened');
    } else {
        $('.navbar-main').removeClass('flattened');
    }
}
var debounceActivateNavbar = debounce(function() {
    activateNavbar();
}, 5);
$(window).scroll(debounceActivateNavbar);
activateNavbar();
// top menu scroll: end

// hamburger animations: begin
$('#navbar-collapse').on('show.bs.collapse', function () {
    $('.hamburger').addClass('open');
    $('.navbar-main').addClass('navbar-open');
});
$('#navbar-collapse').on('hide.bs.collapse', function () {
    $('.hamburger').removeClass('open');
});
$('#navbar-collapse').on('hidden.bs.collapse', function () {
    $('.navbar-main').removeClass('navbar-open');
});
// hamburger animations: end

// media query detector: begin
function getScreenType() {
    !function initHelpers() {
        if ($('div.mq-detector').length !== 0) return;
        $('body').append(_mqDetector());
        // helpers
        function _mqDetector() {
            return `
            <div class="mq-detector invisible">
                <div class="d-block d-sm-none" data-type="xs"></div>
                <div class="d-none d-sm-block d-md-none" data-type="sm"></div>
                <div class="d-none d-md-block d-lg-none" data-type="md"></div>
                <div class="d-none d-lg-block d-xl-none" data-type="lg"></div>
                <div class="d-none d-xl-block" data-type="xl"></div>
            </div>
            `;
        }
    }();
    return $('div.mq-detector').children().filter(':visible').data('type');
}
// media query detector: end

// hashtag links smooth scroll: begin
$('.nav a[href*="#"]:not([href="#"]), .scroll-to').click(function() {
    moveToHash(this);
});
// move to hash
$(window).on('load', function(e){
    if ( location.hash.length > 0 ) {
        moveToHash(location);
    }
});
function moveToHash(el) {
    // check for tabs
    $el = $(el);
    if ( $el.attr('role') && $el.attr('role') == 'tab' ) {
        return;
    }
    // continue
    var customHash = el.hash;
    if ( location.pathname.replace(/^\//,'') == el.pathname.replace(/^\//,'') || location.hostname == el.hostname ) {
        var target = $(customHash);
        if ( target.length ) {
            var navbarHeight = $('#navbar-main').outerHeight();
            var screenType = getScreenType();
            if ( getScreenType() == 'xl' ) {
                navbarHeight = 90;
            }
            else if ( getScreenType() == 'lg' ) {
                navbarHeight = 85;
            }
            else if ( getScreenType() == 'md' ) {
                navbarHeight = 78;
            }
            else if ( getScreenType() == 'sm' || getScreenType() == 'xs' ) {
                navbarHeight = 66;
            }
            $('html, body').animate({
                scrollTop: target.offset().top - navbarHeight
            }, 300);
            $('#navbar-collapse').collapse('hide');
            return false;
        }
    }
}
// hashtag links smooth scroll: end