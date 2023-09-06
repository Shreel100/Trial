jQuery( document ).ready(function() {
  jQuery('.rylib-tabs .tabs a').click(function(e){
    var _$ = jQuery;
  
    var $tabGroup = _$(this).closest('.rylib-tabs');
    var $tabs = $tabGroup.children('.tabs');
    var $tabsContent = $tabGroup.children('.tabs-content');
    var targetId = jQuery(this).attr('data-target');
  
    // Switch Tab
    $tabs.find('.active').removeClass('active');
    _$(this).addClass('active');
  
    // Switch Tab Content
    $tabsContent.children('.active').removeClass('active')
    _$(targetId).addClass('active');
  });
});