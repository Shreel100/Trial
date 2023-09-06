jQuery('input[speech], input[x-webkit-speech]').bind('webkitspeechchange', function() {
  var e = jQuery.Event("keypress");
  e.keyCode = 32; // # Some key code value
  jQuery(this).trigger('keydown.suggest');
});
 
jQuery('.fbs-flyout-pane').delegate("a", "click", function(e) {
  e.preventDefault()
  e.stopPropagation()
  window.open(jQuery(e.target).attr('href'), '_blank')
})
