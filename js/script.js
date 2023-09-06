jQuery(document).ready( function() {
  // Custom submit handlers for sending google analytics events
  jQuery(".form-track-submits").submit( function(e) {
    if ( jQuery(this).hasClass('select_form') ) {
      e.preventDefault();
    }

    var category = jQuery(this).data('gaEventCategory');
    var action = jQuery(this).data('gaEventAction');
    var label = jQuery(this).data('gaEventLabel');
    var value = jQuery(this).data('gaEventValue');

    if ( jQuery(this).hasClass('select_form') ) {
      label = jQuery(this).find(':selected').text();
    }

    ga('send', 'event', category, action, label, value);

    if ( jQuery(this).hasClass('select_form') ) {
      window.location = jQuery(this).find(':selected').val();
    }
  });

  // Summon Search with facets!
  jQuery('.summon_search').submit( function(e) {
    var facet = jQuery(this).data('summon-facet');
    var input = jQuery(this).children('[name="input"]').val();
    var query = jQuery(this).children('[name="q"]');

    switch(facet) {
      case "author":
        query.val( "Author:(" + input + ")" );
        break;
      case "title":
        query.val( "TitleCombined:(" + input + ")" );
        break;
      default:
        query.val(input);
    }
  });

  jQuery('.carousel-inner').each(function(e) {
    jQuery(this).children(':first').addClass("active");
  });
  jQuery('.carousel-indicators').each(function(e) {
    jQuery(this).children(':first').addClass("active");
  });  
  jQuery('.carousel').carousel()
});

// SimpleCalendar plugin JavaScript customization for filters!
jQuery(document).ready( function() {
  var filterButtons = jQuery('.simcal-filter');

  filterButtons.click( function () {
    jQuery(this).toggleClass('btn-primary').toggleClass('btn-default');

    // Toggle visibility of events
    var parentCalendarId = jQuery(this).data("filter-event");
    var events = jQuery('.simcal-event.simcal-events-calendar-' + parentCalendarId);
    events.toggle();
  } );
});