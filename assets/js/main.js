/**
* Template Name: TheEvent - v2.3.0
* Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
!(function ($) {

  //Countdown js initialization
  document.addEventListener('readystatechange', event => {
    if (event.target.readyState === "complete") {
      var clockdiv = document.getElementsByClassName("countdown");
      var countDownDate = new Array();
      for (var i = 0; i < clockdiv.length; i++) {
        countDownDate[i] = new Array();
        countDownDate[i]['el'] = clockdiv[i];
        countDownDate[i]['time'] = new Date(clockdiv[i].getAttribute('data-date')).getTime();
        countDownDate[i]['days'] = 0;
        countDownDate[i]['hours'] = 0;
        countDownDate[i]['seconds'] = 0;
        countDownDate[i]['minutes'] = 0;
      }

      var countdownfunction = setInterval(function () {
        for (var i = 0; i < countDownDate.length; i++) {
          var now = new Date().getTime();
          var distance = countDownDate[i]['time'] - now;
          countDownDate[i]['days'] = Math.floor(distance / (1000 * 60 * 60 * 24));
          countDownDate[i]['hours'] = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          countDownDate[i]['minutes'] = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          countDownDate[i]['seconds'] = Math.floor((distance % (1000 * 60)) / 1000);

          if (distance < 0) {
            countDownDate[i]['el'].querySelector('.days').innerHTML = 0;
            countDownDate[i]['el'].querySelector('.hours').innerHTML = 0;
            countDownDate[i]['el'].querySelector('.minutes').innerHTML = 0;
            countDownDate[i]['el'].querySelector('.seconds').innerHTML = 0;
          } else {
            countDownDate[i]['el'].querySelector('.days').innerHTML = countDownDate[i]['days'];
            countDownDate[i]['el'].querySelector('.hours').innerHTML = countDownDate[i]['hours'];
            countDownDate[i]['el'].querySelector('.minutes').innerHTML = countDownDate[i]['minutes'];
            countDownDate[i]['el'].querySelector('.seconds').innerHTML = countDownDate[i]['seconds'];
          }
        }
      }, 1000);
    }
  });


  "use strict";

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });

  // Header fixed on scroll
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
    } else {
      $('#header').removeClass('header-scrolled');
    }
  });

  if ($(window).scrollTop() > 100) {
    $('#header').addClass('header-scrolled');
  }

  // Initialize Venobox
  $(window).on('load', function () {
    $('.venobox').venobox({
      bgcolor: '',
      overlayColor: 'rgba(6, 12, 34, 0.85)',
      closeBackground: '',
      closeColor: '#fff',
      share: false
    });
  });

  // Initiate superfish on nav menu
  $('.nav-menu').superfish({
    animation: {
      opacity: 'show'
    },
    speed: 400
  });

  // Mobile Navigation
  if ($('#nav-menu-container').length) {
    var $mobile_nav = $('#nav-menu-container').clone().prop({
      id: 'mobile-nav'
    });
    $mobile_nav.find('> ul').attr({
      'class': '',
      'id': ''
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>');
    $('body').append('<div id="mobile-body-overly"></div>');
    $('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');

    $(document).on('click', '.menu-has-children i', function (e) {
      $(this).next().toggleClass('menu-item-active');
      $(this).nextAll('ul').eq(0).slideToggle();
      $(this).toggleClass("fa-chevron-up fa-chevron-down");
    });

    $(document).on('click', '#mobile-nav-toggle', function (e) {
      $('body').toggleClass('mobile-nav-active');
      $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
      $('#mobile-body-overly').toggle();
    });

    $(document).click(function (e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
      }
    });
  } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
  }

  // Smooth scroll for the navigation menu and links with .scrollto classes
  var scrolltoOffset = $('#header').outerHeight() - 21;
  if (window.matchMedia("(max-width: 991px)").matches) {
    scrolltoOffset += 20;
  }
  $(document).on('click', '.nav-menu a, #mobile-nav a, .scrollto', function (e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        e.preventDefault();

        var scrollto = target.offset().top - scrolltoOffset;

        if ($(this).attr("href") == '#header') {
          scrollto = 0;
        }

        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu').length) {
          $('.nav-menu .menu-active').removeClass('menu-active');
          $(this).closest('li').addClass('menu-active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Activate smooth scroll on page load with hash links in the url
  $(document).ready(function () {
    if (window.location.hash) {
      var initial_nav = window.location.hash;
      if ($(initial_nav).length) {
        var scrollto = $(initial_nav).offset().top - scrolltoOffset;
        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');
      }
    }
  });

  // Navigation active state on scroll
  var nav_sections = $('section');
  var main_nav = $('.nav-menu, #mobile-nav');

  $(window).on('scroll', function () {
    var cur_pos = $(this).scrollTop() + 200;

    nav_sections.each(function () {
      var top = $(this).offset().top,
        bottom = top + $(this).outerHeight();

      if (cur_pos >= top && cur_pos <= bottom) {
        if (cur_pos <= bottom) {
          main_nav.find('li').removeClass('menu-active');
        }
        main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('menu-active');
      }
      if (cur_pos < 300) {
        $(".nav-menu li:first").addClass('menu-active');
      }
    });
  });

  // Gallery carousel (uses the Owl Carousel library)
  $(".gallery-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    center: true,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 3
      },
      992: {
        items: 4
      },
      1200: {
        items: 5
      }
    }
  });

  // Buy tickets select the ticket type on click
  $('#buy-ticket-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var ticketType = button.data('ticket-type');
    var modal = $(this);
    modal.find('#ticket-type').val(ticketType);
  });
  var rate1 = 0;
  var rate2 = 0;
  var rate3 = 0;
  var rate4 = 0;
  var instructorRating = "";
  var programSubjectRating = "";

  $('input[type=radio][name=star1]').change(function () {
    rate1 = $(this).val();
  });

  $('input[type=radio][name=star2]').change(function () {
    rate2 = $(this).val();
  });

  $('input[type=radio][name=star3]').change(function () {
    rate3 = $(this).val();
  });

  $('input[type=radio][name=star4]').change(function () {
    rate4 = $(this).val();
  });

  setInterval(() => {

    $.ajax({
      type: 'POST',
      dataType: "json",
      url: '/getStreamInfo.php'
    })
      .done(function (data) {
        // console.log(data);
        if (data.status === "ok") {

          $("#liveName").html(data.result.liveName);
          instructorRating = data.result.instructorName;
          programSubjectRating = data.result.liveName;

          var _instructorId = localStorage.getItem("liveStreamInstructorId");

          if (parseInt(_instructorId) != parseInt(data.result.instructorId)) {
            
            if (parseInt(data.result.popup) === 1) {

              $('#ex9').modal({
                fadeDuration: 1000,
                fadeDelay: 0.50,
                closeText: 'Kapat',
                escapeClose: true,
                clickClose: true,
                showClose: true
              });
  
            }

          }

          localStorage.setItem("liveStreamInstructorId", data.result.instructorId);


        } else {
          console.log(data);
          return false;
        }
      })
      .fail(function (e) {
        console.log(e);
        return false;
      });

  }, 1000 * 10);

  $(function () {

    //Select2
    $(".selection-2").select2({
      minimumResultsForSearch: 20,
      dropdownParent: $('#dropDownSelect1')
    });
    $('.selection-2').select2().on('select2:open', function (e) {
      $('.select2-search__field').attr('placeholder', 'Ara');
    })
  });

  $('#buttonRating').click(function (e) {

    e.preventDefault();

    $("#buttonRating").attr("disabled", true);
    var ratingComment = $.trim($("#ratingComment").val());

    if (rate1 > 0 && rate1 < 6 && rate2 > 0 && rate2 < 6 && rate3 > 0 && rate3 < 6 && rate4 > 0 && rate4 < 6) {

      var _userEmailRating = localStorage.getItem("userEmail");

      $.ajax({
        type: 'POST',
        url: '/insertRating.php',
        dataType: 'json',
        data: { emailAddress: _userEmailRating,liveName: "Pfizer" /*programSubjectRating*/, programSubjectRating: programSubjectRating, instructorRating: instructorRating, ratingScore: (rate1 + "-" + rate2 + "-" + rate3 + "-" + rate4), ratingComment: ratingComment }
      })
        .done(function (data) {

          console.log(data);

          if (data.status === "ok") {

            // localStorage.setItem("ratingClick4CareerDate", new Date());
            // localStorage.setItem("isRatingClick4Career", "1");

            $.modal.close();

            swal({
              title: data.result,
              icon: 'success'
            });

          } else {

            $.modal.close();

            swal({
              title: data.result,
              icon: 'success'
            });

          }

          $("#buttonRating").attr("disabled", false);

        })
        .fail(function (e) {
          console.log(e);

          $.modal.close();

          swal({
            title: "Geri bildirim kaydedildi",
            icon: 'success'
          });
          $("#buttonRating").attr("disabled", false);
        });

    } else {
      swal({
        title: "Değerlendirme eksik!",
        icon: 'warning'
      });
      $("#buttonRating").attr("disabled", false);
      return false;
    }
    return false;
  });


  $('#form-submit-question').click(function (e) {

    e.preventDefault();
    
    var _nameSurname = $.trim($("#nameSurname").val());
    var _question = $.trim($("#question").val());
    var _userEmail = localStorage.getItem("userEmail");

    if (_nameSurname === "" || _nameSurname === null || _question === "" || _question === null) {
      swal({
        title: 'Tüm alanlar Doldurulmalı!',
        icon: 'warning'
      });
      return false;
    }

    var values = $("#question-form").serialize();
    values += "&emailAddress=" + encodeURIComponent(_userEmail);

    $.ajax({
      type: 'POST',
      url: '/insertQuestion.php',
      data: values
    })
      .done(function (data) {
        console.log(data);
        if ($.trim(data) === "Sorunuz İletildi") {
          swal({
            title: 'Sorunuz İletildi',
            icon: 'success'
          });
        } else {
          swal({
            title: data,
            icon: 'success'
          });
        }
        $('#question-form')[0].reset();
      })
      .fail(function () {
        $('#question-form')[0].reset();
        swal("Hata", "Bağlantı Hatası", "error");
      });
    return false;
  });



  // Init AOS
  function aos_init() {
    AOS.init({
      duration: 1000,
      once: true
    });
  }
  $(window).on('load', function () {
    aos_init();
  });

})(jQuery);