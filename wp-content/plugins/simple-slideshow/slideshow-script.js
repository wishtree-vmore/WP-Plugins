jQuery(function($) {
    var currentIndex = 0;
    var slideCount = $('.slides li').length;
    var autoplayInterval = 3000;

    for (var i = 0; i < slideCount; i++) {
        $('.slider-dot-nav').append('<li><a href="#"></a></li>');
    }

    showSlide(currentIndex);
    $('.slider-dot-nav li:first-child a').addClass('selected');

    $('.next').click(function(e) {
        e.preventDefault();
        currentIndex = (currentIndex + 1) % slideCount;
        showSlide(currentIndex);
    });

    $('.prev').click(function(e) {
        e.preventDefault();
        currentIndex = (currentIndex - 1 + slideCount) % slideCount;
        showSlide(currentIndex);
    });

    $('.slider-dot-nav li a').click(function(e) {
        e.preventDefault();
        currentIndex = $(this).parent().index();
        showSlide(currentIndex);
    });

    var autoplayTimer = setInterval(function() {
        currentIndex = (currentIndex + 1) % slideCount;
        showSlide(currentIndex);
    }, autoplayInterval);

    $('.slider-container').hover(
        function() {
            clearInterval(autoplayTimer);
        },
        function() {
            autoplayTimer = setInterval(function() {
                currentIndex = (currentIndex + 1) % slideCount;
                showSlide(currentIndex);
            }, autoplayInterval);
        }
    );

    function showSlide(index) {
        $('.slides li').removeClass('active').fadeOut();
        $('.slides li:eq(' + index + ')').addClass('active').fadeIn();
        $('.slider-dot-nav li a').removeClass('selected');
        $('.slider-dot-nav li:eq(' + index + ') a').addClass('selected');
    }
});


  