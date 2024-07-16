intFunc = function () {
  jQuery('#searchInput').on('input', function () {
    var filter = jQuery(this).val().toLowerCase();
    jQuery('.search-doscs-ps__items_item').each(function () {
      var title = jQuery(this).find('.item__title').text().toLowerCase();
      var descr = jQuery(this).find('.item__descr').text().toLowerCase();
      if (title.includes(filter) || descr.includes(filter)) {
        jQuery(this).show();
      } else {
        jQuery(this).hide();
      }
    });
  });
};
if (window.acf) {
  acf.addAction("render_block_preview/type=search-doscs-ps", intFunc);
} else {
  intFunc();
}