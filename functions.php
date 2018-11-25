<?php

//Load Main Scripts
function enqueue_bone_dry_scripts()
{
    wp_enqueue_script('Ajax-Popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', false, null, true, null);
    wp_enqueue_script('Bootstrap-4.1.3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), null, true, null);
    wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/releases/v5.1.0/js/all.js', false, null, null, false);
    wp_enqueue_script('bone-dry-scripts', get_template_directory_uri() . '/lib/js/bone-dry.js', array('jquery'), null, true, null);
}
add_action('wp_enqueue_scripts', 'enqueue_bone_dry_scripts');

//Load CSS
function enqueue_bone_dry_styles()
{
    wp_enqueue_style('bootstrap-4.1.3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('bone-dry-styles', get_template_directory_uri() . '/style.css', array(), null);
}
add_action('wp_enqueue_scripts', 'enqueue_bone_dry_styles');

// Update CSS within in Admin
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/lib/css/customizer.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

function arphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'Home right sidebar',
        'id'            => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

//Title tag support
add_theme_support( 'title-tag' );

//Remove attribute from javascript url's 
add_action('wp_loaded', 'prefix_output_buffer_start');
function prefix_output_buffer_start() { 
    ob_start("prefix_output_callback"); 
}

add_action('shutdown', 'prefix_output_buffer_end');
function prefix_output_buffer_end() { 
    ob_end_flush(); 
}

function prefix_output_callback($buffer) {
    return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
}

//Hide admin bar from front of site
show_admin_bar(false);
function remove_menus(){
remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_menus' );

//Allow post and page "featured image"
add_theme_support('post-thumbnails');


// add tag support to pages
function tags_support_all()
{
    register_taxonomy_for_object_type('post_tag', 'page');
}

//Change WP Emails and email address away from "WordPress" as sender
function boneDry_mail_name( $email ){
  return 'Aqua Pro Inc'; // new email name from sender.
}
add_filter( 'wp_mail_from_name', 'boneDry_mail_name' );

function boneDry_mail_from ($email ){
  return 'aquaproinc@verizon.net'; // new email address from sender.
}
add_filter( 'wp_mail_from', 'boneDry_mail_from' );

// ensure all tags are included in queries
function tags_support_query($wp_query)
{
    if ($wp_query->get('tag'))
        $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'bone-dry-wordpress-theme' ),
) );
// Nav Walker

//WordPress Fluid Images Bootstrap 4.1.0
function bootstrap_fluid_images($html)
{
    $classes = 'img-fluid';
    if (preg_match('/<img.*? class="/', $html)) {
        $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . '$2', $html);
    } else {
        $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '"$2', $html);
    }
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
add_filter('the_content', 'bootstrap_fluid_images', 10);
add_filter('post_thumbnail_html', 'bootstrap_fluid_images', 10);

//begin blog page read more button
function excerpt_read_more_link($output)
{
    global $post;
    return $output . '<a class="btn btn-lg btn-api-social text-uppercase" href="' . get_permalink() . '">Read More <i class="fas fa-angle-double-right fa-fw fa-lg"></i></a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');
//end blog page read more button

//begin pagination
function api_inc_pagination($pages = '', $range = 1)
{
    $showitems = ($range * 2) + 1;
    
    global $paged;
    if (empty($paged))
        $paged = 1;
    
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    
    if (1 != $pages) {
        echo "<nav aria-label='Blog Navigation pagination'>";
        echo "<ul class='pagination justify-content-center'>";
        echo "<li class='page-item'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<a class='page-link' aria-label='First Page' href='" . get_pagenum_link(1) . "'>
                          <i class='fas fa-angle-double-left fa-lg'></i>
                          <span class='sr-only'>go to first page</span>
                      </a>";
        echo "</li>";
        echo "<li class='page-item'>";
        if ($paged > 1 && $showitems < $pages)
            echo "<a class='page-link' href='" . get_pagenum_link($paged - 1) . "'>
                          <i class='fas fa-angle-left fa-lg'></i>
                          <span class='sr-only'>go to previous page</span>
                      </a>";
        echo "</li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<li class='page-link'>" . $i . "</li>" : "<a href='" . get_pagenum_link($i) . "' class='page-link' >" . $i . "</a>";
            }
        }
        if ($paged < $pages && $showitems < $pages)
            echo "<a class='page-link' aria-label='Next Page' href='" . get_pagenum_link($paged + 1) . "'>
                          <i class='fas fa-angle-right fa-lg'></i>
                          <span class='sr-only'>go to next page</span>
                        </a>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<a class='page-link' aria-label='Last Page' href='" . get_pagenum_link($pages) . "'>
                          <i class='fas fa-angle-double-right fa-lg'></i>
                          <span class='sr-only'>go to last page</span>
                        </a>";
        global $wp_query;
        echo "</ul></nav>";
    }
}
//end pagination

