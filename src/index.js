(function () {
  console.log('ready');
  const burger = jQuery(".burger"),
    burgerSpan = jQuery(".burger span"),
    nav = jQuery('.header__nav'),
    body = jQuery('body');
  var r = document.querySelector(':root');


  jQuery(body).on('click', '#toggleButton', function (e) {
    e.preventDefault()
    toggleText(jQuery(this))
  })

  function toggleText(e) {

    // console.log(jQuery(e).parent().siblings().find('#fullText').is(":visible"));
    jQuery(e).parent().toggleClass('active')
    jQuery(e).siblings('#shortText').hide(100)
    jQuery(e).siblings('#fullText').slideDown(150)
    jQuery(e).text('Zwiń')

    if (jQuery(e).parent().siblings().find('#fullText').is(":visible")) {
      jQuery(e).parent().removeClass('active')
      jQuery(e).parent().siblings().find('#fullText').slideUp(100)
      jQuery(e).parent().siblings().find('#fullText').hide(200)
      jQuery(e).parent().siblings().find('#shortText').slideDown(100)
      jQuery(e).parent().siblings().find('#toggleButton').text('Rozwiń')
    }
    // if (fullText.style.display === "none") {
    //   fullText.style.display = "block"; // Show the full text
    //   shortText.style.display = "none"; // Hide the short text
    //   button.textContent = "Hide"; // Change button text to 'Hide'
    // } else {
    //   fullText.style.display = "none"; // Hide the full text
    //   shortText.style.display = "block"; // Show only the short text
    //   button.textContent = "Show More"; // Change button text to 'Show More'
    // }
  }


  burger.on("click", function () {
    burgerSpan.toggleClass("active");
    nav.toggleClass("active");
    body.toggleClass("fixed-page");
  });
  function mobNavMenu() {
    jQuery('.menu-item-has-children').on('click', function (e) {
      jQuery(e.target).siblings('ul .sub-menu').slideToggle(500);
      if (jQuery(e.target).parent().children().siblings('ul .sub-menu').css('display') == 'block') {
        jQuery(e.target).parent().siblings().children('ul .sub-menu').slideUp(500)
        jQuery(e.target).parent().siblings().children('a').removeClass('active')
      }

      if (!jQuery(e.target).hasClass('active')) {
        jQuery(e.target).addClass('active')
      } else {
        jQuery(e.target).removeClass('active')
      }
    })
  }

  if (jQuery(window).width() < 1200) {
    mobNavMenu();
  }


  if (jQuery(window).width() < 992) {
    footerAccordionMenu()
  }

  function footerAccordionMenu() {
    jQuery('.footer__investor h6').on('click', function (e) {
      console.log();
      jQuery(e.target).siblings('.footer__investor_items').slideToggle(500)
      if (jQuery(e.target).parent().children().siblings('.footer__investor_items').css('display') == 'block') {
        jQuery(e.target).parent().siblings().children('.footer__investor_items').slideUp(500)
        jQuery(e.target).parent().siblings().removeClass('active')
      }

      if (!jQuery(e.target).parent().hasClass('active')) {
        console.log('her');
        jQuery(e.target).parent().addClass('active')
      } else {
        jQuery(e.target).parent().removeClass('active')
      }
    })
  }



  // setTimeout(function () {
  //   if (getCookie('popupCookie') != 'submited') {
  //     jQuery('.cookies').css("display", "block").hide().fadeIn(2000);
  //   }

  //   jQuery('a.submit').click(function () {
  //     jQuery('.cookies').fadeOut();
  //     //sets the coookie to five minutes if the popup is submited (whole numbers = days)
  //     setCookie('popupCookie', 'submited', 7);
  //   });
  // }, 5000);

  // function getCookie(cname) {
  //   var name = cname + "=";
  //   var ca = document.cookie.split(';');
  //   for (var i = 0; i < ca.length; i++) {
  //     var c = ca[i];
  //     while (c.charAt(0) == ' ') {
  //       c = c.substring(1);
  //     }
  //     if (c.indexOf(name) == 0) {
  //       return c.substring(name.length, c.length);
  //     }
  //   }
  //   return "";
  // }

  // function setCookie(cname, cvalue, exdays) {
  //   var d = new Date();
  //   d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  //   var expires = "expires=" + d.toUTCString();
  //   document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  // }

  // if (getCookie('ageVerification') !== 'submited') {
  //   jQuery('.age-verefication').css('display', 'block')
  // }

})(jQuery);