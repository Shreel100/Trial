<?php
  function rylib_get_site_alert_message() {
    global $blog_id;
    $site_alert_message = '';

    $site_alert_message = get_field('site_alert_message', 'option');

    if ( empty($site_alert_message) && ( is_multisite() || $blog_id != 1 ) ) {
      switch_to_blog( 1 );
      $site_alert_message = get_field('site_alert_message', 'option');
      restore_current_blog();
    }

    return $site_alert_message;
  }

  function rylib_get_site_alert_message_bg() {
    global $blog_id;
    $site_alert_message_bg = '';

    $site_alert_message_bg = get_field('site_alert_message_bg', 'option');

    if ( empty($site_alert_message_bg) && ( is_multisite() || $blog_id != 1 ) ) {
      switch_to_blog( 1 );
      $site_alert_message_bg = get_field('site_alert_message_bg', 'option');
      restore_current_blog();
    }

    return $site_alert_message_bg;
  }
?>

<?php if ( $alert_message = rylib_get_site_alert_message() ) : ?>
<?php 
$class = 'alert-message-bg-grey';
if ( rylib_get_site_alert_message_bg() ) {
  $class = 'alert-message-bg-' . rylib_get_site_alert_message_bg() . '"';
} 
?>
<div class="alert-message <?php echo $class ?>">
  <div class="container">
    <div class="row">
      <div class="col-xs-12" style="display:flex;">
        <i style="font-size: 3em; margin-right: 0.5em;" class="fa fa-info-circle" aria-hidden="true"></i>
        <div><?php echo $alert_message; ?></div>
      </div>
    </div>
  </div>
</div>
<?php endif ?>
