$(document).ready(function() {
    $("#macbookNextSlide").click(function() {
        $('.macbook-slide1').fadeIn(1000).toggleClass('hidden').attr('style', '');
        $('.macbook-slide2').fadeIn(1000).toggleClass('hidden').attr('style', '');
        $(this).fadeOut(1000);
    });
});