/**
 * Disable the emoji's
 */
function disable_emojis() {
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );
function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }
return $urls;
}


//ADMIN SECTION FAVICON ITEMS TO <head> SECTION
function aquaPro_Favicon() {
 echo '<link rel="Icon" type="image/x-icon" href="https://apicancleanit.com/wp-content/themes/bone-dry-wordpress-theme/lib/img/favicon-32x32.png" />
 <link rel="Shortcut Icon" type="image/x-icon" href="https://apicancleanit.com/wp-content/themes/bone-dry-wordpress-theme/lib/img/favicon-32x32.png" />';
 }
 add_action( 'login_head', 'aquaPro_Favicon' );
 add_action( 'admin_head', 'aquaPro_Favicon' );

 // THEME CUSTOMIZER

 // get the the role object
 $author = get_role('author');
 // add $cap capability to this role object
 $author->add_cap('customize');
 $author->remove_cap('delete_posts'); 


 function aquaPro_theme_customize_register( $wp_customize ) {
 $wp_customize->remove_control('header_image');
 $wp_customize->remove_panel('widgets');
 $wp_customize->remove_panel('nav_menus');
 $wp_customize->remove_section('colors');
 $wp_customize->remove_section('background_image');
 $wp_customize->remove_section('static_front_page');
 $wp_customize->remove_section('title_tagline');
 $wp_customize->remove_section('custom_css');
}
add_action( 'customize_register', 'aquaPro_theme_customize_register', 20 );

