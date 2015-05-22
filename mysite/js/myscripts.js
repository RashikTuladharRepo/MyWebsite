//for easy scrolling
    $("nav ul li a[href^='#']").on('click', function(e) {
        // prevent default anchor click behavior
        e.preventDefault();
        // store hash
        var hash = this.hash;
        // animate
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 1000, function(){
            // when done, add hash to url
            // (default click behaviour)
            window.location.hash = hash;
        });
    });


//animation of skills
    jQuery(document).ready(function(){
        jQuery('.skillbar').each(function(){
            jQuery(this).find('.skillbar-bar').animate({
                width:jQuery(this).attr('data-percent')
            },6000);
        });
    });


$(window).scroll(function() {
    $('#portfolio').each(function(){
        var imagePos = $(this).offset().top;
        var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+600) {
            $(this).addClass("fadeIn");
        }
    });

    $('#about').each(function(){
        var imagePos = $(this).offset().top;
        var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+600) {
            $(this).addClass("fadeIn");
        }
    });

    $('#contact').each(function(){
        var imagePos = $(this).offset().top;
        var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+500) {
            $(this).addClass("fadeIn");
        }
    });

    $('.timeline-deverted').each(function(){
        var imagePos = $(this).offset().top;
        var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+400) {
            $(this).addClass("slideRight");
        }
    });

    $('.timeline-inverted').each(function(){
        var imagePos = $(this).offset().top;
        var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow+400) {
            $(this).addClass("slideLeft");
        }
    });

});

