(function ( $ ) {


//fade in body

$(document).ready(function() {


//fade out body

$('#page a').click(function() {

if ( $( ".site-nonav" ).length ) {

    event.preventDefault();

    newLocation = this.href;

    $('.site-nonav').addClass('hidden');
    $('.current_page_item a').addClass('current-page-item-transition');
    if ($(window).scrollTop() > $('.site-header').height()) {
        $('.site-header').addClass('fixed');
    }
    setTimeout(newpage, 300)
}
});

function newpage() {

window.location = newLocation;
$('.site-nonav').removeClass('hidden');
}

});



//Animate items when scrolling into view

function isElementInViewport(elem) {
    var $elem = $(elem);

    // Get the scroll position of the page.
    var animationMargin = $(window).height() * 0.15;
    var viewportTop = $(window).scrollTop() + animationMargin;
    var viewportBottom = $(window).scrollTop() + $(window).height() - animationMargin;

    // Get the position of the element on the page.
    var elemTop = Math.round( $elem.offset().top );
    var elemBottom = elemTop + $elem.height();

    return ((elemTop < viewportBottom) && (elemBottom > viewportTop));
}

// Check if it's time to start the animation.
function checkAnimation() {

    $('.animate').each(function() {
        var $elem = $(this);
        $elem.addClass('wait');
        // If the animation has already been started
        if ($elem.hasClass('start')) return;

        if (isElementInViewport($elem)) {
        // Start the animation
        $elem.addClass('start');
    }
    });


    $('.animate-children').each(function() {
        var $elem = $(this);
        $elem.addClass('wait');
        // If the animation has already been started
        if ($elem.hasClass('start')) return;

        if (isElementInViewport($elem)) {
        // Start the animation
         $(this).children().each(function( index ) {
            var animDelay = index * 100;
            var $elem = $(this);
            setTimeout(function(){
                $elem.addClass('start');
            },animDelay);
        });
    }
    });
}

// Capture scroll events
$(window).scroll(function() {
    checkAnimation();
});



$(document).ready(function() {
    var isMenuVisible = 0;
    var hideShowMenu = function() {
        if(isMenuVisible == 0) {
            isMenuVisible = 1;
            $('body').addClass('noscroll');
            $('.site-nonav').addClass('totheleft');
            $('.mobile-navigation').addClass('totheleft');
            $('.menu-toggle').addClass('cross');
        } else {
            isMenuVisible = 0;
            $('body').removeClass('noscroll');
            $('.site-nonav').removeClass('totheleft');
            $('.mobile-navigation').removeClass('totheleft');
            $('.menu-toggle').removeClass('cross');
        }
    }
    $('.menu-toggle').click(hideShowMenu);
    $('.mobile-navigation a').click(hideShowMenu);
    $(document).on('click', '.site-nonav.totheleft', hideShowMenu);;
});





//Disable links in front-end edit mode

$('.medium-editor-toolbar-anchor-preview-inner').click(function() {
    event.preventDefault();
});


}( jQuery ));
