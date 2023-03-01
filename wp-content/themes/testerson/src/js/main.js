jQuery(function ($) {
  $(".hero-slider").slick({
    infinite: true,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 300,
  });
  $(".posts-slides").slick({
    dots: false,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
      {
        breakpoint: 1280,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  $(document).ready(function () {
    let header = $("header");
    let lastScrollTop = 0;

    if (
      $(window).scrollTop() < header.height() ||
      $(window).scrollTop() === 0
    ) {
      document.body.classList.add("top-of-page");
    }

    $(window).scroll(function () {
      let documentScrollTop =
        window.pageYOffset || document.documentElement.scrollTop;
      if (documentScrollTop > lastScrollTop) {
        document.body.classList.add("is-scroll-down");
        document.body.classList.remove("is-scroll-up");
      } else {
        document.body.classList.add("is-scroll-up");
        document.body.classList.remove("is-scroll-down");
      }
      lastScrollTop = documentScrollTop <= 0 ? 0 : documentScrollTop;

      if ($(window).scrollTop() >= header.height()) {
        document.body.classList.remove("top-of-page");
      } else {
        document.body.classList.add("top-of-page");
      }
    });
  });

  $("header #mobile-toggle-item").click(function () {
    $("header .mobile-menu").slideToggle();
  });
});
