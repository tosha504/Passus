intFunc = function () {
  jQuery('li .question').on('click', function (e) {
    if (jQuery(this).closest('li').siblings().find('.answer').is(':visible')) {
      jQuery(this).parent().siblings().children('.question').children('button').removeClass('active')
      jQuery(this).parent().siblings().children('.answer').slideUp(200);
      jQuery(this).parent().siblings().removeClass('active')
    }
    jQuery(this).children('button').toggleClass('active')
    jQuery(this).closest('li').toggleClass('active')
    jQuery(this).siblings('.answer').slideToggle(200)
  })
};
if (window.acf) {
  acf.addAction("render_block_preview/type=banner-bht", intFunc);
} else {
  intFunc();
}