function aquaPro_projects_image_area( $wp_customize ) {
    $wp_customize->add_section('projects_page_images', array(
        'title' => 'Projects Page Image Uploader',
        'description' => 'Update or Edit Images in Slideshow',
        'priority' => 30,
    ));


    $wp_customize->add_setting( 'aquaPro_project_img_upload_1' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aquaPro_project_img_upload_1', array(
        'label'    => __( 'Upload first image:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images',
        'settings' => 'aquaPro_project_img_upload_1',
        'description' => 'Upload your first slider image here.'
    )));
    $wp_customize->add_setting( 'aquaPro_Image_Alt_1', array(
        'default' => 'Enter descriptive text for image here',
        'sanitize_callback' => 'sanitize_alt_one_text',
    )); 
    function sanitize_alt_one_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'aquaPro_Image_Alt_1', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images'
    ));


    $wp_customize->add_setting( 'aquaPro_project_img_upload_2' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aquaPro_project_img_upload_2', array(
        'label'    => __( 'Upload second image:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images',
        'settings' => 'aquaPro_project_img_upload_2',
        'description' => 'Upload your second slider image here.'
    )));
    $wp_customize->add_setting( 'aquaPro_Image_Alt_2', array(
        'default' => 'Enter descriptive text for image here',
        'sanitize_callback' => 'sanitize_alt_two_text',
    )); 
    function sanitize_alt_two_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'aquaPro_Image_Alt_2', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images'
    ));


	$wp_customize->add_setting( 'aquaPro_project_img_upload_3' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aquaPro_project_img_upload_3', array(
        'label'    => __( 'Upload third image:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images',
        'settings' => 'aquaPro_project_img_upload_3',
        'description' => 'Upload your third slider image here.'
    )));
    $wp_customize->add_setting( 'aquaPro_Image_Alt_3', array(
        'default' => 'Enter descriptive text for image here',
        'sanitize_callback' => 'sanitize_alt_three_text',
    )); 
    function sanitize_alt_three_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'aquaPro_Image_Alt_3', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images'
    ));


 	$wp_customize->add_setting( 'aquaPro_project_img_upload_4' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aquaPro_project_img_upload_4', array(
        'label'    => __( 'Upload fourth image:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images',
        'settings' => 'aquaPro_project_img_upload_4',
        'description' => 'Upload your fourth slider image here.'
    )));
    $wp_customize->add_setting( 'aquaPro_Image_Alt_4', array(
        'default' => 'Enter descriptive text for image here',
        'sanitize_callback' => 'sanitize_alt_four_text',
    )); 
    function sanitize_alt_four_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'aquaPro_Image_Alt_4', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images'
    ));


    $wp_customize->add_setting( 'aquaPro_project_img_upload_5' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aquaPro_project_img_upload_5', array(
        'label'    => __( 'Upload fifth image:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images',
        'settings' => 'aquaPro_project_img_upload_5',
        'description' => 'Upload your fifth slider image here.'
    )));
    $wp_customize->add_setting( 'aquaPro_Image_Alt_5', array(
        'default' => 'Enter descriptive text for image here',
        'sanitize_callback' => 'sanitize_alt_five_text',
    )); 
    function sanitize_alt_five_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'aquaPro_Image_Alt_5', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images'
    ));


    $wp_customize->add_setting( 'aquaPro_project_img_upload_6' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aquaPro_project_img_upload_6', array(
        'label'    => __( 'Upload sixth image:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images',
        'settings' => 'aquaPro_project_img_upload_6',
        'description' => 'Upload your sixth slider image here.'
    )));
    $wp_customize->add_setting( 'aquaPro_Image_Alt_6', array(
        'default' => 'Enter descriptive text for image here',
        'sanitize_callback' => 'sanitize_alt_six_text',
    )); 
    function sanitize_alt_six_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'aquaPro_Image_Alt_6', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images'
    ));


    $wp_customize->add_setting( 'aquaPro_project_img_upload_7' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aquaPro_project_img_upload_7', array(
        'label'    => __( 'Upload seventh image:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images',
        'settings' => 'aquaPro_project_img_upload_7',
        'description' => 'Upload your seventh slider image here.'
    )));
    $wp_customize->add_setting( 'aquaPro_Image_Alt_7', array(
        'default' => 'Enter descriptive text for image here',
        'sanitize_callback' => 'sanitize_alt_seven_text',
    )); 
    function sanitize_alt_seven_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'aquaPro_Image_Alt_7', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images'
    ));


    $wp_customize->add_setting( 'aquaPro_project_img_upload_8' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aquaPro_project_img_upload_8', array(
        'label'    => __( 'Upload eighth image:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images',
        'settings' => 'aquaPro_project_img_upload_8',
        'description' => 'Upload your eighth slider image here.'
    )));
    $wp_customize->add_setting( 'aquaPro_Image_Alt_8', array(
        'default' => 'Enter descriptive text for image here',
        'sanitize_callback' => 'sanitize_alt_eight_text',
    )); 
    function sanitize_alt_eight_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'aquaPro_Image_Alt_8', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images'
    ));


    $wp_customize->add_setting( 'aquaPro_project_img_upload_9' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aquaPro_project_img_upload_9', array(
        'label'    => __( 'Upload ninth image:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images',
        'settings' => 'aquaPro_project_img_upload_9',
        'description' => 'Upload your ninth slider image here.'
    )));
    $wp_customize->add_setting( 'aquaPro_Image_Alt_9', array(
        'default' => 'Enter descriptive text for image here',
        'sanitize_callback' => 'sanitize_alt_nine_text',
    )); 
    function sanitize_alt_nine_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'aquaPro_Image_Alt_9', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'bone-dry-wordpress-theme' ),
        'section' => 'projects_page_images'
    ));


}
add_action( 'customize_register', 'aquaPro_projects_image_area' );


