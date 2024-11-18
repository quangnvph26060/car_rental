jQuery(document).ready(function ($) {
  if ($("#menu-product").length) {
    if (!$("#menu-product .current-menu-parent").length) {
      $("#menu-product >li:first-child").addClass("current-menu-parent");
    }
  }
  $(".side-left .widgets .menu .menu-item-has-children").on(
    "click",
    function () {
      $(this)
        .toggleClass("current-menu-parent")
        .find(">.sub-menu")
        .stop()
        .slideToggle();
    }
  );
  if ($(".banner-slider").length) {
    $(".banner-slider").slick({
      infinite: true,
      speed: 700,
      slidesToShow: 1,
      slidesToScroll: 1,
      //autoplay: true,
      autoplaySpeed: 5000,
      dots: false,
      arrows: false,
    });
  }
  if ($(".slide-feedback").length) {
    $(".slide-feedback").slick({
      dots: true,
      arrows: false,
      infinite: true,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      appendDots: $(".slide-feedback-dots"),
      arrows: false,
      responsive: [
        {
          breakpoint: 780,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          },
        },
        {
          breakpoint: 500,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }

  //////slider

//   $("#mona-home-more-product").on("click", function (e) {
//     e.preventDefault();
//     var $this = $(this);
//     if (!$this.hasClass("loading")) {
//       var $page = $this.attr("data-page");
//       var $max = $this.attr("data-max");
//       $page = parseInt($page) + 1;
//       $max = parseInt($max);
//       var $query = $("#mona-data-query").attr("data-query");
//       if ($query) {
//         $query = $.parseJSON($query);
//       } else {
//         $query = "";
//       }

//       var $content = $("#mona-home-list");
//       if ($page <= $max && $max > 1) {
//         $.ajax({
//           url: mona_ajax_url.ajaxURL,
//           type: "post",
//           data: {
//             action: "mona_ajax_more_product",
//             page: $page,
//             query: $query,
//           },
//           error: function (request) {
//             $this.removeClass("loading");
//           },
//           beforeSend: function () {
//             $this.addClass("loading");
//           },
//           success: function (result) {
//             $this.removeClass("loading");
//             var $data = $(result).hide();
//             var $max_page = $data.filter("#mona-temp-page").text();
//             $max_page = parseInt($max_page);
//             $content.append($data).find("#mona-temp-page").remove();
//             $data.fadeIn();
//             if ($page >= $max_page) {
//               $this.fadeOut().remove();
//             } else {
//               $this.attr("data-page", $page);
//               $this.attr("data-max", $max_page);
//             }
//           },
//         });
//       } else {
//         $this.fadeOut().remove();
//       }
//     }
//   });
//   $("#mona-load-more-sticky").on("click", function (e) {
//     e.preventDefault();
//     var $this = $(this);
//     if (!$this.hasClass("loading")) {
//       var $page = $this.attr("data-page");
//       var $max = $this.attr("data-max");
//       $page = parseInt($page) + 1;
//       $max = parseInt($max);
//       var $content = $("#mona-sticky-content");
//       if ($page <= $max) {
//         $.ajax({
//           url: mona_ajax_url.ajaxURL,
//           type: "post",
//           data: {
//             action: "mona_ajax_more_sticky",
//             page: $page,
//           },
//           error: function (request) {
//             $this.removeClass("loading");
//           },
//           beforeSend: function () {
//             $this.addClass("loading");
//           },
//           success: function (result) {
//             $this.removeClass("loading");
//             var $data = $(result).hide();
//             $content.append($data);
//             $data.fadeIn();
//             if ($page >= $max) {
//               $this.fadeOut().remove();
//             } else {
//               $this.attr("data-page", $page);
//             }
//           },
//         });
//       } else {
//         $this.fadeOut().remove();
//       }
//     }
//   });

//   $("#mona-load-more-items").on("click", function (e) {
//     e.preventDefault();
//     var $this = $(this);
//     if (!$this.hasClass("loading")) {
//       var $page = $this.attr("data-page");
//       var $max = $this.attr("data-max");
//       var $tax = $this.attr("data-tax");
//       var $tax_id = $this.attr("data-tax-id");
//       $page = parseInt($page) + 1;
//       $max = parseInt($max);
//       var $content = $("#mona-items-content");
//       if ($page <= $max) {
//         $.ajax({
//           url: mona_ajax_url.ajaxURL,
//           type: "post",
//           data: {
//             action: "mona_ajax_more_items",
//             page: $page,
//             tax: $tax,
//             taxid: $tax_id,
//           },
//           error: function (request) {
//             $this.removeClass("loading");
//           },
//           beforeSend: function () {
//             $this.addClass("loading");
//           },
//           success: function (result) {
//             $this.removeClass("loading");
//             var $data = $(result).hide();
//             $content.append($data);
//             $data.fadeIn();
//             if ($page >= $max) {
//               $this.fadeOut().remove();
//             } else {
//               $this.attr("data-page", $page);
//             }
//           },
//         });
//       } else {
//         $this.fadeOut().remove();
//       }
//     }
//   });
});
