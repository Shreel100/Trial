<?php 
$header_text = '';
if ( !is_front_page() && is_page() ) {
  $header_text = get_the_title();
} elseif ( !is_search() && get_post_type() == 'eresources') {
  $header_text = 'eResources';
}
?>

<?php if ( !empty($header_text) ) : ?>
<header class="rula-page-header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1><?php echo $header_text; ?></h1>
      </div>
    </div>
  </div>
</header>
<?php endif; ?>
