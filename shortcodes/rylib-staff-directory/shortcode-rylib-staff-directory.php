<?php
function rylib_staff_directory_register_scripts() {
  wp_register_style( 'rylib-staff-directory-css', get_template_directory_uri().'/shortcodes/rylib-staff-directory/rylib-staff-directory.css', array(), THEME_VERSION );
  // wp_register_script( 'rylib-staff-directory-js', 'js/rylib-staff-directory.js', array('jquery'), THEME_VERSION, true );
}
add_action('wp_enqueue_scripts', 'rylib_staff_directory_register_scripts');

// This is a hack to get the staff directory from the intranet site
// TODO: Write our own implementation for staff directory!
function rylib_staff_directory_shortcode() {
  wp_enqueue_style('rylib-staff-directory-css');
  // wp_enqueue_script('rylib-staff-directory-js');

  $intranet_site_id = get_sites([
    'path' => '/intranet/'
  ])[0]->blog_id;

  switch_to_blog( $intranet_site_id );
  
  $staff_members = get_posts([
    'post_type' => 'staff-member'
  ]);

  $content = rylib_staff_directory_build_html($staff_members);

  restore_current_blog();
  
  return $content;
}
add_shortcode('rylib-staff-directory', 'rylib_staff_directory_shortcode');

function rylib_staff_directory_build_html($staff_members) {
  $html = '<div class="staff-member-listing">';

  foreach($staff_members as $staff) {
    $html .= rylib_staff_directory_build_staff_member_html($staff);
  }

  $html .= '</div>';
  return $html;
}

function rylib_staff_directory_build_staff_member_html($staff) {
  $post_meta = get_post_meta( $staff->ID );
  $name = $staff->post_title;
  $position = $post_meta['_staff_member_title'][0];
  $img_alt = $name . ' : ' . $position;
  $img_url = get_the_post_thumbnail_url($staff->ID) ? get_the_post_thumbnail_url($staff->ID) : 'https://placehold.it/150x150';
  $phone = $post_meta['_staff_member_phone'][0];
  $email = $post_meta['_staff_member_email'][0];
  $email_attr_title = 'Email ' . $staff->post_title;
  $bio = $post_meta['_staff_member_bio'][0];

  $html = '<div class="staff-member">';

  $html .= '<img class="staff-member-photo" src="' . $img_url . '" alt="' . $img_alt . '">';

  $html .= '<div class="staff-member-info-wrap">';
  if (!empty(trim($name))) {
    $html .= '<h3 class="staff-member-name">' . $name . '</h3>';
  }

  if (!empty(trim($position))) {
    $html .= '<h4 class="staff-member-position">'. $position .'</h4>';
  }

  if (!empty(trim($phone))) {
    $html .= $phone . '<br>';
  }

  if (!empty(trim($email))) {
    $html .= '<a class="staff-member-email" href="mailto:' . $email . '" title="' . $email_attr_title . '">' . $email . '</a>';
  }

  if (!empty(trim($bio))) {
    $html .= '<div class="staff-member-bio"><p>' . $bio . '</p></div>';
  }
  $html .= '</div>'; // .staff-member-info-wrap

  $html .= '</div>'; // .staff-member
  return $html;
}
