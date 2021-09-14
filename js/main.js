/**Vibes SLider */
$(".vibes-slider-one")
.not(".slick-initialized")
.slick({
    slidesToShow: 3,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: ".vibes-slider .slider-btn .prev",
    nextArrow: ".vibes-slider .slider-btn .next"
});
/**Categories SLider */
$(".categories-slider-one")
.not(".slick-initialized")
.slick({
    slidesToShow: 3,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: ".categories-slider .slider-btn .prev",
    nextArrow: ".categories-slider .slider-btn .next"
});
/**First SLider */
$(".slider-one")
.not(".slick-initialized")
.slick({
    slidesToShow: 2,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: true,
    prevArrow: ".site-slider .slider-btn .prev",
    nextArrow: ".site-slider .slider-btn .next"
});