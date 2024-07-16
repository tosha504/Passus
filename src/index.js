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

  jQuery('#loadMorePostMyLord').click(function (e) {
    e.preventDefault()
    var year = jQuery('.year-filter.active').val();
    var button = jQuery(this);
    const postType = jQuery('#postType').val()
    jQuery.ajax({
      url: localizedObject.ajaxurl,
      type: 'POST',
      data: {
        'action': 'load_more_posts',
        '_year': year,
        'page': localizedObject.current_page,
        'post_type': postType
      },
      beforeSend: function (xhr) {

      },
      success: function (data) {
        if (data) {
          jQuery('#post-list').append(data);

          localizedObject.current_page++;
          console.log(localizedObject.current_page == localizedObject.max_page, parseInt(localizedObject.current_page), parseInt(localizedObject.max_page));
          if (parseInt(localizedObject.current_page) == parseInt(localizedObject.max_page))
            button.remove(); // If last page, remove the button
        } else {
          button.remove(); // If no data, remove the button
        }

        // jQuery('#post-list').append(data);
      },
      error: function () {
        console.error('Failed to fetch data');
      }
    });
  })

  if (jQuery('.type-periodic-reports, .type-shareholders').hasClass('active')) {
    jQuery('.type-periodic-reports.active .content, .type-shareholders.active .content').slideDown(200)
  }

  jQuery(body).on('click', '.type-periodic-reports h2 , .type-shareholders h2', function (e) {
    toggleActiveClassPeriodic(jQuery(this))
  })

  function toggleActiveClassPeriodic(e) {
    console.log(jQuery(e).closest('article').find('.content').is(':visible'));
    if (jQuery(e).closest('article').siblings().find('.content').is(':visible')) {
      jQuery(e).closest('article').siblings().removeClass('active')
      jQuery(e).closest('article').siblings().children('.content').slideUp(200);
    }

    // if (jQuery(e).closest('article').find('.content').is(':visible')) {
    //   jQuery(e).siblings('.content').slideUp(200)
    // }

    jQuery(e).closest('article').toggleClass('active')
    jQuery(e).siblings('.content').slideToggle(200)
  }

  function toggleText(e) {

    jQuery(e).parent().toggleClass('active')
    jQuery(e).parent().hasClass('active') ? jQuery(e).text('Zwiń') : jQuery(e).text('Rozwiń')
    // if (jQuery(e).parent().find('#fullText').is(":visible")) {
    //   console.log(jQuery(e).parent().hasClass('active'));
    //   jQuery(e).parent().removeClass('active')
    //   jQuery(e).parent().siblings().find('#fullText').slideUp(100)
    //   jQuery(e).parent().siblings().find('#fullText').hide(200)
    //   jQuery(e).parent().siblings().find('#shortText').slideDown(100)
    //   jQuery(e).parent().siblings().find('#toggleButton').text('Rozwiń')
    // }

    if (jQuery(e).parent().siblings().find('#fullText').is(":visible")) {
      jQuery(e).parent().siblings().removeClass('active')
      // jQuery(e).parent().siblings().find('#fullText').slideUp(100)
      // jQuery(e).parent().siblings().find('#fullText').hide(200)
      // jQuery(e).parent().siblings().find('#shortText').slideDown(100)
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
      jQuery(e.target).siblings('.footer__investor_items').slideToggle(500)
      if (jQuery(e.target).parent().children().siblings('.footer__investor_items').css('display') == 'block') {
        jQuery(e.target).parent().siblings().children('.footer__investor_items').slideUp(500)
        jQuery(e.target).parent().siblings().removeClass('active')
      }

      if (!jQuery(e.target).parent().hasClass('active')) {
        jQuery(e.target).parent().addClass('active')
      } else {
        jQuery(e.target).parent().removeClass('active')
      }
    })
  }

})(jQuery);