$(document).ready(function () {
  var typed = $(".typed");

  $(function () {
    typed.typed({
      strings: [
        "Bassirou Niang.",
        "Dit NiangPro.",
        "Dévelopeur",
        "Web",
        "Et Mobile.",
      ],
      typeSpeed: 100,
      loop: true,
    });
  });

  // scroller
  var scroll = new SmoothScroll('a[href*="#"]');
  $(document).on("click", "ul li", function () {
    $(this).addClass("active").siblings().removeClass("active");
    $("#navbarNav").hide();
  });

  $(document).on("click", ".navbar-toggler", function () {
    $("#navbarNav").show();
  });

  // changement de la classe active lorsqu'on scrolle
  $(document).on("scroll", function () {
    // if (
    //   document.documentElement.scrollTop > 765 &&
    //   document.documentElement.scrollTop < 1530
    // ) {
    //   $("ul li").siblings().removeClass("active");
    //   $("#li-apropos").addClass("active");
    // } else if (
    //   document.documentElement.scroll > 1530 &&
    //   document.documentElement.scroll > 3060
    // ) {
    //   $("ul li").siblings().removeClass("active");
    //   $("#li-skill").addClass("active");
    // }
  });

  // magnific popup
  var magnifPopup = function () {
    $(".popup-img").magnificPopup({
      type: "image",
      removalDelay: 300,
      mainClass: "mfp-with-zoom",
      gallery: {
        enabled: true,
      },
      zoom: {
        enabled: true, // By default it's false, so don't forget to enable it

        duration: 300, // duration of the effect, in milliseconds
        easing: "ease-in-out", // CSS transition easing function

        // The "opener" function should return the element from which popup will be zoomed in
        // and to which popup will be scaled down
        // By defailt it looks for an image tag:
        opener: function (openerElement) {
          // openerElement is the element on which popup was initialized, in this case its <a> tag
          // you don't need to add "opener" option if this code matches your needs, it's defailt one.
          return openerElement.is("img")
            ? openerElement
            : openerElement.find("img");
        },
      },
    });
  };

  // Call the functions
  magnifPopup();

  var diplomesIsotope = $(".diplomes-container").isotope({
    itemSelector: ".diplomes-thumbnail",
    layoutMode: "fitRows",
  });

  $("#diplomes-flters li").on("click", function () {
    $("#diplomes-flters li").removeClass("filter-active");
    $(this).addClass("filter-active");

    diplomesIsotope.isotope({ filter: $(this).data("filter") });
  });
});
